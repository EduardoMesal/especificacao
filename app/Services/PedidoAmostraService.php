<?php
namespace App\Services;

use App\Models\Amostra;
use App\Models\Especificacao;
use App\Models\Maquina;
use App\Models\AtributoAmostraIndicePedido;
use App\Models\AtributoAmostraPedido;
use App\Models\ImagemAmostraPedido;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class PedidoAmostraService
{
    public function index(array $dados = []): LengthAwarePaginator
    {
        $query = AtributoAmostraIndicePedido::whereNull('excluido')
            ->orderBy('id', 'desc')
            ->whereHas('amostra', function($query) {
                $query->where('excluido', null);
            })
            ->whereHas('pedido', function($query) {
                $query->where('excluido', null);
            })
            ->with(['amostra' => function ($query) {
                $query->whereNull('excluido')
                ->with([
                    'amostrasIdiomas' => function ($q)  {
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
            $query->whereHas('amostra.amostrasIdiomas', function ($q) use ($dados) {
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
                'amostra_nome' => optional($item->amostra?->amostrasIdiomas->first())->nome ?? null,
                'cliente_nome' => optional($item->pedido?->cliente)->nome ?? null,
                'pedido' => optional($item->pedido)->nome ?? null,
            ];
        });

        return $resultado;
    }

    // public function getCriarAtributo($id)
    // {
    //     $amostra = Amostra::where('id', $id)->whereNull('excluido')
    //     ->with([
    //         'amostrasIdiomas' => function ($q)  {
    //             $q->whereHas('idiomas', function ($query) {
    //                 $query->where('codigo', 'pt');
    //             });
    //         },
    //     ])
    //     ->first();

    //     $atributosAmostras = AtributoAmostra::query()
    //         ->whereNull('excluido')
    //         ->with([
    //         'atributosAmostrasIdiomas' => function ($q)  {
    //             $q->whereHas('idiomas', function ($query) {
    //                 $query->where('codigo', 'pt');
    //             });
    //         },
    //     ])->get();

    //     return compact('amostra', 'atributosAmostras');
    // }

    public function get_criar_amostra(int | string $id)
    {
        $amostra = Amostra::where('id', $id)->where('excluido', null)
        ->with([
            'atributos' => function ($query) {
                $query->whereNull('excluido')
                ->with([
                    'atributosAmostrasIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ])
                ->with(['subAtributos' => function ($query) {
                    $query->whereNull('excluido')->with([
                        'subAtributosAmostrasIdiomas' => function ($q)  {
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
            'amostra' => $amostra,
            'pedidos' => $pedidos
        ];
    }

    public function criar_amostra(array $dados, int $amostraId)
    {
        DB::beginTransaction();

        try {
            $dadosFormatados = [];

            $indiceAmostraPedido =  AtributoAmostraIndicePedido::create([
                'amostra_id' => $amostraId,
                'pedido_id' => $dados['pedido_id'],
                'criado' => date('Y-m-d H:i:s')
            ]);

            if (!empty($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $arquivo) {

                    $extension = strtolower($arquivo->getClientOriginalExtension());
                    $nomeArquivo = md5(uniqid() . time()) . '.' . $extension;

                    // $dest = public_path('assets/img/amostras/pedido');

                    // if (!file_exists($dest)) {
                    //     mkdir($dest, 0755, true);
                    // }

                    $type = '';

                    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {

                        $image = Image::make($arquivo->getRealPath());
                        // $image->save($dest . '/' . $nomeArquivo);
                        $imageStream = (string) $image->encode($extension, 90);

                        Storage::disk('ftp_media')->put(
                            'amostras/pedido/' . $nomeArquivo,
                            $imageStream
                        );
                        $type = 'imagem';
                    } 

                    else {
                        $nomeArquivo = $arquivo->getClientOriginalName();
                        $hasFileName = 1;

                        while (Storage::disk('ftp_media')->exists('amostras/pedido/' . $nomeArquivo)) {
                            $nomeBase   = pathinfo($arquivo->getClientOriginalName(), PATHINFO_FILENAME);
                            $nomeArquivo = $nomeBase . '_' . $hasFileName . '.' . $extension;

                            $hasFileName++;
                        }

                        // $arquivo->move($dest, $nomeArquivo);
                        Storage::disk('ftp_media')->put('amostras/pedido/' . $nomeArquivo, file_get_contents($arquivo->getRealPath()));
                        
                        $type = 'documento';
                    }

                    ImagemAmostraPedido::create([
                        'arquivo' => $nomeArquivo,
                        'amostra_indice_pedido_id' => $indiceAmostraPedido->id,
                        'tipo' => $type
                    ]);
                }
            }

            if (isset($dados['amostrasAtributo']) && is_array($dados['amostrasAtributo'])){
                foreach ($dados['amostrasAtributo'] as $amostra) {
                    if (isset($amostra['atributo_multiplo'])) {
                        foreach ($amostra['atributo_multiplo'] as $subatributo) {
                            $dadosFormatados[] = [
                                'indice_amostra_pedido_id' => $indiceAmostraPedido->id,
                                'atributo_id' => $amostra['atributo_id'],
                                'sub_atributo_id' => $subatributo['subatributo_id'] ?? null,
                                'observacao_personalizada' => $subatributo['observacao_personalizada'] ?? null,
                                'conteudo' => $subatributo['conteudo'] ?? null,
                            ];
                        }
                    } else {
                        $dadosFormatados[] = [
                            'indice_amostra_pedido_id' => $indiceAmostraPedido->id,
                            'atributo_id' => $amostra['atributo_id'],
                            'sub_atributo_id' => $amostra['atributo_selecionavel']['subatributo_id'] ?? null,
                            'observacao_personalizada' => $amostra['observacao_personalizada'] ?? null,
                            'conteudo' => $amostra['conteudo'] ?? null,
                        ];
                    }
                }
            }

            $response = AtributoAmostraPedido::insert($dadosFormatados);

            if($dados['amostraIndicePedidoId']) {
                $imagensToCopy = ImagemAmostraPedido::where('amostra_indice_pedido_id', $dados['amostraIndicePedidoId'])->get();

                if(count($imagensToCopy) > 0) {
                     foreach ($imagensToCopy as $imagem) {
                        ImagemAmostraPedido::create([
                            'arquivo' => $imagem->arquivo,
                            'amostra_indice_pedido_id' => $indiceAmostraPedido->id,
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

    public function get_editar_amostra(int | string $id)
    {
        $atributoAmostraPedido = AtributoAmostraIndicePedido::where('id', $id)->where('excluido', null)->with('imagens')->first();
        
        $amostra = Amostra::where('id', $atributoAmostraPedido->amostra_id)
        ->whereNull('excluido')
        ->with([
            'amostrasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->with([
            'atributos' => function ($query) use ($atributoAmostraPedido) {
                $query->whereNull('excluido')
                ->with([
                    'atributosAmostrasIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ])
                ->with([
                    'subAtributos' => function ($query) use ($atributoAmostraPedido) {
                        $query->whereNull('excluido')
                            ->with([
                                'subAtributosAmostrasIdiomas' => function ($q)  {
                                    $q->whereHas('idiomas', function ($query) {
                                        $query->where('codigo', 'pt');
                                    });
                                },
                            ])
                            ->with([
                                'pedido' => function ($query) use ($atributoAmostraPedido) {
                                    $query->where('indice_amostra_pedido_id', $atributoAmostraPedido->id);
                                }
                            ]);
                    },
                    'atributoAmostraPedidos' => function ($query) use ($atributoAmostraPedido) {
                        $query->where('indice_amostra_pedido_id', $atributoAmostraPedido->id);
                    },
                    'imagensPedido' => function ($query) use ($atributoAmostraPedido) {
                        $query->where('indice_amostra_pedido_id', $atributoAmostraPedido->id);
                    },
                ]);
            }
        ])
        ->first();

        $pedidos = Pedido::where('excluido', null)->orderBy('id', 'DESC')->get();

        $query = [
            'atributoAmostraPedido' => [
                'id' => $atributoAmostraPedido->id,
                'amostra_id' => $atributoAmostraPedido->amostra_id,
                'pedido_id' => $atributoAmostraPedido->pedido_id,

                'imagens' => $atributoAmostraPedido->imagens
                    ->where('tipo', 'imagem')
                    ->values()
                    ->map(fn ($item) => [
                        'id' => $item->id,
                        'arquivo' => $item->arquivo,
                        'tipo' => $item->tipo,
                    ]),

                'documentos' => $atributoAmostraPedido->imagens
                    ->where('tipo', 'documento')
                    ->values()
                    ->map(fn ($item) => [
                        'id' => $item->id,
                        'arquivo' => $item->arquivo,
                        'tipo' => $item->tipo,
                    ]),
            ],
            'amostra' => $amostra,
            'pedidos' => $pedidos
        ];

        return $query; 
    }

    public function editar_amostra(array $dados, int $amostraId)
    {
        DB::beginTransaction();

        try {
            
            $atributoAmostraPedido = AtributoAmostraIndicePedido::where('id', $amostraId)->where('excluido', null)->first();

            if (!$atributoAmostraPedido) {
                throw new \Exception('Nenhuma amostra foi encontrada.', 404);
            }

            $response = null;

            if (isset($dados['amostrasAtributo']) && is_array($dados['amostrasAtributo'])){
                foreach ($dados['amostrasAtributo'] as $amostra) {
                    if (isset($amostra['atributo_multiplo'])) {
                        foreach ($amostra['atributo_multiplo'] as $subatributo) {
                            $response = AtributoAmostraPedido::updateOrCreate(
                                [
                                'indice_amostra_pedido_id' => $atributoAmostraPedido->id,
                                'atributo_id' => $amostra['atributo_id'],
                                'sub_atributo_id' => $subatributo['subatributo_id']
                                ],
                                [
                                'observacao_personalizada' => $subatributo['observacao_personalizada'] ?? null,
                                'conteudo' => $subatributo['conteudo'] ?? null,
                                ]
                            );
                            
                        }
                    } else {

                        $response = AtributoAmostraPedido::updateOrCreate(
                            [
                                'indice_amostra_pedido_id' => $atributoAmostraPedido->id,
                                'atributo_id' => $amostra['atributo_id'],
                                'sub_atributo_id' => $amostra['atributo_selecionavel']['old'] ?? null,
                            ],
                            [
                                'sub_atributo_id' => $amostra['atributo_selecionavel']['subatributo_id'] ?? null,
                                'observacao_personalizada' => $amostra['observacao_personalizada'] ?? null,
                                'conteudo' => $amostra['conteudo'] ?? null,
                            ]
                        );
                    }
                }
            }

            if (!empty($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $arquivo) {

                    $extension = strtolower($arquivo->getClientOriginalExtension());
                    $nomeArquivo = md5(uniqid() . time()) . '.' . $extension;

                    // $dest = public_path('assets/img/amostras/pedido');

                    // if (!file_exists($dest)) {
                    //     mkdir($dest, 0755, true);
                    // }

                    $type = '';

                    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {

                        $image = Image::make($arquivo->getRealPath());
                        // $image->save($dest . '/' . $nomeArquivo);
                        $imageStream = (string) $image->encode($extension, 90);

                        Storage::disk('ftp_media')->put(
                            'amostras/pedido/' . $nomeArquivo,
                            $imageStream
                        );

                        $type = 'imagem';
                    } 

                    else {
                        $nomeArquivo = $arquivo->getClientOriginalName();
                        $hasFileName = 1;
                        
                        while (Storage::disk('ftp_media')->exists('amostras/pedido/' . $nomeArquivo)) {
                            $nomeBase   = pathinfo($arquivo->getClientOriginalName(), PATHINFO_FILENAME);
                            $nomeArquivo = $nomeBase . '_' . $hasFileName . '.' . $extension;

                            $hasFileName++;
                        }

                        // $arquivo->move($dest, $nomeArquivo);
                        Storage::disk('ftp_media')->put('amostras/pedido/' . $nomeArquivo, file_get_contents($arquivo->getRealPath()));
                     
                        $type = 'documento';
                    }

                    ImagemAmostraPedido::create([
                        'arquivo' => $nomeArquivo,
                        'amostra_indice_pedido_id' => $atributoAmostraPedido->id,
                        'tipo' => $type
                    ]);
                }
            }

            $atributoAmostraPedido->pedido_id = $dados['pedido_id'];
            $response = $atributoAmostraPedido->save();
            
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
