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

        $resultado = $query->paginate(20)->withQueryString();

        $resultado->getCollection()->transform(function ($item) {
            return [
                'id' => $item->id,
                'produto_nome' => optional($item->produto->produtosIdiomas->first())->nome,
                'cliente_nome' => optional($item->pedido?->cliente)->nome ?? null,
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

            if (isset($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $img) {
                    $extension = $img->getClientOriginalExtension();
                    $photoName = md5(time().rand(0,9999)) . '.' . $extension;
                    $dest = public_path('assets/img/produtos/pedido');
                    $image = Image::make($img->getRealPath());
                    $image->save($dest . '/' . $photoName);

                    ImagemProdutoPedido::create([
                        'imagem' => $photoName,
                        'produto_indice_pedido_id' => $indiceProdutoPedido->id,
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
            'atributoProdutoPedido' => $atributoProdutoPedido,
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

            if (isset($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $img) {
                    $extension = $img->getClientOriginalExtension();
                    $photoName = md5(time().rand(0,9999)) . '.' . $extension;
                    $dest = public_path('assets/img/produtos/pedido');
                    $image = Image::make($img->getRealPath());
                    $image->save($dest . '/' . $photoName);

                    ImagemProdutoPedido::create([
                        'imagem' => $photoName,
                        'produto_indice_pedido_id' => $atributoProdutoPedido->id,
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
