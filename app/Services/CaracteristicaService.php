<?php
namespace App\Services;

use App\Models\Caracteristica;
use App\Models\Secao;
use App\Models\Atributo;
use App\Models\AtributoEspecificacao;
use App\Models\AtributoIdioma;
use App\Models\CaracteristicaIdioma;
use App\Models\Idioma;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CaracteristicaService
{
    public function index(array $dados = []): LengthAwarePaginator
    {
        $query = Caracteristica::where('excluido',  null)
            ->orderBy('id', 'desc')
            ->with([
                'caracteristicasIdiomas' => function ($q)  {
                    $q->whereHas('idiomas', function ($query) {
                        $query->where('codigo', 'pt');
                    });
                },
            ]);

        if (!empty($dados['nome'])) {
            $query->whereHas('caracteristicasIdiomas', function ($q) use ($dados) {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                })
                ->where('nome', 'like', '%' . $dados['nome'] . '%');
            });
        }

        return $query->paginate(20)->withQueryString();
    }

    public function getCriar()
    {
        $secoes = Secao::where('excluido', null)
        ->with([
            'secoesIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get();

        $caracteristicas = Caracteristica::query()
        ->whereNull('excluido')
        ->with([
            'caracteristicasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])->get();

        return compact('secoes', 'caracteristicas');
    }

    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $caracteristica = Caracteristica::create([
                'criado' => Carbon::now(),
                'comparavel' => $dados['comparavel'],
                'tipo' => $dados['tipo'],
                'secao_id' => $dados['secao_id'],
            ]);

            $response = $caracteristica->save();
            
            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }
          
            CaracteristicaIdioma::create([
                'caracteristica_id' => $caracteristica->id,
                'idioma_id' => 1,
                'nome' => $dados['nome'], 
                'aviso' => $dados['aviso'], 
                'unidade' => $dados['unidade'], 
                'criado' => Carbon::now(),
            ]);

            if ($response) {

                if (isset($dados['att']) && is_array($dados['att'])) {
                    foreach ($dados['att'] as $item) {

                        $newAtributo = Atributo::create([
                            'caracteristica_id' => $caracteristica->id,
                            'criado' => date('Y-m-d H:i:s')
                        ]);
                    
                        AtributoIdioma::create([
                            'nome' => $item['atributo'],
                            'atributo_id' => $newAtributo->id,
                            'idioma_id' => 1,
                            'observacao' => $item['observacao'],
                            'criado' => date('Y-m-d H:i:s')
                        ]);
                    }

                } else {

                    $newSubAttAmostra = Atributo::create([
                        'caracteristica_id' => $caracteristica->id,
                        'criado' => now(),
                    ]);

                    AtributoIdioma::create([
                        'nome' => $dados['nome'],
                        'observacao' => $dados['observacao'],
                        'atributo_id' => $newSubAttAmostra->id,
                        'idioma_id' => 1,
                        'criado' => date('Y-m-d H:i:s')
                    ]);
                }

                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getEditar(int | string $id, $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';

        $caracteristica = Caracteristica::where('id', $id)
        ->with([
            'caracteristicasIdiomas' => function ($q) use ($idioma) {
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
        ->whereNull('excluido')
        ->with(['atributos' => function ($query) use ($id, $idioma) {
            $query->where('caracteristica_id', $id)->whereNull('excluido')
            ->with([
                'atributosIdiomas' => function ($q) use ($idioma) {
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
            ]);
        }])
        ->first();

        $secoes = Secao::where('excluido', null)
        ->with([
            'secoesIdiomas' => function ($q) use ($idioma) {
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
        ->get();

        $caracteristicas = Caracteristica::query()
        ->whereNull('excluido')
         ->with([
            'caracteristicasIdiomas' => function ($q) use ($idioma) {
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
        ->get();

        return compact('caracteristica', 'secoes', 'caracteristicas');
    }

    public function editar(array $dados, int $caracteristicaId, $idioma){

        try {

            $caracteristica = Caracteristica::where('id', $caracteristicaId)->where('excluido', null)->first();
            
            if (!$caracteristica) {
                throw new \Exception('Nenhuma característica foi encontrada.', 404);
            }

            $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();
            
            if ($caracteristica) {
                
                $hasChange = false;
                $atributosEspecificacoesId = AtributoEspecificacao::where('caracteristica_id', $caracteristica->id)
                ->select('especificacao_id')
                ->distinct()
                ->pluck('especificacao_id');

                $caracteristica_idioma = CaracteristicaIdioma::query()
                    ->where([
                        'excluido' => null,
                        'caracteristica_id' => $caracteristicaId,
                        'idioma_id' => $getIdioma->id
                    ])
                    ->first();

                if (!$caracteristica_idioma) {
                    CaracteristicaIdioma::create([
                        'caracteristica_id' => $caracteristica->id,
                        'idioma_id' => $getIdioma->id,
                        'nome' => $dados['nome'], 
                        'aviso' => $dados['aviso'], 
                        'unidade' => $dados['unidade'], 
                        'criado' => Carbon::now(),
                    ]);

                } else {
                    $caracteristica_idioma->update([
                        'nome' => $dados['nome'], 
                        'aviso' => $dados['aviso'], 
                        'unidade' => $dados['unidade'], 
                    ]);
                }
                
                $caracteristica->comparavel = $dados['comparavel'];

                if ($dados['secao_id'] && $dados['secao_id'] !== $caracteristica->secao_id) {
                    $caracteristica->secao_id = $dados['secao_id'];
                }

                if ($dados['tipo'] && $dados['tipo'] !== $caracteristica->tipo) {
                    $caracteristica->tipo = $dados['tipo'];
                    $hasChange = true;
                }

                if($hasChange == true){
                    AtributoEspecificacao::where('caracteristica_id', $caracteristica->id)->delete();
                    Atributo::where('caracteristica_id', $caracteristica->id)->delete();
                }
                
                $novosAtributosCriados = [];

                if ($dados['tipo'] != 'texto' && !empty($dados['att'])) {

                    $attIdFornecidos = collect($dados['att'])->pluck('att_id')->toArray();
                    $idsOriginais = explode(',', $dados['att_ids_originais']);
                    $idsAtuais = collect($dados['att'])->pluck('att_id')->filter()->toArray();

                    $idsRemovidos = array_diff($idsOriginais, $idsAtuais);

                    if (!empty($idsRemovidos)) {
                        Atributo::whereIn('id', $idsRemovidos)->update(['excluido' => Carbon::now()]);
                        // AtributoIdioma::where('idioma_id', $getIdioma->id)->whereIn('atributo_id', $idsRemovidos)->update(['excluido' => Carbon::now()]);

                        if($dados['tipo'] == 'selecionavel'){
                            foreach($idsRemovidos as $item){
                                AtributoEspecificacao::where('caracteristica_id', $caracteristicaId)
                                ->where('atributo_id', $item)
                                ->update([
                                    'atributo_id' => null
                                ]);
                            }
                        }else{
                            AtributoEspecificacao::where('caracteristica_id', $caracteristicaId)
                            ->whereIn('atributo_id', $idsRemovidos)
                            ->delete();
                        }
                    }

                    foreach ($dados['att'] as $index => $item) {
                        if (!empty($item['att_id']) && Atributo::where('id', $item['att_id'])->where('caracteristica_id', $caracteristicaId)->exists()) {
                            // Atualizar atributo existente

                            $getAtributo = Atributo::where('id', $item['att_id'])
                                ->where('caracteristica_id', $caracteristicaId)
                                ->first();

                            AtributoIdioma::updateOrCreate(
                                [
                                    'atributo_id' => $getAtributo->id,
                                    'idioma_id' => $getIdioma->id,
                                ],
                                [
                                    'nome' => $item['atributo'],
                                    'observacao' => $item['observacao'],
                                    'excluido' => null
                                ]
                            );


                        } else {

                            $novo = Atributo::create([
                                'caracteristica_id' => $caracteristicaId,
                                'criado' => date('Y-m-d H:i:s')
                            ]);

                            AtributoIdioma::create([
                                'nome' => $item['atributo'],
                                'observacao' => $item['observacao'],
                                'idioma_id' => $getIdioma->id,
                                'atributo_id' => $novo->id,
                                'criado' => date('Y-m-d H:i:s')
                            ]);

                            $novosAtributosCriados[] = $novo->id;
                        }
                    }

                    if(count($novosAtributosCriados) > 0){
                        if($dados['tipo'] == 'multiplos'){
                            foreach ($atributosEspecificacoesId as $especificacaoId) {
                                foreach ($novosAtributosCriados as $atributoId) {
                                    AtributoEspecificacao::create([
                                        'especificacao_id' => $especificacaoId,
                                        'caracteristica_id' => $caracteristica->id,
                                        'atributo_id' => $atributoId,
                                        'observacao_personalizada' => null,
                                        'conteudo' => null,
                                    ]);
                                }
                            }
                        }else{
                            if($hasChange == true){
                                foreach ($atributosEspecificacoesId as $especificacaoId) {
                                    AtributoEspecificacao::create([
                                        'especificacao_id' => $especificacaoId,
                                        'caracteristica_id' => $caracteristica->id,
                                        'atributo_id' =>  null,
                                        'observacao_personalizada' => null,
                                        'conteudo' => null,
                                    ]);
                                }
                            }
                        }
                    }
                }

                if ($dados['tipo'] == 'texto') {
                    $atributosCaracteristica = Atributo::where('caracteristica_id', $caracteristica->id)->where('excluido', null)->get();

                    if ($atributosCaracteristica->count() > 0) {
                        $primeiro = $atributosCaracteristica->first();
                        
                        AtributoIdioma::updateOrCreate(
                            [
                                'atributo_id' => $primeiro->id,
                                'idioma_id' => $getIdioma->id,
                            ],
                            [
                                'nome' => $dados['nome'],
                                'observacao' => $dados['observacao'],
                                'excluido' => null
                            ]
                        );

                        $atributosCaracteristica->slice(1)->each(function ($sub) {
                            $sub->delete();
                        });

                    } else {

                        $novo = Atributo::create([
                            'caracteristica_id' => $caracteristica->id,
                            'criado' => date('Y-m-d H:i:s')
                        ]);

                        AtributoIdioma::create([
                            'nome' => $dados['nome'],
                            'observacao' => $dados['observacao'],
                            'idioma_id' => $getIdioma->id,
                            'atributo_id' => $novo->id,
                            'criado' => date('Y-m-d H:i:s')
                        ]);

                        $novosAtributosCriados[] = $novo->id;
                    }

                    if(count($novosAtributosCriados) > 0){
                        foreach ($atributosEspecificacoesId as $especificacaoId) {
                            foreach ($novosAtributosCriados as $atributoId) {
                                AtributoEspecificacao::create([
                                    'especificacao_id' => $especificacaoId,
                                    'caracteristica_id' => $caracteristica->id,
                                    'atributo_id' => $atributoId,
                                    'observacao_personalizada' => null,
                                    'conteudo' => null,
                                ]);
                            }
                        }
                    }
                }

                $response = $caracteristica->save();
                
                if (!$response) {
                    throw new \Exception('Erro ao salvar os dados.');
                }

                DB::commit();
            } 
            
        }catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function copiar(int | string $id)
    {
        $caracteristica = Caracteristica::where('id', $id)
        ->whereNull('excluido')
        ->with([
            'caracteristicasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->with(['atributos' => function ($query) use ($id) {
            $query->where('caracteristica_id', $id) 
            ->whereNull('excluido')
            ->with([
                'atributosIdiomas' => function ($q)  {
                    $q->whereHas('idiomas', function ($query) {
                        $query->where('codigo', 'pt');
                    });
                },
            ]);
        }])
        ->first();

        $secoes = Secao::where('excluido', null)
        ->with([
            'secoesIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get();

        return compact('caracteristica', 'secoes');
    }
}
