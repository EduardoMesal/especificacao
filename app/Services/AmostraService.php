<?php
namespace App\Services;

use App\Models\Amostra;
use App\Models\AmostraIdioma;
use App\Models\Especificacao;
use App\Models\Maquina;
use App\Models\AtributoAmostra;
use App\Models\ImagemAmostra;
use App\Models\ImagemAtributoAmostra;
use App\Models\AtributoAmostraIndiceEspecificacao;
use App\Models\SubAtributoAmostra;
use App\Models\AtributoAmostraEspecificacao;
use App\Models\AtributoAmostraIdioma;
use App\Models\Idioma;
use App\Models\SubAtributoAmostraIdioma;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AmostraService
{

    public function index(array $dados = []): LengthAwarePaginator
    {
        $query = Amostra::whereNull('excluido')
        ->orderBy('id', 'desc')
        ->with([
            'amostrasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ]);

        if (!empty($dados['nome'])) {
            $query->whereHas('amostrasIdiomas', function ($q) use ($dados) {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                })
                ->where('nome', 'like', '%' . $dados['nome'] . '%');
            });
        }

        return $query->paginate(20)->withQueryString();
    }

    public function getCriarAtributo($id)
    {
        $amostra = Amostra::where('id', $id)->whereNull('excluido')
        ->with([
            'amostrasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->first();

        $atributosAmostras = AtributoAmostra::query()
            ->whereNull('excluido')
            ->with([
            'atributosAmostrasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])->get();

        return compact('amostra', 'atributosAmostras');
    }

    public function criar(array $dados)
    {
        try {

            $amostra = Amostra::create([
                'criado' => Carbon::now()
            ]);

            $response = $amostra->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            AmostraIdioma::create([
                'amostra_id' => $amostra->id,
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

    public function criar_atributo(array $dados, int $amostraId)
    {
        DB::beginTransaction();

        try {
            $amostra = Amostra::findOrFail($amostraId);

            if (!$amostra) {
                throw new \Exception('Nenhuma amostra foi encontrada.', 404);
            }

            $atributoAmostra = AtributoAmostra::create([
                'criado' => Carbon::now(),
                'amostra_id' => $amostraId,
                'tipo' => $dados['tipo']
            ]);

            AtributoAmostraIdioma::create([
                'atributo_amostra_id' => $atributoAmostra->id,
                'idioma_id' => 1,
                'nome' => $dados['nome'], 
                'unidade' => $dados['unidade'], 
                'criado' => Carbon::now(),
            ]);

            if (isset($dados['att']) && is_array($dados['att'])) {
                foreach ($dados['att'] as $item) {

                    $newSubAttAmostra = SubAtributoAmostra::create([
                        'atributo_id' => $atributoAmostra->id,
                        'criado' => date('Y-m-d H:i:s')
                    ]);
                   
                    SubAtributoAmostraIdioma::create([
                        'nome' => $item['atributo'],
                        'sub_atributos_amostra_id' => $newSubAttAmostra->id,
                        'idioma_id' => 1,
                        'observacao' => $item['observacao_selecionavel'],
                        'criado' => date('Y-m-d H:i:s')
                    ]);
                }

            } else {

                $newSubAttAmostra = SubAtributoAmostra::create([
                    'atributo_id' => $atributoAmostra->id,
                    'criado' => now(),
                ]);

                SubAtributoAmostraIdioma::create([
                    'nome' => $dados['nome'],
                    'observacao' => $dados['observacao'],
                    'sub_atributos_amostra_id' => $newSubAttAmostra->id,
                    'idioma_id' => 1,
                    'criado' => date('Y-m-d H:i:s')
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

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

        return $amostra;
    }

    public function criar_amostra(array $dados, int $amostraId, int $especificacaoId)
    {
        DB::beginTransaction();

        try {
            $dadosFormatados = [];

            $indiceAmostra =  AtributoAmostraIndiceEspecificacao::create([
                'amostra_id' => $amostraId,
                'especificacao_id' => $especificacaoId,
                'criado' => date('Y-m-d H:i:s')
            ]);

            if (isset($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $img) {
                    $extension = $img->getClientOriginalExtension();
                    $photoName = md5(time().rand(0,9999)) . '.' . $extension;
                    $dest = public_path('assets/img/amostras');
                    $image = Image::make($img->getRealPath());
                    $image->save($dest . '/' . $photoName);

                    ImagemAmostra::create([
                        'imagem' => $photoName,
                        'amostra_indice_id' => $indiceAmostra->id,
                    ]);
                }
            }
            
            if (isset($dados['amostrasAtributo']) && is_array($dados['amostrasAtributo'])){
                foreach ($dados['amostrasAtributo'] as $amostra) {
                    if (isset($amostra['atributo_multiplo'])) {
                        foreach ($amostra['atributo_multiplo'] as $subatributo) {
                            $dadosFormatados[] = [
                                'indice_amostra_id' => $indiceAmostra->id,
                                'atributo_id' => $amostra['atributo_id'],
                                'sub_atributo_id' => $subatributo['subatributo_id'] ?? null,
                                'observacao_personalizada' => $subatributo['observacao_personalizada'] ?? null,
                                'conteudo' => $subatributo['conteudo'] ?? null,
                            ];
                        }
                    } else {
                        $dadosFormatados[] = [
                            'indice_amostra_id' => $indiceAmostra->id,
                            'atributo_id' => $amostra['atributo_id'],
                            'sub_atributo_id' => $amostra['atributo_selecionavel']['subatributo_id'] ?? null,
                            'observacao_personalizada' => $amostra['observacao_personalizada'] ?? null,
                            'conteudo' => $amostra['conteudo'] ?? null,
                        ];
                    }
                }
            }

            $response = AtributoAmostraEspecificacao::insert($dadosFormatados);

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getEditar(int | string $id, $dados)
    {

        $idioma = $dados['lang'] ?? 'pt';

        $amostra = Amostra::where('id', $id)
        ->whereNull('excluido')  
        ->with(['atributos' => function ($query) use ($id) {
            $query->where('amostra_id', $id) 
            ->whereNull('excluido')
            ->with([
                'atributosAmostrasIdiomas' => function ($q)  {
                    $q->whereHas('idiomas', function ($query) {
                        $query->where('codigo', 'pt');
                    });
                },
            ]);
        }])
        ->with([
            'amostrasIdiomas' => function ($q) use ($idioma) {
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

        return $amostra;
    }

    public function editar(array $dados, int $amostraId, string $idioma)
    {
        DB::beginTransaction();

        try {
            
            $amostra = Amostra::where('id', $amostraId)->where('excluido', null)->first();

            if (!$amostra) {
                throw new \Exception('Nenhuma amostra foi encontrada.', 404);
            }

            $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();

            $amostra_idioma = AmostraIdioma::query()
                ->where([
                    'excluido' => null,
                    'amostra_id' => $amostraId,
                    'idioma_id' => $getIdioma->id
                ])
                ->first();

            if (!$amostra_idioma) {
                AmostraIdioma::create([
                    'amostra_id' => $amostra->id,
                    'idioma_id' => $getIdioma->id,
                    'nome' => $dados['nome'], 
                    'aviso' => $dados['aviso'], 
                    'criado' => Carbon::now(),

                ]);

            } else {
                $amostra_idioma->update([
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
    

    public function getEditarAtributo(int | string $id, $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';

        $atributo = AtributoAmostra::where('id', $id)
        ->whereNull('excluido')
        ->with(['subAtributos' => function ($query) use ($idioma) {
            $query->whereNull('excluido')->with([
            'subAtributosAmostrasIdiomas' => function ($q) use ($idioma) {
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
        ->with([
            'atributosAmostrasIdiomas' => function ($q) use ($idioma) {
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

        $atributosAmostras = AtributoAmostra::query()
        ->whereNull('excluido')
        ->with([
            'atributosAmostrasIdiomas' => function ($q) use ($idioma) {
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
        ])->get();

        return compact('atributo', 'atributosAmostras');
    }

    public function editar_atributo(array $dados, int $amostraId, $idioma){

        try {

            DB::beginTransaction();
            
            $atributoAmostra = AtributoAmostra::where('id', $amostraId)->where('excluido', null)->first();
            
            $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();

            $atributo_amostra_idioma = AtributoAmostraIdioma::query()
            ->where([
                'excluido' => null,
                'atributo_amostra_id' => $atributoAmostra->id,
                'idioma_id' => $getIdioma->id
            ])
            ->first();

            if (!$atributoAmostra) {
                throw new \Exception('Nenhuma amostra foi encontrada.', 404);
            }

            if ($atributoAmostra) {
                $hasChange = false;
                
                $atributoAmostrasIndiceEspecificacoesId = AtributoAmostraIndiceEspecificacao::where('amostra_id', $atributoAmostra->amostra_id)
                ->select('id')
                ->distinct()
                ->pluck('id');

                if (!$atributo_amostra_idioma) {
                    AtributoAmostraIdioma::create([
                        'atributo_amostra_id' => $atributoAmostra->id,
                        'idioma_id' => $getIdioma->id,
                        'nome' => $dados['nome'], 
                        'unidade' => $dados['unidade'], 
                        'criado' => Carbon::now(),
                    ]);

                } else {
                    $atributo_amostra_idioma->update([
                        'nome' => $dados['nome'], 
                        'unidade' => $dados['unidade'], 
                    ]);
                }

                if ($dados['tipo'] && $dados['tipo'] !== $atributoAmostra->tipo) {
                    $atributoAmostra->tipo = $dados['tipo'];
                    $hasChange = true;
                }


                if($hasChange == true){
                    AtributoAmostraEspecificacao::where('atributo_id', $atributoAmostra->id)->delete();
                    SubAtributoAmostra::where('atributo_id', $atributoAmostra->id)->delete();
                }

                $novosAtributosCriados = [];

                if ($dados['tipo'] != 'texto' && !empty($dados['att'])) {

                    $attIdFornecidos = collect($dados['att'])->pluck('att_id')->toArray();
                    $idsOriginais = explode(',', $dados['att_ids_originais']);
                    $idsAtuais = collect($dados['att'])->pluck('att_id')->filter()->toArray(); // remove null
                    $idsRemovidos = array_diff($idsOriginais, $idsAtuais);
                    if (!empty($idsRemovidos)) {
                        SubAtributoAmostra::whereIn('id', $idsRemovidos)->update(['excluido' => Carbon::now()]);
                        // SubAtributoAmostraIdioma::where('idioma_id', $getIdioma->id)->whereIn('sub_atributos_amostra_id', $idsRemovidos)->update(['excluido' => Carbon::now()]);
                        if($dados['tipo'] == 'selecionavel'){
                            
                            foreach($idsRemovidos as $item){
                                AtributoAmostraEspecificacao::where('atributo_id', $atributoAmostra->id)
                                ->where('sub_atributo_id', $item)
                                ->update([
                                    'sub_atributo_id' => null
                                ]);
                            }

                        }else{
                            AtributoAmostraEspecificacao::where('atributo_id', $atributoAmostra->id)
                            ->whereIn('sub_atributo_id', $idsRemovidos)
                            ->delete();
                        }
                    }

                    foreach ($dados['att'] as $index => $item) {
                        if (!empty($item['att_id']) && SubAtributoAmostra::where('id', $item['att_id'])->where('atributo_id', $amostraId)->exists()) {
                            $getSubAtributo = SubAtributoAmostra::where('id', $item['att_id'])
                            ->where('atributo_id', $amostraId)
                            ->first();

                            SubAtributoAmostraIdioma::updateOrCreate(
                                [
                                    'sub_atributos_amostra_id' => $getSubAtributo->id,
                                    'idioma_id' => $getIdioma->id,
                                ],
                                [
                                    'nome' => $item['atributo'],
                                    'observacao' => $item['observacao'],
                                ]
                            );

                        } else {

                            $novo = SubAtributoAmostra::create([
                                'atributo_id' => $amostraId,
                                'criado' => date('Y-m-d H:i:s')
                            ]);

                            SubAtributoAmostraIdioma::create([
                                'nome' => $item['atributo'],
                                'observacao' => $item['observacao'],
                                'idioma_id' => $getIdioma->id,
                                'sub_atributos_amostra_id' => $novo->id,
                                'criado' => date('Y-m-d H:i:s')
                            ]);

                            $novosAtributosCriados[] = $novo->id;
                        }
                    }

                    if(count($novosAtributosCriados) > 0){
                        if($dados['tipo'] == 'multiplos'){
                            foreach ($atributoAmostrasIndiceEspecificacoesId as $especificacaoId) {
                                foreach ($novosAtributosCriados as $subAtributoId) {
                                    AtributoAmostraEspecificacao::create([
                                        'indice_amostra_id' => $especificacaoId,
                                        'atributo_id' => $atributoAmostra->id,
                                        'sub_atributo_id' => $subAtributoId,
                                        'observacao_personalizada' => null,
                                        'conteudo' => null,
                                    ]);
                                }
                            }
                        }else{
                            if($hasChange == true){
                                foreach ($atributoAmostrasIndiceEspecificacoesId as $especificacaoId) {
                                        AtributoAmostraEspecificacao::create([
                                        'indice_amostra_id' => $especificacaoId,
                                        'atributo_id' => $atributoAmostra->id,
                                        'sub_atributo_id' => null,
                                        'observacao_personalizada' => null,
                                        'conteudo' => null,
                                    ]);
                                }
                            }
                        }
                    }
                    
                }

                if ($dados['tipo'] == 'texto') {
                    $subAtributos = SubAtributoAmostra::where('atributo_id', $atributoAmostra->id)->get();
                
                    if ($subAtributos->count() > 0) {
                        $primeiro = $subAtributos->first();

                        SubAtributoAmostraIdioma::updateOrCreate(
                            [
                                'sub_atributos_amostra_id' => $primeiro->id,
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

                        $novo = SubAtributoAmostra::create([
                            'atributo_id' => $atributoAmostra->id,
                            'criado' => date('Y-m-d H:i:s')
                        ]);

                        SubAtributoAmostraIdioma::create([
                            'nome' => $dados['nome'],
                            'observacao' => $dados['observacao'],
                            'idioma_id' => $getIdioma->id,
                            'sub_atributos_amostra_id' => $novo->id,
                            'criado' => date('Y-m-d H:i:s')
                        ]);

                        $novosAtributosCriados[] = $novo->id;

                        if(count($novosAtributosCriados) > 0){
                            foreach ($atributoAmostrasIndiceEspecificacoesId as $especificacaoId) {
                                foreach ($novosAtributosCriados as $subAtributoId) {
                                    AtributoAmostraEspecificacao::create([
                                        'indice_amostra_id' => $especificacaoId,
                                        'atributo_id' => $atributoAmostra->id,
                                        'sub_atributo_id' => $subAtributoId,
                                        'observacao_personalizada' => null,
                                        'conteudo' => null,
                                    ]);
                                }
                            }
                        }
                    }
                }

                $response = $atributoAmostra->save();

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

    public function get_editar_amostra(int | string $id)
    {
        $atributoAmostra = AtributoAmostraIndiceEspecificacao::where('id', $id)->where('excluido', null)->with('imagens')->first();
        
        $especificalcoesAssoc = Especificacao::where('id', $atributoAmostra->especificacao_id)->where('excluido', null)->first();
       
        $maquina = Maquina::where('id', $especificalcoesAssoc->maquina_id)
        ->whereNull('excluido')
        ->with([
            'maquinasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->first();

        $maquinasEspecificacoesAssoc = $maquina->expecificacoes()
        ->whereNull('excluido')
        ->where('id', '!=', $especificalcoesAssoc->id)
        ->paginate(10);

        $amostra = Amostra::where('id', $atributoAmostra->amostra_id)
        ->whereNull('excluido')
        ->with([
            'amostrasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->with([
            'atributos' => function ($query) use ($atributoAmostra) {
                $query->whereNull('excluido')
                ->with([
                    'atributosAmostrasIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ])
                ->with([
                    'subAtributos' => function ($query) use ($atributoAmostra) {
                        $query->whereNull('excluido')
                            ->with([
                                'subAtributosAmostrasIdiomas' => function ($q)  {
                                    $q->whereHas('idiomas', function ($query) {
                                        $query->where('codigo', 'pt');
                                    });
                                },
                            ])
                            ->with([
                                'especificacao' => function ($query) use ($atributoAmostra) {
                                    $query->where('indice_amostra_id', $atributoAmostra->id);
                                }
                            ]);
                    },
                    'atributoAmostraExpecificacoes' => function ($query) use ($atributoAmostra) {
                        $query->where('indice_amostra_id', $atributoAmostra->id);
                    },
                    'imagens' => function ($query) use ($atributoAmostra) {
                        $query->where('indice_amostra_id', $atributoAmostra->id);
                    },
                ]);
            }
        ])
        ->first();

        $query = [
            'atributoAmostra' => $atributoAmostra,
            'especificalcoesAssoc' => $especificalcoesAssoc,
            'amostra' => $amostra,
            'maquinasEspecificacoesAssoc' => $maquinasEspecificacoesAssoc
        ];

        return $query; 
    }

    public function editar_amostra(array $dados, int $amostraId)
    {
        DB::beginTransaction();

        try {
            
            $atributoAmostra = AtributoAmostraIndiceEspecificacao::where('id', $amostraId)->where('excluido', null)->first();

            if (!$atributoAmostra) {
                throw new \Exception('Nenhuma amostra foi encontrada.', 404);
            }

            $response = null;

            if (isset($dados['amostrasAtributo']) && is_array($dados['amostrasAtributo'])){
                foreach ($dados['amostrasAtributo'] as $amostra) {
                    if (isset($amostra['atributo_multiplo'])) {
                        foreach ($amostra['atributo_multiplo'] as $subatributo) {
                            $response = AtributoAmostraEspecificacao::updateOrCreate(
                                [
                                'indice_amostra_id' => $atributoAmostra->id,
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

                        $response = AtributoAmostraEspecificacao::updateOrCreate(
                            [
                            'indice_amostra_id' => $atributoAmostra->id,
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

            if (isset($dados['imagens']) && is_array($dados['imagens'])) {
                foreach ($dados['imagens'] as $img) {
                    $extension = $img->getClientOriginalExtension();
                    $photoName = md5(time().rand(0,9999)) . '.' . $extension;
                    $dest = public_path('assets/img/amostras');
                    $image = Image::make($img->getRealPath());
                    $image->save($dest . '/' . $photoName);

                    ImagemAmostra::create([
                        'imagem' => $photoName,
                        'amostra_indice_id' => $atributoAmostra->id,
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

    public function copiar_action(array $dados)
    {
        DB::beginTransaction();

        try {
            $especificacaoIndiceAmostra = AtributoAmostraIndiceEspecificacao::findOrFail($dados['indice_amostra_id']);

            if (!$especificacaoIndiceAmostra) {
                throw new \Exception('Nenhuma especificação foi encontrada.', 404);
            }

            if (isset($dados['especificacoes']) && is_array($dados['especificacoes'])) {
                $registrosOriginais = AtributoAmostraEspecificacao::where('indice_amostra_id', $especificacaoIndiceAmostra->id)->get();
                $registrosOriginaisImagens = ImagemAmostra::where('amostra_indice_id', $especificacaoIndiceAmostra->id)->get();
                $registrosOriginaisImagensAtroibutos = ImagemAtributoAmostra::where('indice_amostra_id', $especificacaoIndiceAmostra->id)->get();

                foreach ($dados['especificacoes'] as $especificacaoIdDestino) {
                    $novoIndice = AtributoAmostraIndiceEspecificacao::create([
                        'amostra_id' => $especificacaoIndiceAmostra->amostra_id,
                        'especificacao_id' => $especificacaoIdDestino,
                        'criado' => now(),
                    ]);

                    foreach ($registrosOriginais as $registroOriginal) {
                        $novo = $registroOriginal->replicate();
                        $novo->indice_amostra_id = $novoIndice->id;
                        $novo->save();
                    }

                    foreach ($registrosOriginaisImagens as $registroOriginal) {
                        $novo = $registroOriginal->replicate();
                        $novo->amostra_indice_id = $novoIndice->id;

                        if ($registroOriginal->imagem) {
                            $origem = public_path('assets/img/amostras/' . $registroOriginal->imagem);

                            if (file_exists($origem)) {
                                $extensao = pathinfo($registroOriginal->imagem, PATHINFO_EXTENSION);
                                $novoNomeImagem = md5(time().rand(0,9999)) . '.' . $extensao;
                                $destino = public_path('assets/img/amostras/' . $novoNomeImagem);

                                copy($origem, $destino);

                                $novo->imagem = $novoNomeImagem;
                            }
                        }

                        $novo->save();
                    }

                    foreach ($registrosOriginaisImagensAtroibutos as $registroOriginal) {
                        $novo = $registroOriginal->replicate();
                        $novo->indice_amostra_id = $novoIndice->id;

                         if ($registroOriginal->imagem) {
                            $origem = public_path('assets/img/amostras/atributos/' . $registroOriginal->imagem);

                            if (file_exists($origem)) {
                                $extensao = pathinfo($registroOriginal->imagem, PATHINFO_EXTENSION);
                                $novoNomeImagem = md5(time().rand(0,9999)) . '.' . $extensao;
                                $destino = public_path('assets/img/amostras/atributos/' . $novoNomeImagem);

                                copy($origem, $destino);

                                $novo->imagem = $novoNomeImagem;
                            }
                        }

                        $novo->save();
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
