<?php
namespace App\Services;

use App\Models\AtributoProdutoIndicePedido;
use App\Models\AtributoProdutoPedido;
use App\Models\ImagemProdutoPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PedidoProdutoService
{

    public function index(array $dados = []): LengthAwarePaginator
    {
        $query = AtributoProdutoIndicePedido::whereNull('excluido')
            ->orderBy('id', 'desc')
            ->whereHas('produto', function($query) {
                $query->where('excluido', null);
            })
            ->whereHas('pedido', function($query) {
                $query->where('excluido', null);
            })
            ->with(['produto' => function ($query) {
                $query->whereNull('excluido')
                ->with([
                    'produtosIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ]);
            },
            'pedido' => function ($q)  {
                $q->where('excluido', null);
            },
        ]);

        if (!empty($dados['nome'])) {
            $query->whereHas('produto.produtosIdiomas', function ($q) use ($dados) {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                })
                ->where('nome', 'like', '%' . $dados['nome'] . '%');
            });
        }

        if (!empty($dados['cliente_nome'])) {
            $query->whereHas('pedido.cliente', function ($q) use ($dados) {
                $q->where('excluido', null)->where('nome', 'like', '%' . $dados['cliente_nome'] . '%');
            });
        }

        if (!empty($dados['pedido'])) {
            $query->whereHas('pedido', function ($q) use ($dados) {
                $q->where('excluido', null)->where('nome', 'like', '%' . $dados['pedido'] . '%');
            });
        }

        $resultado = $query->paginate(20)->withQueryString();

        $resultado->getCollection()->transform(function ($item) {
            return [
                'id' => $item->id,
                'produto_nome' => optional($item->produto?->produtosIdiomas->first())->nome,
                'cliente_nome' => optional($item->pedido?->cliente)->nome ?? null,
                'pedido' => optional($item->pedido)->nome ?? null,
            ];
        });

        return $resultado;
    }

    // public function getCriarAtributo($id)
    // {
    //     $produto = Produto::where('id', $id)->whereNull('excluido')
    //     ->with([
    //         'produtosIdiomas' => function ($q)  {
    //             $q->whereHas('idiomas', function ($query) {
    //                 $query->where('codigo', 'pt');
    //             });
    //         },
    //     ])
    //     ->first();

    //     $atributosAmostras = AtributoProduto::query()
    //         ->whereNull('excluido')
    //         ->with([
    //         'atributosProdutosIdiomas' => function ($q)  {
    //             $q->whereHas('idiomas', function ($query) {
    //                 $query->where('codigo', 'pt');
    //             });
    //         },
    //     ])->get();

    //     return compact('amostra', 'atributosAmostras');
    // }

    public function get_criar_produto(int | string $id)
    {
        $produto = Produto::where('id', $id)->where('excluido', null)
        ->with([
            'atributos' => function ($query) {
                $query->whereNull('excluido')
                ->with([
                    'atributosProdutosIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ])
                ->with(['subAtributos' => function ($query) {
                    $query->whereNull('excluido')->with([
                        'subAtributosProdutosIdiomas' => function ($q)  {
                            $q->whereHas('idiomas', function ($query) {
                                $query->where('codigo', 'pt');
                            });
                        },
                    ]);
                }]);
            }
         ])
        ->first();

        $pedidos = Pedido::where('excluido', null)->orderBy('id', 'DESC')->get();

        return [
            'produto' => $produto,
            'pedidos' => $pedidos
        ];
    }

    public function criar_produto(array $dados, int $produtoId)
    {
        DB::beginTransaction();

        try {
            $dadosFormatados = [];

            $indiceProdutoPedido =  AtributoProdutoIndicePedido::create([
                'produto_id' => $produtoId,
                'pedido_id' => $dados['pedido_id'],
                'criado' => date('Y-m-d H:i:s')
            ]);

            if (!empty($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $arquivo) {

                    $extension = strtolower($arquivo->getClientOriginalExtension());
                    $nomeArquivo = md5(uniqid() . time()) . '.' . $extension;

                    $dest = public_path('assets/img/produtos/pedido');

                    if (!file_exists($dest)) {
                        mkdir($dest, 0755, true);
                    }

                    $type = '';

                    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {

                        $image = Image::make($arquivo->getRealPath());
                        $image->save($dest . '/' . $nomeArquivo);
                        $type = 'imagem';
                    } 

                    else {
                        $nomeArquivo = $arquivo->getClientOriginalName();
                        $hasFileName = 1;

                        while (file_exists($dest . '/' . $nomeArquivo)) {
                            $nomeBase   = pathinfo($arquivo->getClientOriginalName(), PATHINFO_FILENAME);
                            $nomeArquivo = $nomeBase . '_' . $hasFileName . '.' . $extension;

                            $hasFileName++;
                        }

                        $arquivo->move($dest, $nomeArquivo);
                        $type = 'documento';
                    }

                    ImagemProdutoPedido::create([
                        'arquivo' => $nomeArquivo,
                        'produto_indice_pedido_id' => $indiceProdutoPedido->id,
                        'tipo' => $type
                    ]);
                }
            }
            
            if (isset($dados['produtosAtributo']) && is_array($dados['produtosAtributo'])){
                foreach ($dados['produtosAtributo'] as $produto) {
                    if (isset($produto['atributo_multiplo'])) {
                        foreach ($produto['atributo_multiplo'] as $subatributo) {
                            $dadosFormatados[] = [
                                'indice_produto_pedido_id' => $indiceProdutoPedido->id,
                                'atributo_id' => $produto['atributo_id'],
                                'sub_atributo_id' => $subatributo['subatributo_id'] ?? null,
                                'observacao_personalizada' => $subatributo['observacao_personalizada'] ?? null,
                                'conteudo' => $subatributo['conteudo'] ?? null,
                            ];
                        }
                    } else {
                        $dadosFormatados[] = [
                            'indice_produto_pedido_id' => $indiceProdutoPedido->id,
                            'atributo_id' => $produto['atributo_id'],
                            'sub_atributo_id' => $produto['atributo_selecionavel']['subatributo_id'] ?? null,
                            'observacao_personalizada' => $produto['observacao_personalizada'] ?? null,
                            'conteudo' => $produto['conteudo'] ?? null,
                        ];
                    }
                }
            }

            $response = AtributoProdutoPedido::insert($dadosFormatados);

            if($dados['produtoIndicePedidoId']) {
                $imagensToCopy = ImagemProdutoPedido::where('produto_indice_pedido_id', $dados['produtoIndicePedidoId'])->get();

                if(count($imagensToCopy) > 0) {
                     foreach ($imagensToCopy as $imagem) {
                        ImagemProdutoPedido::create([
                            'arquivo' => $imagem->arquivo,
                            'produto_indice_pedido_id' => $indiceProdutoPedido->id,
                            'tipo' => $imagem->tipo
                        ]);
                    }
                }
            }

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_editar_produto(int | string $id)
    {
        $atributoProdutoPedido = AtributoProdutoIndicePedido::where('id', $id)->where('excluido', null)->with('imagens')->first();
        
        $produto = Produto::where('id', $atributoProdutoPedido->produto_id)
        ->whereNull('excluido')
        ->with([
            'produtosIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->with([
            'atributos' => function ($query) use ($atributoProdutoPedido) {
                $query->whereNull('excluido')
                ->with([
                    'atributosProdutosIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ])
                ->with([
                    'subAtributos' => function ($query) use ($atributoProdutoPedido) {
                        $query->whereNull('excluido')
                            ->with([
                                'subAtributosProdutosIdiomas' => function ($q)  {
                                    $q->whereHas('idiomas', function ($query) {
                                        $query->where('codigo', 'pt');
                                    });
                                },
                            ])
                            ->with([
                                'pedido' => function ($query) use ($atributoProdutoPedido) {
                                    $query->where('indice_produto_pedido_id', $atributoProdutoPedido->id);
                                }
                            ]);
                    },
                    'atributoProdutoPedidos' => function ($query) use ($atributoProdutoPedido) {
                        $query->where('indice_produto_pedido_id', $atributoProdutoPedido->id);
                    },
                    'imagensPedido' => function ($query) use ($atributoProdutoPedido) {
                        $query->where('indice_produto_pedido_id', $atributoProdutoPedido->id);
                    },
                ]);
            }
        ])
        ->first();

        $pedidos = Pedido::where('excluido', null)->orderBy('id', 'DESC')->get();

        $query = [
            'atributoProdutoPedido' => [
                'id' => $atributoProdutoPedido->id,
                'produto_id' => $atributoProdutoPedido->produto_id,
                'pedido_id' => $atributoProdutoPedido->pedido_id,

                'imagens' => $atributoProdutoPedido->imagens
                    ->where('tipo', 'imagem')
                    ->values()
                    ->map(fn ($item) => [
                        'id' => $item->id,
                        'arquivo' => $item->arquivo,
                        'tipo' => $item->tipo,
                    ]),

                'documentos' => $atributoProdutoPedido->imagens
                    ->where('tipo', 'documento')
                    ->values()
                    ->map(fn ($item) => [
                        'id' => $item->id,
                        'arquivo' => $item->arquivo,
                        'tipo' => $item->tipo,
                    ]),
            ],
            'produto' => $produto,
            'pedidos' => $pedidos
        ];

        return $query; 
    }

    public function editar_produto(array $dados, int $produtoId)
    {
        DB::beginTransaction();

        try {
            
            $atributoProdutoPedido = AtributoProdutoIndicePedido::where('id', $produtoId)->where('excluido', null)->first();

            if (!$atributoProdutoPedido) {
                throw new \Exception('Nenhum produto foi encontrado.', 404);
            }

            $response = null;

            if (isset($dados['produtosAtributo']) && is_array($dados['produtosAtributo'])){
                foreach ($dados['produtosAtributo'] as $produto) {
                    if (isset($produto['atributo_multiplo'])) {
                        foreach ($produto['atributo_multiplo'] as $subatributo) {
                            $response = AtributoProdutoPedido::updateOrCreate(
                                [
                                'indice_produto_pedido_id' => $atributoProdutoPedido->id,
                                'atributo_id' => $produto['atributo_id'],
                                'sub_atributo_id' => $subatributo['subatributo_id']
                                ],
                                [
                                'observacao_personalizada' => $subatributo['observacao_personalizada'] ?? null,
                                'conteudo' => $subatributo['conteudo'] ?? null,
                                ]
                            );
                            
                        }
                    } else {

                        $response = AtributoProdutoPedido::updateOrCreate(
                            [
                            'indice_produto_pedido_id' => $atributoProdutoPedido->id,
                            'atributo_id' => $produto['atributo_id'],
                            'sub_atributo_id' => $produto['atributo_selecionavel']['old'] ?? null,
                            ],
                            [
                                'sub_atributo_id' => $produto['atributo_selecionavel']['subatributo_id'] ?? null,
                                'observacao_personalizada' => $produto['observacao_personalizada'] ?? null,
                                'conteudo' => $produto['conteudo'] ?? null,
                            ]
                        );
                    }
                }
            }

            if (!empty($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $arquivo) {

                    $extension = strtolower($arquivo->getClientOriginalExtension());
                    $nomeArquivo = md5(uniqid() . time()) . '.' . $extension;

                    $dest = public_path('assets/img/produtos/pedido');

                    if (!file_exists($dest)) {
                        mkdir($dest, 0755, true);
                    }

                    $type = '';

                    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {

                        $image = Image::make($arquivo->getRealPath());
                        $image->save($dest . '/' . $nomeArquivo);
                        $type = 'imagem';
                    } 

                    else {
                        $nomeArquivo = $arquivo->getClientOriginalName();
                        $hasFileName = 1;

                        while (file_exists($dest . '/' . $nomeArquivo)) {
                            $nomeBase   = pathinfo($arquivo->getClientOriginalName(), PATHINFO_FILENAME);
                            $nomeArquivo = $nomeBase . '_' . $hasFileName . '.' . $extension;

                            $hasFileName++;
                        }

                        $arquivo->move($dest, $nomeArquivo);
                        $type = 'documento';
                    }

                    ImagemProdutoPedido::create([
                        'arquivo' => $nomeArquivo,
                        'produto_indice_pedido_id' => $atributoProdutoPedido->id,
                        'tipo' => $type
                    ]);
                }
            }

            $atributoProdutoPedido->pedido_id = $dados['pedido_id'];
            $response = $atributoProdutoPedido->save();
            
            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
