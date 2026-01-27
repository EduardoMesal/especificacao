<?php
namespace App\Services;

use App\Models\Produto;
use App\Models\AtributoProduto;
use App\Models\SubAtributoProduto;
use App\Models\AtributoProdutoEspecificacao;
use App\Models\AtributoProdutoIdioma;
use App\Models\AtributoProdutoIndiceEspecificacao;
use App\Models\AtributoProdutoIndicePedido;
use App\Models\AtributoProdutoPedido;
use App\Models\Idioma;
use App\Models\ImagemProduto;
use App\Models\ProdutoIdioma;
use App\Models\SubAtributoProdutoIdioma;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Intervention\Image\Facades\Image;

class ProdutoService
{
    public function index(array $dados = []): LengthAwarePaginator
    {
        $query = Produto::where('excluido',  null)
        ->orderBy('id', 'desc')
        ->with([
            'produtosIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ]);

        if (!empty($dados['nome'])) {
            $query->whereHas('produtosIdiomas', function ($q) use ($dados) {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                })
                ->where('nome', 'like', '%' . $dados['nome'] . '%');
            });
        }

        return $query->paginate(20)->withQueryString();
    }

    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $produto = Produto::create([
                'criado' => Carbon::now()
            ]);

            $response = $produto->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            ProdutoIdioma::create([
                'produto_id' => $produto->id,
                'idioma_id' => 1,
                'nome' => $dados['nome'], 
                'aviso' => $dados['aviso'], 
                'criado' => Carbon::now(),
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_criar_atributo(int | string $id)
    {
        $produto = Produto::where('id', $id)->where('excluido', null)
        ->with([
            'produtosIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->first();

        $atributosProdutos = AtributoProduto::query()
        ->whereNull('excluido')
        ->with([
            'atributosProdutosIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])->get();

        return compact('produto', 'atributosProdutos');
    }

    public function criar_atributo(array $dados, int $produtoId)
    {
        DB::beginTransaction();

        try {
            $produto = Produto::find($produtoId);

            if (!$produto) {
                throw new \Exception('Nenhum produto foi encontrado.', 404);
            }

            $atributoProduto = AtributoProduto::create([
                'criado' => Carbon::now(),
                'produto_id' => $produtoId,
                'tipo' => $dados['tipo']
            ]);

            AtributoProdutoIdioma::create([
                'atributo_produto_id' => $atributoProduto->id,
                'idioma_id' => 1,
                'nome' => $dados['nome'], 
                'unidade' => $dados['unidade'], 
                'criado' => Carbon::now(),
            ]);

            $atributoProdutoPedido = AtributoProdutoIndicePedido::where('produto_id', $produtoId)->where('excluido', null)->get();
            $novosAtributosCriados = [];

            if (isset($dados['att']) && is_array($dados['att'])) {

                foreach ($dados['att'] as $item) {

                    $newSubAttProduto = SubAtributoProduto::create([
                        'atributo_produto_id' => $atributoProduto->id,
                        'criado' => date('Y-m-d H:i:s')
                    ]);
                   
                    SubAtributoProdutoIdioma::create([
                        'nome' => $item['atributo'],
                        'sub_atributos_produtos_id' => $newSubAttProduto->id,
                        'idioma_id' => 1,
                        'observacao' => $item['observacao_selecionavel'],
                        'criado' => date('Y-m-d H:i:s')
                    ]);

                    $novosAtributosCriados[] = $newSubAttProduto->id;
                }

                if(count($novosAtributosCriados) > 0){
                    if($dados['tipo'] == 'multiplos'){
                        if($atributoProdutoPedido->count() > 0){
                            foreach($atributoProdutoPedido as $pedidoId){
                                foreach ($novosAtributosCriados as $subAtributoId) {
                                    
                                    // AtributoProdutoEspecificacao::create([
                                    //     'indice_produto_id' => $especificacaoId,
                                    //     'atributo_produto_id' => $atributoProduto->id,
                                    //     'sub_atributo_id' => $subAtributoId,
                                    //     'observacao_personalizada' => null,
                                    //     'conteudo' => null,
                                    // ]);

                                    AtributoProdutoPedido::create([
                                        'indice_produto_pedido_id' => $pedidoId->id,
                                        'atributo_id' => $atributoProduto->id,
                                        'sub_atributo_id' => $subAtributoId,
                                        'observacao_personalizada' => null,
                                        'conteudo' => null,
                                    ]);
                                    
                                }
                            }
                        }
                    }else{
                        if($atributoProdutoPedido->count() > 0){

                            foreach($atributoProdutoPedido as $pedidoId){
                                
                                // AtributoProdutoEspecificacao::create([
                                //     'indice_produto_id' => $especificacaoId,
                                //     'atributo_produto_id' => $atributoProduto->id,
                                //     'sub_atributo_id' => null,
                                //     'observacao_personalizada' => null,
                                //     'conteudo' => null,
                                // ]);

                                AtributoProdutoPedido::create([
                                    'indice_produto_pedido_id' => $pedidoId->id,
                                    'atributo_id' => $atributoProduto->id,
                                    'sub_atributo_id' => null,
                                    'observacao_personalizada' => null,
                                    'conteudo' => null,
                                ]);
                            }
                        }
                    }
                }
                
            }else{
                $newSubAttProduto = SubAtributoProduto::create([
                    'atributo_produto_id' => $atributoProduto->id,
                    'criado' => date('Y-m-d H:i:s')
                ]);

                SubAtributoProdutoIdioma::create([
                    'nome' => $dados['nome'],
                    'observacao' => $dados['observacao'],
                    'sub_atributos_produtos_id' => $newSubAttProduto->id,
                    'idioma_id' => 1,
                    'criado' => date('Y-m-d H:i:s')
                ]);

                if($atributoProdutoPedido->count() > 0){
                    foreach ($atributoProdutoPedido as $pedidoId) {
                        AtributoProdutoPedido::create([
                            'indice_produto_pedido_id' => $pedidoId->id,
                            'atributo_id' => $atributoProduto->id,
                            'sub_atributo_id' => null,
                            'observacao_personalizada' => null,
                            'conteudo' => null,
                        ]);
                    }
                }
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_criar_produto_amostra(int | string $id)
    {
        $produto = Produto::where('id', $id)->where('excluido', null)
        ->with([
            'produtosIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
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

        return $produto;
    }

    public function criar_amostra(array $dados, int $produtoId, int $especificacaoId)
    {

        DB::beginTransaction();

        try {
           $dadosFormatados = [];

            $indiceProduto =  AtributoProdutoIndiceEspecificacao::create([
                'produto_id' => $produtoId,
                'especificacao_id' => $especificacaoId,
                'criado' => date('Y-m-d H:i:s')
            ]);

            if (isset($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $img) {
                    $extension = $img->getClientOriginalExtension();
                    $photoName = md5(time().rand(0,9999)) . '.' . $extension;
                    $dest = public_path('assets/img/produtos');
                    $image = Image::make($img->getRealPath());
                    $image->save($dest . '/' . $photoName);

                    ImagemProduto::create([
                        'imagem' => $photoName,
                        'produto_indice_id' => $indiceProduto->id,
                    ]);
                }
            }

            if (isset($dados['produtosAtributo']) && is_array($dados['produtosAtributo'])){
                foreach ($dados['produtosAtributo'] as $produto) {
                    if (isset($produto['atributo_multiplo'])) {
                        foreach ($produto['atributo_multiplo'] as $subatributo) {
                            $dadosFormatados[] = [
                                'indice_produto_id' => $indiceProduto->id,
                                'atributo_produto_id' => $produto['atributo_produto_id'],
                                'sub_atributo_id' => $subatributo['subatributo_id'] ?? null,
                                'observacao_personalizada' => $subatributo['observacao_personalizada'] ?? null,
                                'conteudo' => $subatributo['conteudo'] ?? null,
                            ];
                        }
                    } else {
                        $dadosFormatados[] = [
                            'indice_produto_id' => $indiceProduto->id,
                            'atributo_produto_id' => $produto['atributo_produto_id'],
                            'sub_atributo_id' => $produto['atributo_selecionavel']['subatributo_id'] ?? null,
                            'observacao_personalizada' => $produto['observacao_personalizada'] ?? null,
                            'conteudo' => $produto['conteudo'] ?? null,
                        ];
                    }
                }
            }

            $response = AtributoProdutoEspecificacao::insert($dadosFormatados);

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_editar(int | string $id, $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';

        $produto = Produto::where('id', $id)
        ->whereNull('excluido')  
        ->with(['atributos' => function ($query) use ($id, $idioma) {
            $query->where('produto_id', $id) 
            ->whereNull('excluido')->with([
                'atributosProdutosIdiomas' => function ($q)  {
                    $q->whereHas('idiomas', function ($query) {
                        $query->where('codigo', 'pt');
                    });
                },
            ]);
        }])
        ->with([
            'produtosIdiomas' => function ($q) use ($idioma) {
                $q->when($idioma, function ($r) use ($idioma) {
                    $r->whereHas('idiomas', function ($query) use ($idioma) {
                        $query->where('codigo', $idioma);
                    });
                })
                ->when(!$idioma, function ($r) {
                    $r->whereHas('idiomas', function ($query) {
                        $query->where('padrao', true);
                    });
                });
            },
        ])
        ->first();
        
        return $produto;
    }

    public function editar(array $dados, int $produtoId, string $idioma)
    {
        DB::beginTransaction();

        try {
            
            $produto = Produto::where('id', $produtoId)->where('excluido', null)->first();
           
            if (!$produto) {
                throw new \Exception('Nenhum produto foi encontrado.', 404);
            }

            $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();

            $produto_idioma = ProdutoIdioma::query()
                ->where([
                    'excluido' => null,
                    'produto_id' => $produtoId,
                    'idioma_id' => $getIdioma->id
                ])
                ->first();

            if (!$produto_idioma) {
                ProdutoIdioma::create([
                    'produto_id' => $produto->id,
                    'idioma_id' => $getIdioma->id,
                    'nome' => $dados['nome'], 
                    'aviso' => $dados['aviso'], 
                    'criado' => Carbon::now(),

                ]);

            } else {
                $produto_idioma->update([
                    'nome' => $dados['nome'], 
                    'aviso' => $dados['aviso'], 
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_editar_atributo(int | string $id, $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';

        $atributo = AtributoProduto::where('id', $id)
        ->whereNull('excluido')  
        ->with(['subAtributos' => function ($query) use ($idioma) {
            $query->whereNull('excluido')->with([
            'subAtributosProdutosIdiomas' => function ($q) use ($idioma) {
                $q->where('excluido', null)->where('excluido', null)->when($idioma, function ($r) use ($idioma) {
                    $r->whereHas('idiomas', function ($query) use ($idioma) {
                        $query->where('codigo', $idioma);
                    });
                })
                ->when(!$idioma, function ($r) {
                    $r->whereHas('idiomas', function ($query) {
                        $query->where('padrao', true);
                    });
                });
            },
        ]);
        }])
        ->with([
            'atributosProdutosIdiomas' => function ($q) use ($idioma) {
                $q->where('excluido', null)->when($idioma, function ($r) use ($idioma) {
                    $r->whereHas('idiomas', function ($query) use ($idioma) {
                        $query->where('codigo', $idioma);
                    });
                })
                ->when(!$idioma, function ($r) {
                    $r->whereHas('idiomas', function ($query) {
                        $query->where('padrao', true);
                    });
                });
            },
        ])
        ->first();

        $atributosProdutos = AtributoProduto::whereNull('excluido')
        ->with([
            'atributosProdutosIdiomas' => function ($q) use ($idioma) {
                $q->where('excluido', null)->when($idioma, function ($r) use ($idioma) {
                    $r->whereHas('idiomas', function ($query) use ($idioma) {
                        $query->where('codigo', $idioma);
                    });
                })
                ->when(!$idioma, function ($r) {
                    $r->whereHas('idiomas', function ($query) {
                        $query->where('padrao', true);
                    });
                });
            },
        ])->get();

        return compact('atributo', 'atributosProdutos');
    }

    public function editar_atributo(array $dados, int $produtoId, $idioma){

        try {

            $atributoProduto = AtributoProduto::where('id', $produtoId)->where('excluido', null)->first();
            
            $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();

            $atributo_produto_idioma = AtributoProdutoIdioma::query()
                ->where([
                    'excluido' => null,
                    'atributo_produto_id' => $atributoProduto->id,
                    'idioma_id' => $getIdioma->id
                ])
                ->first();

            if (!$atributoProduto) {
                throw new \Exception('Nenhum atributo foi encontrado.', 404);
            }
            
            if ($atributoProduto) {
                $hasChange = false;

                $atributoProdutosIndiceEspecificacoesId = AtributoProdutoIndiceEspecificacao::where('produto_id', $atributoProduto->produto_id)
                ->select('id')
                ->distinct()
                ->pluck('id');

                $atributoProdutoPedido = AtributoProdutoIndicePedido::where('produto_id', $atributoProduto->produto_id)->where('excluido', null)->get();

                if (!$atributo_produto_idioma) {
                    AtributoProdutoIdioma::create([
                        'atributo_produto_id' => $atributoProduto->id,
                        'idioma_id' => $getIdioma->id,
                        'nome' => $dados['nome'], 
                        'unidade' => $dados['unidade'], 
                        'criado' => Carbon::now(),
                    ]);

                } else {
                    $atributo_produto_idioma->update([
                        'nome' => $dados['nome'], 
                        'unidade' => $dados['unidade'], 
                    ]);
                }

                if ($dados['tipo'] && $dados['tipo'] !== $atributoProduto->tipo) {
                    $atributoProduto->tipo = $dados['tipo'];
                    $hasChange = true;
                }


                if($hasChange == true){
                    AtributoProdutoEspecificacao::where('atributo_produto_id', $atributoProduto->id)->delete();
                    AtributoProdutoPedido::where('atributo_id', $atributoProduto->id)->delete();
                    SubAtributoProduto::where('atributo_produto_id', $atributoProduto->id)->delete();
                }

                $novosAtributosCriados = [];

                if ($dados['tipo'] != 'texto' && !empty($dados['att'])) {

                    $attIdFornecidos = collect($dados['att'])->pluck('att_id')->toArray();
                    $idsOriginais = explode(',', $dados['att_ids_originais']);
                    $idsAtuais = collect($dados['att'])->pluck('att_id')->filter()->toArray();
                    $idsRemovidos = array_diff($idsOriginais, $idsAtuais);

                    if (!empty($idsRemovidos)) {
                        SubAtributoProduto::whereIn('id', $idsRemovidos)->update(['excluido' => Carbon::now()]);
                        // SubAtributoProdutoIdioma::where('idioma_id', $getIdioma->id)->whereIn('sub_atributos_produtos_id', $idsRemovidos)->update(['excluido' => Carbon::now()]);
                        if($dados['tipo'] == 'selecionavel'){
                            foreach($idsRemovidos as $item){
                                AtributoProdutoEspecificacao::where('atributo_produto_id', $atributoProduto->id)
                                ->where('sub_atributo_id', $item)
                                ->update([
                                    'sub_atributo_id' => null
                                ]);

                                AtributoProdutoPedido::where('atributo_id', $atributoProduto->id)
                                ->where('sub_atributo_id', $item)
                                ->update([
                                    'sub_atributo_id' => null
                                ]);
                            }

                        }else{
                            AtributoProdutoEspecificacao::where('atributo_produto_id', $atributoProduto->id)
                            ->whereIn('sub_atributo_id', $idsRemovidos)
                            ->delete();

                            AtributoProdutoPedido::where('atributo_id', $atributoProduto->id)
                            ->whereIn('sub_atributo_id', $idsRemovidos)
                            ->delete();
                        }
                    }

                    foreach ($dados['att'] as $index => $item) {
                        if (!empty($item['att_id']) && SubAtributoProduto::where('id', $item['att_id'])->where('atributo_produto_id', $produtoId)->exists()) {
                            $getSubAtributo = SubAtributoProduto::where('id', $item['att_id'])
                                ->where('atributo_produto_id', $produtoId)
                                ->first();

                            SubAtributoProdutoIdioma::updateOrCreate(
                                [
                                    'sub_atributos_produtos_id' => $getSubAtributo->id,
                                    'idioma_id' => $getIdioma->id,
                                ],
                                [
                                    'nome' => $item['atributo'],
                                    'observacao' => $item['observacao'],
                                ]
                            );


                        } else {
                            $novo = SubAtributoProduto::create([
                                'atributo_produto_id' => $produtoId,
                                'criado' => date('Y-m-d H:i:s')
                            ]);

                            SubAtributoProdutoIdioma::create([
                                'nome' => $item['atributo'],
                                'observacao' => $item['observacao'],
                                'idioma_id' => $getIdioma->id,
                                'sub_atributos_produtos_id' => $novo->id,
                                'criado' => date('Y-m-d H:i:s')
                            ]);

                            $novosAtributosCriados[] = $novo->id;
                        }
                    }

                    if(count($novosAtributosCriados) > 0){
                        if($dados['tipo'] == 'multiplos'){
                            if($atributoProdutoPedido->count() > 0){
                                foreach ($atributoProdutoPedido as $pedidoId) {
                                    foreach ($novosAtributosCriados as $subAtributoId) {
                                        // AtributoProdutoEspecificacao::create([
                                        //     'indice_produto_id' => $especificacaoId,
                                        //     'atributo_produto_id' => $atributoProduto->id,
                                        //     'sub_atributo_id' => $subAtributoId,
                                        //     'observacao_personalizada' => null,
                                        //     'conteudo' => null,
                                        // ]);

                                        AtributoProdutoPedido::create([
                                            'indice_produto_pedido_id' => $pedidoId->id,
                                            'atributo_id' => $atributoProduto->id,
                                            'sub_atributo_id' => $subAtributoId,
                                            'observacao_personalizada' => null,
                                            'conteudo' => null,
                                        ]);
                                    }
                                }
                            }
                        }else{
                            if($hasChange == true){
                                if($atributoProdutoPedido->count() > 0){
                                    foreach ($atributoProdutoPedido as $pedidoId) {
                                        // AtributoProdutoEspecificacao::create([
                                        //     'indice_produto_id' => $especificacaoId,
                                        //     'atributo_produto_id' => $atributoProduto->id,
                                        //     'sub_atributo_id' => null,
                                        //     'observacao_personalizada' => null,
                                        //     'conteudo' => null,
                                        // ]);

                                        AtributoProdutoPedido::create([
                                            'indice_produto_pedido_id' => $pedidoId->id,
                                            'atributo_id' => $atributoProduto->id,
                                            'sub_atributo_id' => null,
                                            'observacao_personalizada' => null,
                                            'conteudo' => null,
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }

                if ($dados['tipo'] == 'texto') {
                    $subAtributos = SubAtributoProduto::where('atributo_produto_id', $atributoProduto->id)->get();
                
                    if ($subAtributos->count() > 0) {
                        $primeiro = $subAtributos->first();

                        SubAtributoProdutoIdioma::updateOrCreate(
                            [
                                'sub_atributos_produtos_id' => $primeiro->id,
                                'idioma_id' => $getIdioma->id,
                            ],
                            [
                                'nome' => $dados['nome'],
                                'observacao' => $dados['observacao'],
                            ]
                        );

                
                        $ids = $subAtributos->slice(1)->each(function ($sub) {
                            $sub->delete();

                        });
                    } else {
                        // Se não existe nenhum, cria o primeiro
                        $novo = SubAtributoProduto::create([
                            'atributo_produto_id' => $atributoProduto->id,
                            'criado' => date('Y-m-d H:i:s')
                        ]);

                        SubAtributoProdutoIdioma::create([
                            'nome' => $dados['nome'],
                            'observacao' => $dados['observacao'],
                            'idioma_id' => $getIdioma->id,
                            'sub_atributos_produtos_id' => $novo->id,
                            'criado' => date('Y-m-d H:i:s')
                        ]);

                        $novosAtributosCriados[] = $novo->id;

                        // if(count($novosAtributosCriados) > 0){
                        //     foreach ($atributoProdutosIndiceEspecificacoesId as $especificacaoId) {
                        //         foreach ($novosAtributosCriados as $subAtributoId) {
                        //             AtributoProdutoEspecificacao::create([
                        //                 'indice_produto_id' => $especificacaoId,
                        //                 'atributo_produto_id' => $atributoProduto->id,
                        //                 'sub_atributo_id' => $subAtributoId,
                        //                 'observacao_personalizada' => null,
                        //                 'conteudo' => null,
                        //             ]);
                        //         }
                        //     }
                        // }

                        if(count($novosAtributosCriados) > 0 && count($atributoProdutoPedido) > 0){
                            foreach ($atributoProdutoPedido as $pedidoId) {
                                foreach ($novosAtributosCriados as $subAtributoId) {
                                    AtributoProdutoPedido::create([
                                        'indice_produto_pedido_id' => $pedidoId->id,
                                        'atributo_id' => $atributoProduto->id,
                                        'sub_atributo_id' => null,
                                        'observacao_personalizada' => null,
                                        'conteudo' => null,
                                    ]);
                                }
                            }
                        }
                    }
                }

                $response = $atributoProduto->save();

                if (!$response) {
                    throw new \Exception('Erro ao salvar os dados.');
                }
            } 

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_editar_produto_amostra(int | string $id)
    {
        $atributoProduto = AtributoProdutoIndiceEspecificacao::where('id', $id)->where('excluido', null)->with('imagens')->first();
        $produto = Produto::where('id', $atributoProduto->produto_id)
        ->whereNull('excluido')
        ->with([
            'atributos' => function ($query) use ($atributoProduto) {
                $query->whereNull('excluido')
                    ->with([
                        'subAtributos' => function ($query) use ($atributoProduto) {
                            $query->whereNull('excluido')
                                ->with([
                                    'especificacao' => function ($query) use ($atributoProduto) {
                                        $query->where('indice_produto_id', $atributoProduto->id);
                                    }
                                ]);
                        },
                        'atributoProdutoExpecificacoes' => function ($query) use ($atributoProduto) {
                            $query->where('indice_produto_id', $atributoProduto->id);
                        },
                        'imagens' => function ($query) use ($atributoProduto) {
                            $query->where('indice_produto_id', $atributoProduto->id);
                        },
                    ]);
            }
        ])
        ->first();

        return compact('atributoProduto', 'produto');
    }

    public function editar_amostra(array $dados, int $produtoId)
    {
        DB::beginTransaction();

        try {
            
            $atributoProduto = AtributoProdutoIndiceEspecificacao::where('id', $produtoId)->where('excluido', null)->first();
    
            if(!$atributoProduto){
                return redirect("/dashboard")->with('error', 'Produto não encontrado.');
            }

            $response = null;
            if (isset($dados['produtosAtributo']) && is_array($dados['produtosAtributo'])){
                foreach ($dados['produtosAtributo'] as $produto) {
                    if (isset($produto['atributo_multiplo'])) {
                        foreach ($produto['atributo_multiplo'] as $subatributo) {
                            $response = AtributoProdutoEspecificacao::updateOrCreate(
                                [
                                'indice_produto_id' => $atributoProduto->id,
                                'atributo_produto_id' => $produto['atributo_produto_id'],
                                'sub_atributo_id' => $subatributo['subatributo_id']
                                ],
                                [
                                'observacao_personalizada' => $subatributo['observacao_personalizada'] ?? null,
                                'conteudo' => $subatributo['conteudo'] ?? null,
                                ]
                            );
                            
                        }
                    } else {

                        $response = AtributoProdutoEspecificacao::updateOrCreate(
                            [
                            'indice_produto_id' => $atributoProduto->id,
                            'atributo_produto_id' => $produto['atributo_produto_id'],
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
                    $dest = public_path('assets/img/produtos');
                    $image = Image::make($img->getRealPath());
                    $image->save($dest . '/' . $photoName);

                    ImagemProduto::create([
                        'imagem' => $photoName,
                        'produto_indice_id' => $atributoProduto->id,
                    ]);
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
}
