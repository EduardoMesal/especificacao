<?php
namespace App\Services;

use App\Models\Maquina;
use App\Models\Amostra;
use App\Models\Produto;
use App\Models\EquipamentoOrigem;
use App\Models\CaracteristicaMaquina;
use App\Models\Caracteristica;
use App\Models\AmostraMaquina;
use App\Models\ProdutoMaquina;
use App\Models\AtributoEspecificacao;
use App\Models\Idioma;
use App\Models\MaquinaIdioma;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class MaquinaService
{

     public function index(array $dados = []): array 
    {
       
       $maquinas = Maquina::where('excluido', null)->orderBy('id', 'desc')
       ->with(['equipamento' => function ($query) {
            $query->whereNull('excluido')
            ->with([
                'equipamentosOrigemIdiomas' => function ($q)  {
                    $q->whereHas('idiomas', function ($query) {
                        $query->where('codigo', 'pt');
                    });
                },
            ]);
        }])
        ->with([
            'maquinasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ]);


        if (!empty($dados['nome'])) {
            $maquinas->whereHas('maquinasIdiomas', function ($q) use ($dados) {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                })
                ->where('nome', 'like', '%' . $dados['nome'] . '%');
            });
        }

        if ($dados['equipamento_id']) {
            $maquinas->where('equipamento_id', $dados['equipamento_id']);
        }

        $equipamentos = EquipamentoOrigem::where('excluido', null)
         ->with([
            'equipamentosOrigemIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get()
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'nome' => $item->equipamentosOrigemIdiomas->where('idiomas.codigo', 'pt')->first()->nome
            ];
        });

        $maquinas = $maquinas->paginate(20)->withQueryString();

        $query = [
            'maquinas' => $maquinas,
            'equipamentos' => $equipamentos,
        ];

        return $query; 
    }

    public function get_criar()
    {
        $caracteristicas = Caracteristica::where('excluido', null)
        ->with([
            'caracteristicasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get();

        $produtos = Produto::where('excluido', null)
        ->with([
            'produtosIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get();
        
        $amostras = Amostra::where('excluido', null)
        ->with([
            'amostrasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get();
        
        $equipamentos = EquipamentoOrigem::where('excluido',  null)
         ->with([
            'equipamentosOrigemIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get();
       
        return compact('amostras', 'caracteristicas', 'produtos', 'equipamentos');
    }

    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $slug = Str::slug($dados['nome']);
            $count = MaquinaIdioma::where('nome', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            $photoName = null;

            if (isset($dados['imagem']) && $dados['imagem'] && $dados['imagem']->isValid()) {

                $imagem = $dados['imagem'];
                $extension = $dados['imagem']->extension();

                $dest = public_path('assets/img/maquinas');
                $photoName = md5(time() . rand(0, 9999)) . '.' . $extension;

                $img = Image::make($imagem->getRealPath());
                $img->save($dest . '/' . $photoName);
            }

            $maquina = Maquina::create([
                'criado' => Carbon::now(),
                'slug' => $slug,
                'ncm' => $dados['ncm'],
                'equipamento_id' => $dados['equipamento_id'],
                'imagem' => $photoName,
                'criado' => Carbon::now(),
            ]);

            $response = $maquina->save();
            
            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }
            
            if ($response) {

                MaquinaIdioma::create([
                    'maquina_id' => $maquina->id,
                    'idioma_id' => 1,
                    'nome' => $dados['nome'], 
                    'observacao' => $dados['observacao'], 
                    'observacao_comercial' => null, 
                    'criado' => Carbon::now(),
                ]);

                if (isset($dados['caracteristicas']) && is_array($dados['caracteristicas'])) {
                    foreach($dados['caracteristicas'] as $c){
                        CaracteristicaMaquina::create([
                            'caracteristica_id' => $c,
                            'maquina_id' => $maquina->id
                        ]);
                    }
                }

                if (isset($dados['amostras']) && is_array($dados['amostras'])) {
                    foreach($dados['amostras'] as $a){
                        AmostraMaquina::create([
                            'amostra_id' => $a,
                            'maquina_id' => $maquina->id
                        ]);
                    }
                }

                if (isset($dados['produtos']) && is_array($dados['produtos'])) {
                    foreach($dados['produtos'] as $p){
                        ProdutoMaquina::create([
                            'produto_id' => $p,
                            'maquina_id' => $maquina->id
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

    public function get_editar(int | string $id, $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';

        $maquina = Maquina::where('id', $id)
        ->whereNull('excluido')
        ->with([
            'maquinasIdiomas' => function ($q) use ($idioma) {
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
        
        $criadoEm = $maquina->criado;

        $maquina->load(['caracteristicas' => function ($query) use ($criadoEm) {
            $query->where(function ($q) use ($criadoEm) {
                $q->whereNull('excluido')
                ->orWhere('excluido', '>', $criadoEm);
            });
        }]);

        $caracteristicas = Caracteristica::where(function ($q) use ($criadoEm) {
            $q->whereNull('excluido');
            // ->orWhere('excluido', '>', $criadoEm);
        })
        ->with([
            'caracteristicasIdiomas' => function ($q) use ($idioma) {
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
        ->get();

        $amostras = Amostra::where('excluido',  null)
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
        ->get();

        $produtos = Produto::where('excluido',  null)
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
        ->get();

        $equipamentos = EquipamentoOrigem::where('excluido',  null)
        ->with([
            'equipamentosOrigemIdiomas' => function ($q) use ($idioma) {
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
        ->get();

        $caracteristicasIds = $maquina->caracteristicas->pluck('id')->toArray();
        $amostrasIds = $maquina->amostras->pluck('id')->toArray();
        $produtosIds = $maquina->produtos->pluck('id')->toArray();

        return compact('maquina', 'caracteristicas', 'caracteristicasIds', 'equipamentos', 'amostras', 'produtos', 'amostrasIds', 'produtosIds');
    }

    public function editar(array $dados, int $maquinaId, string $idioma)
    {
        DB::beginTransaction();

        try {

            $maquina = Maquina::where('id', $maquinaId)->where('excluido', null)->with('caracteristicas')->with(['expecificacoes' => function ($query) {
                $query->whereNull('excluido'); 
            }])->first();

            $especs = $maquina->expecificacoes->map(fn($item) => [
                'id' => $item->id,
                'revisao_id' => $item->revisao_selecionada_id,
            ]);

            if ($maquina) {

                $getIdioma = Idioma::where('excluido', null)->where('codigo', $idioma)->first();

                $maquina_idioma = MaquinaIdioma::query()
                    ->where([
                        'excluido' => null,
                        'maquina_id' => $maquinaId,
                        'idioma_id' => $getIdioma->id
                    ])
                    ->first();

                if (!$maquina_idioma) {
                    $maquina_idioma = MaquinaIdioma::create([
                        'maquina_id' => $maquina->id,
                        'idioma_id' => $getIdioma->id,
                        'nome' => $dados['nome'], 
                        'observacao' => $dados['observacao'], 
                        'criado' => Carbon::now(),
                    ]);

                } else {
                    $maquina_idioma->update([
                        'nome' => $dados['nome'], 
                        'observacao' => $dados['observacao'], 
                    ]);
                }

                if ($getIdioma->padrao) {
                    $slug = Str::slug($dados['nome']);
                    
                    $countSlugMaquina = Maquina::where('slug', $slug)
                        ->where('id', '!=', $maquina->id)
                        ->where('excluido', null)
                        ->count();

                    if ($countSlugMaquina > 0) {
                        $originalSlug = $slug;
                        $counter = 1;
                        
                        do {
                            $slug = $originalSlug . '-' . $counter;
                            $count = Maquina::where('slug', $slug)
                                ->where('id', '!=', $maquina->id)
                                ->where('excluido', null)
                                ->count();
                            $counter++;
                        } while ($count > 0);
                    }

                    $maquina->slug = $slug;
                 
                }

                if ($dados['equipamento_id'] && $dados['equipamento_id'] !== $maquina->equipamento_id) {
                    $maquina->equipamento_id = $dados['equipamento_id'];
                }

                if ($dados['ncm'] && $dados['ncm'] !== $maquina->ncm) {
                    $maquina->ncm = $dados['ncm'];
                }

                if (isset($dados['imagem']) && $dados['imagem'] && $dados['imagem']->isValid()) {
                    $imagem = $dados['imagem'];
                    $extension = $dados['imagem']->extension();
                    File::delete(public_path("/assets/img/maquinas/" . $maquina->imagem));
                    $dest = public_path('assets/img/maquinas');
                    $photoName = md5(time() . rand(0, 9999)) . '.' . $extension;
        
                    $img = Image::make($imagem->getRealPath());
                    $img->save($dest . '/' . $photoName);
        
                    $maquina->imagem = $photoName;
                }

                if (isset($dados['caracteristicas']) && is_array($dados['caracteristicas'])) {

                    $removeCaracteristicas = CaracteristicaMaquina::where('maquina_id', $maquina->id)
                    ->whereNotIn('caracteristica_id', $dados['caracteristicas'])
                    ->get();
                
                    $removeCaracteristicasIds = $removeCaracteristicas->pluck('caracteristica_id');
                    
                    AtributoEspecificacao::whereIn('especificacao_id', $especs->pluck('id'))
                        ->whereIn('caracteristica_id', $removeCaracteristicasIds)
                        ->delete();
                    
                    $removeCaracteristicas->each->delete();

                    $caracteristicasCriadas = [];

                    foreach ($dados['caracteristicas'] as $c) {
                        $caracteristica = CaracteristicaMaquina::updateOrCreate(
                            [
                                'maquina_id' => $maquina->id,
                                'caracteristica_id' => $c,
                            ],
                            [
                                'maquina_id' => $maquina->id,
                                'caracteristica_id' => $c,
                            ]
                        );

                        if ($caracteristica->wasRecentlyCreated) {
                            $caracteristicasCriadas[] = $caracteristica->caracteristica_id;
                        }
                    }

                    $arrayNewAtributoEspecificacao = [];

                    foreach ($caracteristicasCriadas as $caracteristicaId) {
                        $caracteristica = Caracteristica::with('atributos')->find($caracteristicaId);

                        if (!$caracteristica) continue;

                        // Se o tipo for "multiplos", usar os atributos da característica
                        if ($caracteristica->tipo === 'multiplos') {
                            foreach ($caracteristica->atributos as $atributo) {
                                foreach ($especs as $especificacao) {
                                    $arrayNewAtributoEspecificacao[] = [
                                        'especificacao_id' => $especificacao['id'],
                                        'atributo_id' => $atributo->id,
                                        'caracteristica_id' => $caracteristica->id,
                                        'revisao_id' => $especificacao['revisao_id']
                                    ];
                                }
                            }
                        } else {
                            // Caso não seja "multiplos", usa apenas a caracteristica_id
                            foreach ($especs as $especificacao) {
                                $arrayNewAtributoEspecificacao[] = [
                                    'especificacao_id' => $especificacao['id'],
                                    'caracteristica_id' => $caracteristica->id,
                                    'revisao_id' => $especificacao['revisao_id']
                                ];
                            }
                        }
                    }

                    foreach ($arrayNewAtributoEspecificacao as $item) {
                        AtributoEspecificacao::create([
                            'especificacao_id' => $item['especificacao_id'],
                            'caracteristica_id' => $item['caracteristica_id'],
                            'atributo_id' => $item['atributo_id'] ?? null,
                            'revisao_id' => $item['revisao_id'],
                        ]);
                    }
                    
                } else {
                    CaracteristicaMaquina::where('maquina_id', $maquina->id)->delete();
                }

                if (isset($dados['amostras']) && is_array($dados['amostras'])) {

                    AmostraMaquina::where('maquina_id', $maquina->id)->whereNotIn('amostra_id', $dados['amostras'])->delete();

                    foreach ($dados['amostras'] as $a) {
                        AmostraMaquina::updateOrCreate(
                            [
                                'maquina_id' => $maquina->id,
                                'amostra_id' => $a,
                            ],
                            [
                                'maquina_id' => $maquina->id,
                                'amostra_id' => $a,
                            ]
                        );
                    }
                } else {
                    AmostraMaquina::where('maquina_id', $maquina->id)->delete();
                }

                if (isset($dados['produtos']) && is_array($dados['produtos'])) {

                    ProdutoMaquina::where('maquina_id', $maquina->id)->whereNotIn('produto_id', $dados['produtos'])->delete();

                    foreach ($dados['produtos'] as $p) {
                        ProdutoMaquina::updateOrCreate(
                            [
                                'maquina_id' => $maquina->id,
                                'produto_id' => $p,
                            ],
                            [
                                'maquina_id' => $maquina->id,
                                'produto_id' => $p,
                            ]
                        );
                    }
                } else {
                    ProdutoMaquina::where('maquina_id', $maquina->id)->delete();
                }

                $response = $maquina->save();

            }else{
                throw new \Exception('Nenhuma máquina foi encontrada.', 404);
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
