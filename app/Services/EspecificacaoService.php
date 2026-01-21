<?php
namespace App\Services;

use App\Models\Especificacao;
use App\Models\Historico;
use App\Models\Pedido;
use App\Models\Caracteristica;
use App\Models\Amostra;
use App\Models\Produto;
use App\Models\Atributo;
use App\Models\AtributoEspecificacao;
use App\Models\Maquina;
use App\Models\ImagemAmostra;
use App\Models\EspecificacaoObservacao;
use App\Models\AtributoAmostraEspecificacao;
use App\Models\AtributoProdutoEspecificacao;
use App\Models\ImagemAtributoAmostra;
use App\Models\ImagemAtributoProduto;
use App\Models\AtributoAmostraIndiceEspecificacao;
use App\Models\AtributoAmostraIndicePedido;
use App\Models\AtributoProdutoIndiceEspecificacao;
use App\Models\AtributoProdutoIndicePedido;
use App\Models\EspecificacaoAmostraPedido;
use App\Models\EspecificacaoProdutoPedido;
use App\Models\Idioma;
use App\Models\Revisao;
use BcMath\Number;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
class EspecificacaoService
{
    public function index(array $dados = []): array 
    {
        $especificacoes = Especificacao::where('excluido', null)
        ->with(['pedido.cliente' => fn($query) => $query->whereNull('excluido')])
        ->with(['maquina' => function ($query) {
            $query->whereNull('excluido')->with([
                'maquinasIdiomas' => function ($q)  {
                    $q->whereHas('idiomas', function ($query) {
                        $query->where('codigo', 'pt');
                    });
                },
            ]);
        }])
        ->orderBy('criado', 'desc')
        ->when($dados['codigo_focco'], fn($q) => $q->where('codigo_focco', 'LIKE', "%{$dados['codigo_focco']}%"))
        ->when($dados['serie'], fn($q) => $q->where('serie', 'LIKE', "%{$dados['serie']}%"))
        ->when($dados['status'], fn($q) => $q->where('status', 'LIKE', "%{$dados['status']}%"))
        ->when($dados['cliente_nome'], fn($q) =>
            $q->whereHas('pedido.cliente', function ($query) use ($dados) {
                $query->where('nome', 'LIKE', "%{$dados['cliente_nome']}%");
            })
        )
        ->when($dados['usuario'], fn($q) =>
            $q->whereHas('usuario', function ($query) use ($dados) {
                $query->where('nome', 'LIKE', "%{$dados['usuario']}%");
            })
        )
        ->when($dados['criado'] ?? null, function ($q) use ($dados) {

            [$date, $endDate] = explode(' - ', $dados['criado']);

            $date = Carbon::createFromFormat('d/m/Y', trim($date));
            $endDate = Carbon::createFromFormat('d/m/Y', trim($endDate));

            if ($date->month <= $endDate->month) {

                $q->whereRaw(
                    '(MONTH(criado) > ? OR (MONTH(criado) = ? AND DAY(criado) >= ?))
                    AND (MONTH(criado) < ? OR (MONTH(criado) = ? AND DAY(criado) <= ?))',
                    [
                        $date->month,
                        $date->month,
                        $date->day,
                        $endDate->month,
                        $endDate->month,
                        $endDate->day
                    ]
                );

            } else {

                $q->whereRaw(
                    '(MONTH(criado) > ? OR (MONTH(criado) = ? AND DAY(criado) >= ?))
                    OR (MONTH(criado) < ? OR (MONTH(criado) = ? AND DAY(criado) <= ?))',
                    [
                        $date->month,
                        $date->month,
                        $date->day,
                        $endDate->month,
                        $endDate->month,
                        $endDate->day
                    ]
                );

            }
        })
        ->when($dados['maquina_id'], fn($q) => $q->where('maquina_id', $dados['maquina_id']));
        // ->when($dados['nome'], fn($q) => $q->whereHas('maquina', function ($query) use ($dados) { 
        //         $query->whereHas('maquinasIdiomas', function ($q) use ($dados) {
        //             $q->whereHas('idiomas', function ($query) {
        //                 $query->where('codigo', 'pt');
        //             })
        //             ->where('nome', 'like', '%' . $dados['nome'] . '%');
        //         });
        //     }));

        $especificacoes = $especificacoes->paginate(20)->withQueryString();
        $maquinas = Maquina::where('excluido', null)
        ->with([
            'maquinasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->get()
        ->map(function ($maquina) {
            return [
                'id' => $maquina->id,
                'nome' => $maquina->maquinasIdiomas->first()->nome,
            ];
        });
        
        $query = [
            'especificacoes' => $especificacoes,
            'maquinas' => $maquinas,
        ];

        return $query; 
    }

    public function get_criar_etapa1(array $dados = []): LengthAwarePaginator
    {
        $query = Maquina::where('excluido',  null)->orderBy('id', 'desc')->with([
            'maquinasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ]);

        if (!empty($dados['nome'])) {
            $query->whereHas('maquinasIdiomas', function ($q) use ($dados) {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                })
                ->where('nome', 'like', '%' . $dados['nome'] . '%');
            });
        }

        return $query->paginate(20)->withQueryString();
    }

    public function get_criar_etapa2(string $slug)
    {
        $maquina = Maquina::where('slug', $slug)
        ->whereNull('excluido')
        ->with([
            'maquinasIdiomas' => function ($q)  {
                $q->whereHas('idiomas', function ($query) {
                    $query->where('codigo', 'pt');
                });
            },
        ])
        ->with('caracteristicas', function ($query) {
            $query->whereNull('excluido')
            ->with(['atributos' => function ($queryA){
                $queryA->whereNull('excluido')
                ->with([
                    'atributosIdiomas' => function ($q) {
                        $q->where('excluido', null)->when(function ($r) {
                            $r->whereHas('idiomas', function ($queryI) {
                                $queryI->where('padrao', true);
                            });
                        });
                    },
                ]);
            }]);
        })
        ->first();

        // $clientes = Cliente::select('id', 'nome', 'excluido')->where('excluido', null)->get();
        $pedidos = Pedido::query()->where('excluido', null)->orderBy('id', 'DESC')->get();

        return compact('maquina', 'pedidos');
    }

    public function criar(array $dados, int $maquinaID)
    {
        DB::beginTransaction();

        try {

            $especificacao = new Especificacao();
            // $especificacao->cliente_id = $dados['cliente_id'];
            $especificacao->status = 'Em andamento';
            $especificacao->codigo_focco = $dados['codigo_focco'] ?? null;
            $especificacao->serie = $dados['serie'] ?? null;
            $especificacao->pedido_id = $dados['pedido_id'];
            $especificacao->maquina_id = $maquinaID;
            $especificacao->usuario_id = Auth::user()->id;

            $response = $especificacao->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            if ($response) {

                $revisao = Revisao::create([
                    'nome' => 'Revisão 0',
                    'especificacao_id' => $especificacao->id,
                    'usuario_id' => Auth::user()->id,
                    'criado' => Carbon::now(),
                ]);

                $especificacao->revisao_selecionada_id = $revisao->id;
                $especificacao->save();

                $dadosFormatados = [];
                $dadosFormatadosObservacoes = [];
                $statusNotFinished = 0;
                foreach ($dados['caracteristicas'] as $caracteristica) {
                    $caracteristicaId = $caracteristica['caracteristica_id'];

                    // Caso 1: atributo_multiplo (array)
                    if (isset($caracteristica['atributo_multiplo']) && is_array($caracteristica['atributo_multiplo'])) {
                        foreach ($caracteristica['atributo_multiplo'] as $atributo) {
                            $dadosFormatados[] = [
                                'revisao_id' => $revisao->id,
                                'caracteristica_id' => $caracteristicaId,
                                'atributo_id' => $atributo['atributo_id'] ?? null,
                                'observacao_personalizada' => $atributo['observacao_personalizada'] ?? null,
                                'conteudo' => $atributo['conteudo'] ?? null,
                                'especificacao_id' => $especificacao->id,
                            ];

                            if($atributo['atributo_id'] == null){
                                $statusNotFinished = $statusNotFinished + 1;
                            }
                        }

                    // Caso 2: atributo_texto (objeto)
                    } elseif (isset($caracteristica['atributo_texto']) && is_array($caracteristica['atributo_texto'])) {
                        $atributoTexto = $caracteristica['atributo_texto'];
                        $dadosFormatados[] = [
                            'revisao_id' => $revisao->id,
                            'caracteristica_id' => $caracteristicaId,
                            'atributo_id' => $atributoTexto['atributo_id'] ?? null,
                            'observacao_personalizada' => $atributoTexto['observacao_personalizada'] ?? null,
                            'conteudo' => $atributoTexto['conteudo'] ?? null,
                            'especificacao_id' => $especificacao->id,
                        ];

                        if($atributoTexto['conteudo'] == null){
                            $statusNotFinished = $statusNotFinished + 1;
                        }

                    // Caso 3: entrada simples
                    } else {
                        $dadosFormatados[] = [
                            'revisao_id' => $revisao->id,
                            'caracteristica_id' => $caracteristicaId,
                            'atributo_id' => $caracteristica['atributo_id'] ?? null,
                            'observacao_personalizada' => $caracteristica['observacao_personalizada'] ?? null,
                            'conteudo' => $caracteristica['conteudo'] ?? null,
                            'especificacao_id' => $especificacao->id,
                        ];

                        if($caracteristica['atributo_id'] == null){
                            $statusNotFinished = $statusNotFinished + 1;
                        }
                    }
                }

                if($statusNotFinished > 0){
                    $especificacao->status = 'Em andamento';
                } else {
                    $especificacao->status = 'Finalizada';
                    $especificacao->finalizada = Carbon::now();
                }

                $especificacao->save();

                AtributoEspecificacao::insert($dadosFormatados);

                if(isset($dados['att']) && count($dados['att']) > 0){
                    foreach ($dados['att'] as $observacao) {
                        $dadosFormatadosObservacoes[] = [
                            'conteudo' => $observacao['observacao'],
                            'especificacao_id' => $especificacao->id,
                            'revisao_id' => $revisao->id,
                            'criado' => now(),
                        ];
                    }

                    EspecificacaoObservacao::insert($dadosFormatadosObservacoes);
                }

                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_editar(int | string $id)
    {
       $especificacao = Especificacao::where('id', $id)
        ->whereNull('excluido')
        ->with([
            'maquina' => function ($query) use ($id) {
                $query->with([
                    'caracteristicas' => function ($query) use ($id) {
                        $especificacaoCriada = Especificacao::find($id)?->criado;

                        $query->where(function ($q) use ($especificacaoCriada) {
                            $q->whereNull('excluido')
                            ->orWhere('excluido', '>', $especificacaoCriada)
                            ->with([
                                'caracteristicasIdiomas' => function ($q)  {
                                    $q->whereHas('idiomas', function ($query) {
                                        $query->where('codigo', 'pt');
                                    });
                                },
                            ]);
                        })
                        ->with([
                            'atributos' => function ($query) {
                                $query->whereNull('excluido')
                                ->with([
                                    'atributosIdiomas' => function ($q)  {
                                        $q->whereHas('idiomas', function ($query) {
                                            $query->where('codigo', 'pt');
                                        });
                                    },
                                ]);
                            }
                        ]);
                    }
                ])->with([
                    'maquinasIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ]);
            },
            
        ])
        ->first();

        if (!$especificacao) {
            return [
                'especificacao' => null,
                'atributosSelecionados' => null,
                // 'clientes' => null,
                'pedidos' => null,
            ];
        }
        
        $especificacao->load([
            'observacoes' => function ($query) use ($especificacao) {
                $query->whereNull('excluido')
                    ->where('revisao_id', $especificacao->revisao_selecionada_id);
            }
        ]);

        $atributosSelecionados = AtributoEspecificacao::where('especificacao_id', $especificacao->id)
            ->where('revisao_id', $especificacao->revisao_selecionada_id)
            ->with(['atributo' => function ($query) {
                $query->with([
                    'atributosIdiomas' => function ($q)  {
                        $q->whereHas('idiomas', function ($query) {
                            $query->where('codigo', 'pt');
                        });
                    },
                ]);
            }])
            ->get();
            
        // $clientes = Cliente::where('excluido', null)->get();
        $pedidos = Pedido::select('id', 'nome', 'excluido')->where('excluido', null)->get();

        return compact('especificacao', 'atributosSelecionados', 'pedidos');
    }

    public function editar(array $dados, int $especificacaoID, $user){
        DB::beginTransaction();

        try {

            $especificacao = Especificacao::where('id', $especificacaoID)->where('excluido', null)->first();
            
            if ($especificacao) {

                if ($dados['pedido_id'] && $dados['pedido_id'] !== $especificacao->pedido_id) {
                    $especificacao->pedido_id = $dados['pedido_id'];
                    EspecificacaoAmostraPedido::where('especificacao_id', $especificacao->id)->delete();
                    EspecificacaoProdutoPedido::where('especificacao_id', $especificacao->id)->delete();
                }

                $especificacao->serie = $dados['serie'];
                $especificacao->codigo_focco = $dados['codigo_focco'];

                $response = $especificacao->save();

                if (!$response) {
                    throw new \Exception('Erro ao salvar os dados.');
                }

                $alteracoes = []; 

                $getRevisao = Revisao::where('especificacao_id', $especificacao->id)->where('excluido', null)->count();

                if(isset($dados['caracteristicas']) && is_array($dados['caracteristicas'])) {
                    $revisao = new Revisao();
                    $revisao->especificacao_id = $especificacao->id;
                    $revisao->usuario_id = Auth::user()->id;
                    $revisao->nome = 'Revisão ' . $getRevisao;
                    $revisao->revisao_anterior_id = $especificacao->revisao_selecionada_id;
                    $revisao->criado = Carbon::now();
                    $revisao->save();

                    $especificacao->revisao_selecionada_id = $revisao->id;
                    $especificacao->save();
                }

                $statusNotFinished = 0;
                
                foreach ($dados['caracteristicas'] as $caracteristicaId => $caracteristica) {

                    if (isset($caracteristica['atributo_texto'])) {

                        $atributo = $caracteristica['atributo_texto'];

                        AtributoEspecificacao::create([
                            'especificacao_id' => $especificacao->id,
                            'caracteristica_id' => $caracteristicaId,
                            'atributo_id' => $atributo['atributo_id'],
                            'conteudo' => $atributo['conteudo'] ?? null,
                            'observacao_personalizada' => $atributo['observacao_personalizada'] ?? null,
                            'revisao_id' => $revisao->id,
                        ]);

                        if($atributo['atributo_id'] == null){
                            $statusNotFinished = $statusNotFinished + 1;
                        }

                        continue;
                    }

                    foreach (['atributo_selecionavel', 'atributo_multiplo'] as $tipo) {

                        if (!isset($caracteristica[$tipo]) || !is_array($caracteristica[$tipo])) {
                            continue;
                        }

                        foreach ($caracteristica[$tipo] as $atributo) {

                            AtributoEspecificacao::create([
                                'especificacao_id' => $especificacao->id,
                                'caracteristica_id' => $caracteristicaId,
                                'atributo_id' => $atributo['atributo_id'],
                                'conteudo' => $atributo['conteudo'] ?? null,
                                'observacao_personalizada' => $atributo['observacao_personalizada'] ?? null,
                                'revisao_id' => $revisao->id,
                            ]);

                            if($atributo['atributo_id'] == null){
                                $statusNotFinished = $statusNotFinished + 1;
                            }
                        }
                    }
                
                    if (!empty($alteracoes)) {
                        $revisao->save();
                        // foreach ($alteracoes as $a) {
                        //     // $this->createEspecificacaoHistorico($especificacao->id, $user->id, $a->atributo_id, $a->caracteristica_id);
                        // }
                    }
                }

                if(isset($dados['att']) && count($dados['att']) > 0){
                    // $idsOriginais = explode(',', $dados['att_ids_originais']);
                    // $idsAtuais = collect($dados['att'])->pluck('att_id')->filter()->toArray(); // remove null
                    // $idsRemovidos = array_diff($idsOriginais, $idsAtuais);

                    // if (!empty($idsRemovidos)) {
                    //     EspecificacaoObservacao::where('especificacao_id', $especificacaoID)
                    //     ->whereIn('id', $idsRemovidos)
                    //     ->update(['excluido' => Carbon::now()]);
                    // }

                    foreach ($dados['att'] as $index => $item) {
                        EspecificacaoObservacao::create([
                            'especificacao_id' => $especificacaoID,
                            'revisao_id' => $revisao->id,
                            'observacao_anterior_id' => $item['att_id'] ?? null,
                            'conteudo' => $item['observacao'],
                            'criado' => date('Y-m-d H:i:s')
                        ]);
                    }
                }

                if($statusNotFinished > 0){
                    $especificacao->status = 'Em andamento';
                    $especificacao->finalizada = null;
                } else {
                    $especificacao->status = 'Finalizada';
                    $especificacao->finalizada = Carbon::now();
                }

                DB::commit();

            } else {
                throw new \Exception('Especificação não encontrada.', 404);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function createEspecificacaoHistorico($especificacaoId, $userId, $atributoId, $caracteristicaId)
    {
        $especificacaoHistorico = new Historico();
        $especificacaoHistorico->especificacao_id = $especificacaoId;
        $especificacaoHistorico->usuario_id = $userId;
        $especificacaoHistorico->atributo_id = $atributoId;
        $especificacaoHistorico->caracteristica_id = $caracteristicaId;
        $especificacaoHistorico->criado = now();
        $especificacaoHistorico->save();
    }

    private function getAtributosSelecionados($especificacao)
    {
        return AtributoEspecificacao::where('especificacao_id', $especificacao->id)
            ->where('revisao_id', $especificacao->revisao_selecionada_id)
            ->get()
            ->sortBy(function ($item) {
                $comparavel = $item->caracteristica->comparavel ?? 0;
                $ordemSecao = $item->caracteristica->secao->ordem ?? 9999;

                return [
                    $comparavel ? 0 : 1,
                    $ordemSecao,
                ];
            })
            ->values();
    }

    private function getCaracteristica($dado, $idioma)
    {
        return Caracteristica::where('id', $dado['caracteristica_id'])
            ->with([
                'caracteristicasIdiomas' => function ($q) use($idioma) {
                    $q->whereHas('idiomas', function ($query) use($idioma) {
                        $query->where('codigo', $idioma);
                    });
                },
            ])
            ->first();
    }

    private function getAtributo($dado, $idioma)
    {
        return Atributo::where('id', $dado['atributo_id'])->where('caracteristica_id', $dado['caracteristica_id'])->where('excluido', null)
            ->with([
                'atributosIdiomas' => function ($q) use($idioma) {
                    $q->whereHas('idiomas', function ($query) use($idioma) {
                        $query->where('codigo', $idioma);
                    });
                },
            ])
            ->first();
    }

    private function getAtributoAmostras($indiceAmostraId, $idiomaId)
    {
        DB::statement('SET SQL_BIG_SELECTS=1');

        return AtributoAmostraEspecificacao::whereIn('indice_amostra_id', $indiceAmostraId)
        ->join('atributos_amostra', 'atributos_amostra.id', '=', 'atributos_amostra_especificacao.atributo_id')
        ->leftJoin('atributos_amostra_idiomas', function ($join) use($idiomaId){
            $join->on('atributos_amostra_idiomas.atributo_amostra_id', '=', 'atributos_amostra.id')
                ->where('atributos_amostra_idiomas.idioma_id', '=', $idiomaId);
        })
        ->leftJoin('sub_atributos_amostra', 'sub_atributos_amostra.id', '=', 'atributos_amostra_especificacao.sub_atributo_id')

        ->leftJoin('sub_atributos_amostra_idiomas', function ($join) use($idiomaId){
            $join->on('sub_atributos_amostra_idiomas.sub_atributos_amostra_id', '=', 'sub_atributos_amostra.id')
                ->where('sub_atributos_amostra_idiomas.idioma_id', '=', $idiomaId);
        })
        ->leftJoin('amostras', 'amostras.id', '=', 'atributos_amostra.amostra_id')
        ->leftJoin('amostras_idiomas', function ($join) use($idiomaId){
            $join->on('amostras_idiomas.amostra_id', '=', 'amostras.id')
                ->where('amostras_idiomas.idioma_id', '=', $idiomaId);
        })
        ->whereNull('atributos_amostra.excluido')
        ->whereNull('sub_atributos_amostra.excluido')
        ->select(
            'atributos_amostra_especificacao.id',
            'atributos_amostra_especificacao.indice_amostra_id',
            'atributos_amostra_especificacao.atributo_id',
            'atributos_amostra_especificacao.sub_atributo_id',
            'atributos_amostra_especificacao.observacao_personalizada',
            'atributos_amostra_especificacao.conteudo',

            'atributos_amostra_idiomas.nome as atributo_nome',
            'atributos_amostra_idiomas.unidade as atributo_unidade',
            'atributos_amostra.tipo as atributo_tipo',
            'sub_atributos_amostra_idiomas.nome as sub_atributo_nome',
            'amostras_idiomas.nome as amostra_nome'
        )
        ->get()
        ->map(function ($item) {
            $item->imagens = ImagemAtributoAmostra::where('atributo_amostra_id', $item->atributo_id)
                ->where('indice_amostra_id', $item->indice_amostra_id)
                ->get(['id', 'imagem', 'atributo_amostra_id', 'indice_amostra_id']);
            return $item;
        });
    }

    private function getAtributoProdutos($indiceProdutoId, $idiomaId){

        DB::statement('SET SQL_BIG_SELECTS=1');
        
        return AtributoProdutoEspecificacao::whereIn('indice_produto_id', $indiceProdutoId)
        ->join('atributos_produtos', 'atributos_produtos.id', '=', 'atributos_produtos_especificacao.atributo_produto_id')
        ->leftJoin('atributos_produtos_idiomas', function ($join) use($idiomaId) {
            $join->on('atributos_produtos_idiomas.atributo_produto_id', '=', 'atributos_produtos.id')
                ->where('atributos_produtos_idiomas.idioma_id', '=', $idiomaId);
        })
        ->leftJoin('sub_atributos_produtos', 'sub_atributos_produtos.id', '=', 'atributos_produtos_especificacao.sub_atributo_id')

        ->leftJoin('sub_atributos_produtos_idiomas', function ($join) use($idiomaId) {
            $join->on('sub_atributos_produtos_idiomas.sub_atributos_produtos_id', '=', 'sub_atributos_produtos.id')
                ->where('sub_atributos_produtos_idiomas.idioma_id', '=', $idiomaId);
        })
        ->leftJoin('produtos', 'produtos.id', '=', 'atributos_produtos.produto_id')
        ->leftJoin('produtos_idiomas', function ($join) use($idiomaId) {
            $join->on('produtos_idiomas.produto_id', '=', 'produtos.id')
                ->where('produtos_idiomas.idioma_id', '=', $idiomaId);
        })

        ->whereNull('atributos_produtos.excluido')
        ->whereNull('sub_atributos_produtos.excluido')
        ->select(
            'atributos_produtos_especificacao.id',
            'atributos_produtos_especificacao.indice_produto_id',
            'atributos_produtos_especificacao.atributo_produto_id',
            'atributos_produtos_especificacao.sub_atributo_id',
            'atributos_produtos_especificacao.observacao_personalizada',
            'atributos_produtos_especificacao.conteudo',
            'atributos_produtos_idiomas.nome as atributo_nome',
            'atributos_produtos_idiomas.unidade as atributo_unidade',
            'atributos_produtos.tipo as atributo_tipo',
            'sub_atributos_produtos_idiomas.nome as sub_atributo_nome',
            'produtos_idiomas.nome as produto_nome'
        )
        ->get()
        ->map(function ($item) {
            $item->imagens = ImagemAtributoProduto::where('atributo_produto_id', $item->atributo_produto_id)
                ->where('indice_produto_id', $item->indice_produto_id)
                ->get(['id', 'imagem', 'atributo_produto_id', 'indice_produto_id']);
            return $item;
        });
    }

    public function especificacao(int | string $id, array $dados)
    {
        $idioma = $dados['lang'] ?? 'pt';
        app()->setLocale($idioma);
        $especificacao = Especificacao::where('id', $id)
        ->whereNull('excluido')
        ->with([
            'pedido' => function ($query) {
                $query->whereNull('excluido')->with([
                    'cliente' => function ($query) {
                        $query->whereNull('excluido');
                    },
                ]);
            },
            'maquina' => function ($query) use($idioma) {
                $query->whereNull('excluido')
                ->with([
                    'maquinasIdiomas' => function ($q) use($idioma)  {
                        $q->whereHas('idiomas', function ($query) use($idioma) {
                            $query->where('codigo', $idioma);
                        });
                    },
                ])
                ->with([
                    'equipamento' => function ($query) use($idioma) {
                        $query->whereNull('excluido')->with([
                            'equipamentosOrigemIdiomas' => function ($q) use($idioma)  {
                                $q->whereHas('idiomas', function ($query) use($idioma) {
                                    $query->where('codigo', $idioma);
                                });
                            },
                        ]);
                    },
                ])->with([
                   'amostras' => function ($query) use($idioma) {
                        $query->whereNull('excluido')
                        ->with([
                            'amostrasIdiomas' => function ($q) use($idioma)  {
                                $q->whereHas('idiomas', function ($query) use($idioma) {
                                    $query->where('codigo', $idioma);
                                });
                            },
                        ])
                        ->with(['atributos' => function ($query) use($idioma) {
                            $query->whereNull('excluido')
                            ->with([
                                'atributosAmostrasIdiomas' => function ($q) use($idioma)  {
                                    $q->whereHas('idiomas', function ($query) use($idioma) {
                                        $query->where('codigo', $idioma);
                                    });
                                },
                            ])
                            ->with(['subAtributos' => function ($query) use($idioma) {
                                $query->whereNull('excluido')->with([
                                    'subAtributosAmostrasIdiomas' => function ($q) use($idioma)  {
                                        $q->whereHas('idiomas', function ($query) use($idioma) {
                                            $query->where('codigo', $idioma);
                                        });
                                    },
                                ]);
                            }]);
                        }]);
                    }
                ])->with([
                    'produtos' => function ($query) use($idioma) {
                        $query->whereNull('excluido')
                        ->with([
                            'produtosIdiomas' => function ($q) use($idioma)  {
                                $q->whereHas('idiomas', function ($query) use($idioma) {
                                    $query->where('codigo', $idioma);
                                });
                            },
                        ])
                        ->with(['atributos' => function ($query) use($idioma) {
                            $query->whereNull('excluido')
                            ->with([
                                'atributosProdutosIdiomas' => function ($q) use($idioma)  {
                                    $q->whereHas('idiomas', function ($query) use($idioma) {
                                        $query->where('codigo', $idioma);
                                    });
                                },
                            ])
                            ->with(['subAtributos' => function ($query) use($idioma) {
                                $query->whereNull('excluido')
                                    ->with([
                                    'subAtributosProdutosIdiomas' => function ($q) use($idioma)  {
                                        $q->whereHas('idiomas', function ($query) use($idioma) {
                                            $query->where('codigo', $idioma);
                                        });
                                    },
                                ]);
                            }]);
                        }]);
                    }
                ]);
            },
            'historicos' => function ($query) use ($idioma) {
                $query->whereNull('excluido')->with([
                    'usuario' => function ($query) {
                    },
                    'atributo' => function ($query) use ($idioma) {
                        $query->whereNull('excluido')
                        ->with([
                            'atributosIdiomas' => function ($q) use($idioma)  {
                                $q->whereHas('idiomas', function ($query) use($idioma) {
                                    $query->where('codigo', $idioma);
                                });
                            },
                        ]);
                    },
                    'caracteristica' => function ($query) use ($idioma) {
                        $query->whereNull('excluido')
                        ->with([
                            'caracteristicasIdiomas' => function ($q) use($idioma)  {
                                $q->whereHas('idiomas', function ($query) use($idioma) {
                                    $query->where('codigo', $idioma);
                                });
                            },
                        ]);
                    }
                ]);
            },
        ])
        ->first();

        if (!$especificacao) {
            return [
                'especificacao' => null,
            ];
        }

        if (!$especificacao->maquina) {
            return [
                'especificacao' => null,
            ];            
        }

        $especificacao->load([
            'observacoes' => function ($query) use ($especificacao) {
                $query->whereNull('excluido')
                    ->where('revisao_id', $especificacao->revisao_selecionada_id);
            }
        ]);

        $amostrasEspecificacoes = AtributoAmostraIndiceEspecificacao::where('especificacao_id', $id)
        ->whereNull('excluido')
        ->with(['amostra' => function ($query) use($idioma) {
            $query->whereNull('excluido')->orderBy('id')
                ->with([
                    'amostrasIdiomas' => function ($q) use($idioma)  {
                        $q->whereHas('idiomas', function ($query) use($idioma) {
                            $query->where('codigo', $idioma);
                        });
                    },
                ]);
        }])
        ->get()
        ->sortBy('amostra.id')
        ->groupBy(function ($item) {
            return optional(optional($item->amostra)->amostrasIdiomas->first())->nome ?? __('messages.nao_informado');
        });

        $produtosEspecificacoes = AtributoProdutoIndiceEspecificacao::where('especificacao_id', $id)
        ->whereNull('excluido')
        ->with(['produto' => function ($query) use($idioma)  {
            $query->whereNull('excluido')->orderBy('id')
                ->with([
                    'produtosIdiomas' => function ($q) use($idioma)  {
                        $q->whereHas('idiomas', function ($query) use($idioma) {
                            $query->where('codigo', $idioma);
                        });
                    },
                ]);
        }])
        ->get()
        ->sortBy('produto.id') 
        ->groupBy(function ($item) {
            return optional(optional($item->produto)->produtosIdiomas->first())->nome ?? __('messages.nao_informado');
        });

        $maquinaAmostras = Amostra::where('excluido', null)
        ->with([
            'amostrasIdiomas' => function ($q) use($idioma)  {
                $q->whereHas('idiomas', function ($query) use($idioma) {
                    $query->where('codigo', $idioma);
                });
            },
        ])
        ->whereHas('maquinas', function ($query) use ($especificacao) {
            $query->where('maquina_id', $especificacao->maquina->id); 
        })->get();

        $maquinaProdutos = Produto::where('excluido', null)
        ->with([
            'produtosIdiomas' => function ($q) use($idioma)  {
                $q->whereHas('idiomas', function ($query) use($idioma) {
                    $query->where('codigo', $idioma);
                });
            },
        ])
        ->whereHas('maquinas', function ($query) use ($especificacao) {
            $query->where('maquina_id', $especificacao->maquina->id); 
        })->get();

        $atributosSelecionados = $this->getAtributosSelecionados($especificacao);

        $resumoItens = [];
        $resumoItensInseridos = 0;

        foreach ($atributosSelecionados as $dado) {
            
            $caracteristica = $this->getCaracteristica($dado, $idioma);
            $atributo = $this->getAtributo($dado, $idioma);

            $observacao = $dado['observacao_personalizada'] ?? '';
            $conteudo = $dado['conteudo'] ?? '';

            if ($caracteristica) {
                $caracteristicaNome = $caracteristica->caracteristicasIdiomas->first()->nome ?? '';
                $unidade = $caracteristica->caracteristicasIdiomas->first()->unidade ?? '';
                $atributoNome = $atributo?->atributosIdiomas?->first()->nome ?? '';
                $caracteristicaId = $caracteristica->id ?? '';
                $excluido = $caracteristica->excluido ? true : false;
                $comparavel = $caracteristica->comparavel ? true : false;
                $tipo = $caracteristica->tipo ?? '';

                if(strtolower($atributoNome) != 'n/a'){
                    $resumoItens[] = [
                        'caracteristica_id' => $caracteristicaId,
                        'caracteristica' => $caracteristicaNome,
                        'unidade' => $unidade,
                        'atributo' => $atributoNome,
                        'observacao' => $observacao,
                        'comparavel' => $comparavel,
                        'conteudo' => $conteudo,
                        'tipo' => $tipo,
                        'excluido' => $excluido
                    ];

                    if($tipo === "texto"){
                        if(!empty($conteudo)){
                            $resumoItensInseridos += 1;
                        }
                    }else if ($tipo === "multiplos"){
                        if(!empty($conteudo)){
                            $resumoItensInseridos += 1;
                        }
                    }else if ($tipo === "selecionavel"){
                        if(!empty($atributoNome)){
                            $resumoItensInseridos += 1;
                        }
                    }
                }
            } 
        }

        $porcentagemResumo = count($resumoItens) > 0 ? ($resumoItensInseridos / count($resumoItens)) * 100 : 0;

        $porcentagemResumo = number_format($porcentagemResumo, 1, '.', '');

        if($porcentagemResumo === '100.0'){
            $especificacao->status = 'Finalizada';
            
            if($especificacao->finalizada == null){
                $especificacao->finalizada = Carbon::now();
            }

        }else{
            $especificacao->status = 'Em andamento';
            $especificacao->finalizada = null;
        }

        $especificacao->save();
        
        $indiceAmostraId = AtributoAmostraIndiceEspecificacao::where('especificacao_id', $especificacao->id)->where('excluido', null)->pluck('id')
        ->toArray();
        
        $idiomaId = Idioma::where('codigo', $idioma)->first()->id;
    
        $amostras = $this->getAtributoAmostras($indiceAmostraId, $idiomaId);

        $dadosAgrupadoAmostras = $amostras
        ->groupBy('amostra_nome')
        ->map(function ($grupo) {
            return $grupo->groupBy('indice_amostra_id');
        });

        $indiceProdutoId = AtributoProdutoIndiceEspecificacao::where('especificacao_id', $especificacao->id)->where('excluido', null)->pluck('id')
        ->toArray();

        $produtos = $this->getAtributoProdutos($indiceProdutoId, $idiomaId);

        $dadosAgrupadoProdutos = $produtos
        ->groupBy('produto_nome')
        ->map(function ($grupo) {
            return $grupo->groupBy('indice_produto_id');
        });

        $equipamentoId = $especificacao->maquina->equipamento->id;

        $atributos = AtributoEspecificacao::where('especificacao_id', $especificacao->id)->where('revisao_id', $especificacao->revisao_selecionada_id)
            ->with(['caracteristica' => function ($query) {
                $query->select('id', 'tipo', 'excluido');
            }])
            ->with(['atributo' => function ($query) use($idioma) {
                $query->whereNull('excluido')
                ->with([
                    'atributosIdiomas' => function ($q) use($idioma)  {
                        $q->where('nome', 'not like', '%N/A%')->where('nome', 'not like', '%n/a%')
                        ->whereHas('idiomas', function ($query) use($idioma) {
                            $query->where('codigo', $idioma);
                        });
                    }
                ]);
            }])
            ->get();

        $atributosEspecificacaoPrincipal = [];

        foreach ($atributos as $atributo) {
            $tipo = $atributo->caracteristica->tipo ?? null;
            $caracteristicaId = $atributo->caracteristica_id;

            if (in_array($tipo, ['texto', 'multiplos'])) {
                $conteudoLower = strtolower($atributo->conteudo); 
                
                if ($conteudoLower !== 'n/a') {
                    $atributosEspecificacaoPrincipal[$caracteristicaId][] = strval($conteudoLower);
                }
            } elseif ($tipo === 'selecionavel') {
                $atributosEspecificacaoPrincipal[$caracteristicaId][] = strval($atributo->atributo_id);
            }
        }

        $caracteristicaComparavel = Maquina::where('id', $especificacao->maquina->id)
            ->with(['caracteristicas' => function ($query) {
                $query->whereNull('excluido')->where('comparavel', 1);
            }])
            ->first();

        $caracteristicasIds = $caracteristicaComparavel->caracteristicas->pluck('id');

        $atributosComparavel = AtributoEspecificacao::whereIn('caracteristica_id', $caracteristicasIds)->where('especificacao_id', $especificacao->id)
            ->with(['atributo' => function ($query) use($idioma) {
                $query->whereNull('excluido')
                ->with([
                    'atributosIdiomas' => function ($q) use($idioma)  {
                        $q->where('nome', 'not like', '%N/A%')->where('nome', 'not like', '%n/a%')
                        ->whereHas('idiomas', function ($query) use($idioma) {
                            $query->where('codigo', $idioma);
                        });
                    }
                ]);
            }])
            ->get();

        $atributosIds = $atributosComparavel->pluck('atributo_id')->toArray();
        // $nomesAtributos = Atributo::whereIn('id', $atributosIds)->pluck('nome')->toArray();
        $nomesAtributos = Atributo::join('atributos_idiomas', function ($join) use($idiomaId){
            $join->on('atributos_idiomas.atributo_id', '=', 'atributos.id')
                ->where('atributos_idiomas.idioma_id', '=', $idiomaId);
        })
        ->whereIn('atributos.id', $atributosIds)
        ->pluck('atributos_idiomas.nome')
        ->toArray();


        $maquinasComparacao = Maquina::where('id', $especificacao->maquina->id)
        ->whereNull('excluido')
        ->with(['expecificacoes' => function ($query) use($atributosIds, $especificacao){
            $query->whereNull('excluido')->where('id', '!=', $especificacao->id)
                ->whereHas('atributos', function ($q) use($atributosIds){
                    $q->whereIn('atributo_id', $atributosIds);
                });
        }])
        ->get();

        $listaComparacao = [];

        foreach ($maquinasComparacao as $maquina) {
            foreach ($maquina->expecificacoes as $especificacaoMaquina) {

                $atributosEspecificacaoMaquina = AtributoEspecificacao::where('especificacao_id', $especificacaoMaquina->id)->where('revisao_id', $especificacaoMaquina->revisao_selecionada_id)
                    ->join('caracteristicas', 'atributos_especificacao.caracteristica_id', '=', 'caracteristicas.id')
                    ->with(['caracteristica' => function ($query) {
                        $query->select('id', 'tipo', 'excluido');
                    }])
                    ->with(['atributo' => function ($query) use($idioma) {
                        $query->whereNull('excluido')
                        ->with([
                            'atributosIdiomas' => function ($q) use($idioma)  {
                                $q->where('nome', 'not like', '%N/A%')->where('nome', 'not like', '%n/a%')
                                ->whereHas('idiomas', function ($query) use($idioma) {
                                    $query->where('codigo', $idioma);
                                });
                            }
                        ]);
                    }])
                    ->get();

                $atributosEspecificacaoMaquinaIds = [];

                foreach ($atributosEspecificacaoMaquina as $atributo) {
                    $tipo = $atributo->caracteristica->tipo ?? null;
                    $caracteristicaId = $atributo->caracteristica_id;

                    if (in_array($tipo, ['texto', 'multiplos'])) {
                        $conteudoLower = strtolower($atributo->conteudo); 
                        
                        if ($conteudoLower !== 'n/a') {
                            $atributosEspecificacaoMaquinaIds[$caracteristicaId][] = strval($conteudoLower);
                        }
                    } elseif ($tipo === 'selecionavel') {
                        $atributosEspecificacaoMaquinaIds[$caracteristicaId][] = strval($atributo->atributo_id);
                    }
                }

                $atributosComparaveis = AtributoEspecificacao::query()
                ->where('atributos_especificacao.especificacao_id', $especificacaoMaquina->id)
                ->where('atributos_especificacao.revisao_id', $especificacaoMaquina->revisao_selecionada_id)
                ->whereIn('atributos_especificacao.caracteristica_id', $caracteristicasIds)

                ->join('atributos_idiomas as ai', 'ai.atributo_id', '=', 'atributos_especificacao.atributo_id')
                ->join('caracteristicas as c', 'c.id', '=', 'atributos_especificacao.caracteristica_id')
                ->join('caracteristicas_idiomas as ci', 'ci.caracteristica_id', '=', 'c.id')

                ->where('ai.idioma_id', $idiomaId)
                ->where('ci.idioma_id', $idiomaId)
                ->whereNull('c.excluido')

                ->select([
                    'ai.nome as atributo_nome',
                    'ci.nome as caracteristica_nome',
                    'c.tipo as caracteristica_tipo',
                    'atributos_especificacao.conteudo as conteudo',
                ])
                ->get();

                $nomesAtributos = $atributosComparaveis
                ->groupBy('caracteristica_nome')
                ->map(function ($itens) {

                    $tipo = $itens->first()->caracteristica_tipo;
                    $nome = $itens->first()->caracteristica_nome;

                    // 🔹 TEXTO
                    if ($tipo === 'texto') {
                        return "<b>{$nome}:</b> {$itens->first()->conteudo}";
                    }

                    // 🔹 SELECIONÁVEL (1)
                    if ($tipo === 'selecionavel') {
                        return "<b>{$nome}:</b> {$itens->first()->atributo_nome}";
                    }

                    // 🔹 MÚLTIPLOS (N)
                    if ($tipo === 'multiplos') {
                        
                        $atributos = $itens->map(function ($item) {
                            return "<b>{$item->atributo_nome}: </b>{$item->conteudo} <br/>";
                        });

                        return "<b>{$nome}: </b><br/>" . implode(' ', $atributos->toArray());
                    }

                    return null;
                })
                ->filter()
                ->values()
                ->toArray();

                $totalAtributos = 0;
                $atributosIguais = 0;

                foreach ($atributosEspecificacaoPrincipal as $caracteristicaId => $valoresPrincipais) {
                    $totalAtributos += count($valoresPrincipais);

                    $valoresMaquina = $atributosEspecificacaoMaquinaIds[$caracteristicaId] ?? [];

                    foreach ($valoresPrincipais as $index => $valorPrincipal) {
                        if (isset($valoresMaquina[$index]) && $valorPrincipal === $valoresMaquina[$index]) {
                            $atributosIguais++;
                        }
                    }
                }

                $porcentagem = $totalAtributos > 0 ? ($atributosIguais / $totalAtributos) * 100 : 0;
                $listaComparacao[] = [
                    'maquina' => optional($especificacao->maquina->maquinasIdiomas->first())->nome ?? 'N/A',
                    'serie' => $especificacaoMaquina->serie ?? null,
                    'status' => $especificacao->status ?? __('messages.nao_informado'),
                    'porcentagem_similaridade' => round($porcentagem, 1),
                    'especificacao_id' => $especificacaoMaquina->id,
                    'nomesAtributos' => $nomesAtributos
                ];
            }
        }

        $revisoes = Revisao::where('especificacao_id', $especificacao->id)
            ->whereNull('excluido')
            ->with([
                'especificacoes.caracteristica.secao',
                'usuario',
                'especificacoesObservacoes.observacaoAnterior',
            ])
            ->get()
            ->map(function ($revisao) {
                $revisao->especificacoes = $revisao->especificacoes
                    ->sortBy(function ($item) {
                        $comparavel = $item->caracteristica->comparavel ?? 0;
                        $ordemSecao = $item->caracteristica->secao->ordem ?? 9999;
                        return [
                            $comparavel ? 0 : 1,
                            $ordemSecao,
                        ];
                    })
                    ->values();
                return $revisao;
            });

        $resumoItensRevisoes = [];

        foreach ($revisoes as $revisao) {
            $itens = []; 
            $hasBeforeRevisao = $revisao->revisao_anterior_id ? true : false;
            foreach ($revisao->especificacoes as $dado) {
                $caracteristica = $this->getCaracteristica($dado, $idioma);
                $atributo = $this->getAtributo($dado, $idioma);

                $especificacaoAnterior = null;
                $especificacaoAnteriorHasChanged = false;

               if ($hasBeforeRevisao && $revisao->revisaoAnterior) {

                    if ($caracteristica?->tipo === 'multiplos' && $dado->atributo_id) {

                        $especificacaoAnterior = $revisao->revisaoAnterior
                            ->especificacoes
                            ->where('caracteristica_id', $dado->caracteristica_id)
                            ->where('atributo_id', $dado->atributo_id)
                            ->first();

                            if($especificacaoAnterior && ($especificacaoAnterior->conteudo !== $dado->conteudo || $especificacaoAnterior->observacao_personalizada !== $dado->observacao_personalizada)) {
                                $especificacaoAnteriorHasChanged = true;
                            }

                    } else {

                        $especificacaoAnterior = $revisao->revisaoAnterior
                            ->especificacoes
                            ->firstWhere('caracteristica_id', $dado->caracteristica_id);

                        if($especificacaoAnterior && ($especificacaoAnterior->conteudo !== $dado->conteudo || $especificacaoAnterior->observacao_personalizada !== $dado->observacao_personalizada || $especificacaoAnterior->atributo_id !== $dado->atributo_id)) {
                            $especificacaoAnteriorHasChanged = true;
                        }
                    }
                }

                $atributoNomeRevisao = '';
                $conteudoRevisao = '';
                $observacaoRevisao = '';

                if ($especificacaoAnterior) {

                    $atributoAnterior = $this->getAtributo($especificacaoAnterior, $idioma);

                    $atributoNomeRevisao = $atributoAnterior
                        ?->atributosIdiomas
                        ?->first()
                        ?->nome ?? '';

                    $conteudoRevisao = $especificacaoAnterior->conteudo ?? '';
                    $observacaoRevisao = $especificacaoAnterior->observacao_personalizada ?? '';
                }

                $observacao = $dado['observacao_personalizada'] ?? '';
                $conteudo = $dado['conteudo'] ?? '';

                if ($caracteristica) {
                    $caracteristicaNome = $caracteristica->caracteristicasIdiomas->first()->nome ?? '';
                    $unidade = $caracteristica->caracteristicasIdiomas->first()->unidade ?? '';
                    $atributoNome = $atributo?->atributosIdiomas?->first()->nome ?? '';
                    $caracteristicaId = $caracteristica->id ?? '';
                    $excluido = $caracteristica->excluido ? true : false;
                    $comparavel = $caracteristica->comparavel ? true : false;
                    $tipo = $caracteristica->tipo ?? '';

                    // if (strtolower($atributoNome) != 'n/a') {
                        $itens[] = [
                            'caracteristica_id' => $caracteristicaId,
                            'caracteristica' => $caracteristicaNome,
                            'unidade' => $unidade,
                            'atributo' => $atributoNome,
                            'observacao' => $observacao,
                            'comparavel' => $comparavel,
                            'conteudo' => $conteudo,
                            'tipo' => $tipo,
                            'excluido' => $excluido,
                            'revisao_id' => $revisao->id,
                            'revisao_anterior_id' => $revisao->revisaoAnterior ? $revisao->revisaoAnterior->id : null,
                            'conteudoRevisao' => $conteudoRevisao,
                            'observacaoRevisao' => $observacaoRevisao,
                            'atributoNomeRevisao' => $atributoNomeRevisao,
                            'especificacaoAnteriorHasChanged' => $especificacaoAnteriorHasChanged
                        ];
                    // }
                }
            }


            // adiciona a revisão com seus itens
            $resumoItensRevisoes[] = [
                'id' => $revisao->id,
                'revisao' => $revisao->nome,
                'itens' => $itens,
                'hasBeforeRevisao' => $hasBeforeRevisao,
                'usuario' => $revisao->usuario->nome,
                'observacoes' => $revisao->especificacoesObservacoes->map(function ($observacao) {
                    return [
                        'conteudo' => $observacao->conteudo,
                        'conteudo_anterior' => $observacao->observacaoAnterior ? $observacao->observacaoAnterior->conteudo : null
                    ];
                }),
            ];
        }

        //amostra de pedidos
        $amostrasPedido = AtributoAmostraIndicePedido::where('pedido_id', $especificacao->pedido_id)
        ->whereNull('excluido')
        ->whereHas('amostra', function($query) {
            $query->where('excluido', null);
        })
        ->with(['amostra' => function ($query) use($idioma) {
            $query->whereNull('excluido')->orderBy('id')
                ->with([
                    'amostrasIdiomas' => function ($q) use($idioma)  {
                        $q->whereHas('idiomas', function ($query) use($idioma) {
                            $query->where('codigo', $idioma);
                        });
                    },
                ]);
        }])
        ->get();

        $especificacaoAmostrasPedido = EspecificacaoAmostraPedido::where('especificacao_id', $especificacao->id)->pluck('atributo_amostra_indice_pedido_id')->toArray();

        $produtosPedido = AtributoProdutoIndicePedido::where('pedido_id', $especificacao->pedido_id)
        ->whereNull('excluido')
        ->whereHas('produto', function($query) {
            $query->where('excluido', null);
        })
        ->with(['produto' => function ($query) use($idioma) {
            $query->whereNull('excluido')->orderBy('id')
                ->with([
                    'produtosIdiomas' => function ($q) use($idioma)  {
                        $q->whereHas('idiomas', function ($query) use($idioma) {
                            $query->where('codigo', $idioma);
                        });
                    },
                ]);
        }])
        ->get();

        $especificacaoProdutosPedido = EspecificacaoProdutoPedido::where('especificacao_id', $especificacao->id)->pluck('atributo_produto_indice_pedido_id')->toArray();
        
        return compact(
            'especificacao',
            'listaComparacao',
            'amostrasEspecificacoes',
            'maquinaAmostras',
            'produtosEspecificacoes',
            'maquinaProdutos',
            'resumoItens',
            'dadosAgrupadoAmostras',
            'dadosAgrupadoProdutos',
            'resumoItensRevisoes',
            'revisoes',
            'amostrasPedido',
            'especificacaoAmostrasPedido',
            'produtosPedido',
            'especificacaoProdutosPedido',
            'porcentagemResumo',
        );
    }

    public function exportarWord(int | string $id, $request)
    {
        $idioma = $request->lang ?? 'pt';
        app()->setLocale($idioma);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
    
        $especificacao = Especificacao::where('id', $id)->whereNull('excluido')->first();
        
        if(!$especificacao || !$id) {
            return false;
        }

        $atributosSelecionados = $this->getAtributosSelecionados($especificacao);

        $resumoItens = [];
    
        foreach ($atributosSelecionados as $dado) {
            
            $caracteristica = $this->getCaracteristica($dado, $idioma);

            $atributo = $this->getAtributo($dado, $idioma);
            
            $observacao = $dado['observacao_personalizada'] ?? '';
            $conteudo = $dado['conteudo'] ?? '';

            if ($caracteristica && $caracteristica->caracteristicasIdiomas->first()) {
                $caracteristicaNome = $caracteristica->caracteristicasIdiomas->first()->nome ?? __('messages.nao_informado');
                $unidade = $caracteristica->caracteristicasIdiomas->first()->unidade ?  ' '.$caracteristica->caracteristicasIdiomas->first()->unidade : '';
                $atributoNome = $atributo?->atributosIdiomas?->first()->nome ?? __('messages.nao_informado');
                $caracteristicaId = $caracteristica->id ?? '';
                $excluido = $caracteristica->excluido ? true : false;
                $comparavel = $caracteristica->comparavel ? true : false;
                $tipo = $caracteristica->tipo ?? '';

                if(strtolower($atributoNome) != 'n/a'){
                    $resumoItens[] = [
                        'caracteristica_id' => $caracteristicaId,
                        'caracteristica' => $caracteristicaNome,
                        'unidade' => $unidade,
                        'atributo' => $atributoNome,
                        'observacao' => $observacao,
                        'comparavel' => $comparavel,
                        'conteudo' => $conteudo,
                        'tipo' => $tipo,
                        'excluido' => $excluido
                    ];
                }
            } 
        }

        // ID
        $section->addText("ID: " . $especificacao->id . ';', ['color' => '000000']);
        
        //Serie
        $textRun = $section->addTextRun();
        $textRun->addText("Série: ", ['color' => '000000']);
        if ($especificacao->serie) {
            $textRun->addText($especificacao->serie . ';', ['color' => '000000']);
        } else {
            $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
        }

        // Código Focco
        $textRun = $section->addTextRun();
        $textRun->addText("Código Focco: ", ['color' => '000000']);
        if ($especificacao->codigo_focco) {
            $textRun->addText($especificacao->codigo_focco . ';', ['color' => '000000']);
        } else {
            $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
        }

        // Máquina
        $textRun = $section->addTextRun();
        $textRun->addText("Máquina: ", ['color' => '000000']);
        if ($especificacao->maquina->maquinasIdiomas->first()->nome) {
            $textRun->addText($especificacao->maquina->maquinasIdiomas->first()->nome . ';', ['color' => '000000']);
        } else {
            $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
        }

        // Cliente
        $textRun = $section->addTextRun();
        $textRun->addText("Cliente: ", ['color' => '000000']);
        if ($especificacao->pedido->cliente) {
            $textRun->addText($especificacao->pedido->cliente->nome . ';', ['color' => '000000']);
        } else {
            $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
        }

        if($request->tipo == 'especificacao' || $request->tipo == 'completa'){
            // $section->addText("Resumo:");
        
            // foreach ($resumoItens as $item) {
            //     if (strtolower($item['atributo']) != 'n/a') {
            //     $textRun = $section->addTextRun();

            //     $textRun->addText("{$item['caracteristica']}: ", ['color' => '000000']);

            //     if (!empty($item['atributo'])) {
            //             if ($item['atributo'] != "PERSONALIZADO") {
            //                 $textRun->addText($item['atributo'] . (!empty($item['unidade']) ? ' ' . $item['unidade'] : '') . ';', ['color' => '000000']);
            //             }else{
            //                 $textRun->addText($item['atributo'] . ';', ['color' => '000000']);
            //             }
            //         }
            //     } else {
            //         $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
            //     }

            //     if (!empty($item['observacao'])) {
            //         $section->addText("\n\nOBS: {$item['observacao']}");
            //     }
            // }

            $section->addText(
                "Especificações",
                ['bold' => true, 'size' => 12],
                ['spaceBefore' => 240, 'spaceAfter' => 240]
            );

            $agrupadosMultiplos = collect($resumoItens)->where('tipo', 'multiplos')->groupBy('caracteristica');
            $renderizados = [];

            foreach ($resumoItens as $item) {
                // Pula se já renderizou esse grupo de 'multiplos'
                if ($item['tipo'] === 'multiplos' && in_array($item['caracteristica'], $renderizados)) {
                    continue;
                }

                // MULTIPLOS - agrupar e renderizar
                if ($item['tipo'] === 'multiplos') {
                    $renderizados[] = $item['caracteristica'];
                    $section->addText("{$item['caracteristica']}:");

                   foreach ($agrupadosMultiplos[$item['caracteristica']] as $subitem) {

                        $textRun = $section->addTextRun();

                        if (!empty($subitem['conteudo'])) {
                            $textRun->addText("{$subitem['atributo']}: {$subitem['conteudo']}" . (!empty($subitem['unidade']) ? ' ' . $subitem['unidade'] : '') . ';');
                        } else {
                            $textRun->addText("{$subitem['atributo']}:");
                            $textRun->addText(" Não informado;", ['color' => 'FF0000']);
                        }

                        if (!empty($subitem['observacao'])) {
                            $section->addText("\n\nOBS: {$subitem['observacao']}");
                        }
                    }
                }

                elseif ($item['tipo'] === 'selecionavel') {
                    $textRun = $section->addTextRun();
                    $textRun->addText("{$item['caracteristica']}: ");

                    if (!empty($item['atributo'])) {
                        if ($item['atributo'] != "PERSONALIZADO") {
                            $textRun->addText($item['atributo'] . (!empty($item['unidade']) ? '' . $item['unidade'] : '') . ';');
                        } else {
                            $textRun->addText($item['atributo'] . ';');
                        }
                    } else {
                        $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                    }

                    if (!empty($item['observacao'])) {
                        $section->addText("\n\nOBS: {$item['observacao']}");
                    }
                }

                elseif ($item['tipo'] === 'texto') {
                    $textRun = $section->addTextRun();
                    $textRun->addText("{$item['caracteristica']}: ");

                    if (!empty($item['conteudo'])) {
                        $textRun->addText($item['conteudo'] . (!empty($item['unidade']) ? ' ' . $item['unidade'] : '') . ';');
                    } else {
                        $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                    }

                    if (!empty($item['observacao'])) {
                        $section->addText("\n\nOBS: {$item['observacao']}");
                    }
                }
            }
        }
       
        $indiceAmostraId = AtributoAmostraIndiceEspecificacao::where('especificacao_id', $especificacao->id)->where('excluido', null)->pluck('id')
        ->toArray();
        
        $idiomaId = Idioma::where('codigo', $idioma)->first()->id;
    
        $amostras = $this->getAtributoAmostras($indiceAmostraId, $idiomaId);

        $dadosPorAmostra = $amostras
        ->groupBy('amostra_nome')
        ->map(function ($grupo) {
            return $grupo->groupBy('indice_amostra_id');
        });

        $resumosAmostras = '';

        if($request->tipo == 'amostras' || $request->tipo == 'completa'){
            $section->addText(
                "Amostras",
                ['bold' => true, 'size' => 12],
                ['spaceBefore' => 240, 'spaceAfter' => 240]
            );
            foreach ($dadosPorAmostra as $amostraNome => $amostras) {
                $contador = 1; 
                
                foreach ($amostras as $amostrasDoIndice) {
                    $resumoAmostras = '';
                    $atributosAgrupados = [];
                    $imagensExibidas = [];
                    $amostraNomeExibido = false;


                    foreach ($amostrasDoIndice as $item) {
                        
                        if (!$amostraNomeExibido) {
                            $section->addText("{$item['amostra_nome']}", ['bold' => true]);
                            $section->addText(
                                "Modelo {$contador}",
                                [
                                    'size'  => 8,
                                    'color' => 'FF0000',
                                    'bold'  => false,
                                ]
                            );

                            $amostraNomeExibido = true;
                        }

                        if (isset($item['indice']['imagens']) && count($item['indice']['imagens']) > 0) {
                            foreach ($item['indice']['imagens'] as $imagem) {
                                if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                    $imgPath = public_path('assets/img/amostras/' . $imagem['imagem']);
                                    $this->addImageToSection($section, $imgPath);
                                    $imagensExibidas[] = $imagem['imagem'];
                                }
                            }
                        }

                        if ($item['atributo_tipo'] == 'multiplos') {
                            if(strtolower($item['conteudo']) != 'n/a'){
                                $atributosAgrupados[$item['atributo_nome']][] = [
                                    'sub_atributo_nome' => $item['sub_atributo_nome'],
                                    'atributo_unidade' => $item['atributo_unidade'],
                                    'conteudo' => $item['conteudo'],
                                    'observacao' => $item['observacao_personalizada']
                                ];
                            }
                        }

                        if ($item['atributo_tipo'] == 'texto') {
                            if (strtolower($item['conteudo']) != 'n/a') {
                                $textRun = $section->addTextRun();
                        
                                $textRun->addText("{$item['atributo_nome']}: ", ['color' => '000000']);
                        
                                if (!empty($item['conteudo'])) {
                                    $textRun->addText($item['conteudo'] . (!empty($item['atributo_unidade']) ? ' ' . $item['atributo_unidade'] : '') . ';', ['color' => '000000']);
                                } else {
                                    $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                                }
                        
                                if (!empty($item['observacao_personalizada'])) {
                                    $section->addText("\n\nOBS: {$item['observacao_personalizada']}");
                                }
                        
                                if (!empty($item['imagens'])) {
                                    foreach ($item['imagens'] as $imagem) {
                                        if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                            $imgPath = public_path('assets/img/amostras/atributos/' . $imagem['imagem']);
                                            $this->addImageToSection($section, $imgPath);
                                            $imagensExibidas[] = $imagem['imagem'];
                                        }
                                    }
                                }
                            }
                        }
                        
                        if ($item['atributo_tipo'] == 'selecionavel') {
                            if (strtolower($item['sub_atributo_nome']) != 'n/a') {
                                $textRun = $section->addTextRun();
                        
                                $textRun->addText("{$item['atributo_nome']}: ", ['color' => '000000']);
                        
                                if (!empty($item['sub_atributo_nome'])) {
                                    $textRun->addText($item['sub_atributo_nome'] . (!empty($item['atributo_unidade']) ? ' ' . $item['atributo_unidade'] : '') . ';', ['color' => '000000']);
                                } else {
                                    $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                                }
                        
                                if (!empty($item['observacao_personalizada'])) {
                                    $section->addText("\n\nOBS: {$item['observacao_personalizada']}");
                                }
                        
                                if (!empty($item['imagens'])) {
                                    foreach ($item['imagens'] as $imagem) {
                                        if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                            $imgPath = public_path('assets/img/amostras/atributos/' . $imagem['imagem']);
                                            $this->addImageToSection($section, $imgPath);
                                            $imagensExibidas[] = $imagem['imagem'];
                                        }
                                    }
                                }
                            }
                        }
                        
                    }

                    foreach ($atributosAgrupados as $atributoNome => $subatributos) {
                        $section->addText("{$atributoNome}");
                        foreach ($amostrasDoIndice as $itemImagem) {
                            if ($itemImagem['atributo_nome'] === $atributoNome && !empty($itemImagem['imagens'])) {
                                foreach ($itemImagem['imagens'] as $imagem) {
                                    if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                        $imgPath = public_path('assets/img/amostras/atributos/' . $imagem['imagem']);
                                        $this->addImageToSection($section, $imgPath);
                                        $imagensExibidas[] = $imagem['imagem'];
                                    }
                                }
                            }
                        }

                        foreach ($subatributos as $sub) {

                            $textRun = $section->addTextRun();
                        
                            $textRun->addText("{$sub['sub_atributo_nome']}: ", ['color' => '000000']);
                        
                            if (!empty($sub['conteudo'])) {
                                $textRun->addText($sub['conteudo'] . (!empty($sub['atributo_unidade']) ? ' ' . $sub['atributo_unidade'] : '') . ';', ['color' => '000000']);
                            } else {
                                $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                            }
                        
                            if (!empty($sub['observacao'])) {
                                $section->addText("\n\nOBS: {$sub['observacao']}");
                            }
                        }
                        
                    }

                    $resumosAmostras .= "<h5 style='margin:5px 0px;'>{$amostraNome} {$contador}</h5>";
                    $resumosAmostras .= $resumoAmostras;
                    $contador++;
                }
            }
        }

        $indiceProdutoId = AtributoProdutoIndiceEspecificacao::where('especificacao_id', $especificacao->id)->where('excluido', null)->pluck('id')
        ->toArray();

        $produtos = $this->getAtributoProdutos($indiceProdutoId, $idiomaId);

        $dadosPorProduto = $produtos
        ->groupBy('produto_nome')
        ->map(function ($grupo) {
            return $grupo->groupBy('indice_produto_id');
        });

        $resumosProdutos = '';

        if($request->tipo == 'produtos' || $request->tipo == 'completa'){
            $section->addText(
                "Produtos",
                ['bold' => true, 'size' => 12],
                ['spaceBefore' => 240, 'spaceAfter' => 240]
            );
            foreach ($dadosPorProduto as $produtoNome => $produtos) {
                $contador = 1; 
                
                foreach ($produtos as $produtosDoIndice) {
                    $resumoProdutos = '';
                    $atributosAgrupados = [];
                    $imagensExibidas = [];
                    $produtoNomeExibido = false;
        
                    foreach ($produtosDoIndice as $item) {
                        
                        if (!$produtoNomeExibido) {
                            $section->addText("{$item['produto_nome']}", ['bold' => true]);
                            $section->addText(
                                "Modelo {$contador}",
                                [
                                    'size'  => 8,
                                    'color' => 'FF0000',
                                    'bold'  => false,
                                ]
                            );
                            $produtoNomeExibido = true;
                        }
        
                        if (isset($item['indice']['imagens']) && count($item['indice']['imagens']) > 0) {
                            foreach ($item['indice']['imagens'] as $imagem) {
                                if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                    $imgPath = public_path('assets/img/produtos/' . $imagem['imagem']);
                                    $this->addImageToSection($section, $imgPath);
                                    $imagensExibidas[] = $imagem['imagem'];
                                }
                            }
                        }
        
                        if ($item['atributo_tipo'] == 'multiplos') {
                            if(strtolower($item['conteudo']) != 'n/a'){
                                $atributosAgrupados[$item['atributo_nome']][] = [
                                    'sub_atributo_nome' => $item['sub_atributo_nome'],
                                    'atributo_unidade' => $item['atributo_unidade'],
                                    'conteudo' => $item['conteudo'],
                                    'observacao' => $item['observacao_personalizada']
                                ];
                            }
                        }
        
                        if ($item['atributo_tipo'] == 'texto') {
                            if (strtolower($item['conteudo']) != 'n/a') {
                                $textRun = $section->addTextRun();
                        
                                $textRun->addText("{$item['atributo_nome']}: ", ['color' => '000000']);
                        
                                if (!empty($item['conteudo'])) {
                                    $textRun->addText($item['conteudo'] . (!empty($item['atributo_unidade']) ? ' ' . $item['atributo_unidade'] : '') . ';', ['color' => '000000']);
                                } else {
                                    $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                                }
                        
                                if (!empty($item['observacao_personalizada'])) {
                                    $section->addText("\n\nOBS: {$item['observacao_personalizada']}");
                                }
                        
                                if (!empty($item['imagens'])) {
                                    foreach ($item['imagens'] as $imagem) {
                                        if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                            $imgPath = public_path('assets/img/produtos/atributos/' . $imagem['imagem']);
                                            $this->addImageToSection($section, $imgPath);
                                            $imagensExibidas[] = $imagem['imagem'];
                                        }
                                    }
                                }
                            }
                        }
                        
                
                        if ($item['atributo_tipo'] == 'selecionavel') {
                            if (strtolower($item['sub_atributo_nome']) != 'n/a') {
                                $textRun = $section->addTextRun();
                        
                                $textRun->addText("{$item['atributo_nome']}: ", ['color' => '000000']);
                        
                                if (!empty($item['sub_atributo_nome'])) {
                                    $textRun->addText($item['sub_atributo_nome'] . (!empty($item['atributo_unidade']) ? ' ' . $item['atributo_unidade'] : '') . ';', ['color' => '000000']);
                                } else {
                                    $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                                }
                        
                                if (!empty($item['observacao_personalizada'])) {
                                    $section->addText("\n\nOBS: {$item['observacao_personalizada']}");
                                }
                        
                                if (!empty($item['imagens'])) {
                                    foreach ($item['imagens'] as $imagem) {
                                        if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                            $imgPath = public_path('assets/img/produtos/atributos/' . $imagem['imagem']);
                                            $this->addImageToSection($section, $imgPath);
                                            $imagensExibidas[] = $imagem['imagem'];
                                        }
                                    }
                                }
                            }
                        }
            
                    }
        
                    foreach ($atributosAgrupados as $atributoNome => $subatributos) {
                        $section->addText("{$atributoNome}");
                        foreach ($produtosDoIndice as $itemImagem) {
                            if ($itemImagem['atributo_nome'] === $atributoNome && !empty($itemImagem['imagens'])) {
                                foreach ($itemImagem['imagens'] as $imagem) {
                                    if (!in_array($imagem['imagem'], $imagensExibidas)) {
                                        $imgPath = public_path('assets/img/produtos/atributos/' . $imagem['imagem']);
                                        $this->addImageToSection($section, $imgPath);
                                        $imagensExibidas[] = $imagem['imagem'];
                                    }
                                }
                            }
                        }
        
                        foreach ($subatributos as $sub) {
        
                            $textRun = $section->addTextRun();
                        
                            $textRun->addText("{$sub['sub_atributo_nome']}: ", ['color' => '000000']);
                        
                            if (!empty($sub['conteudo'])) {
                                $textRun->addText($sub['conteudo'] . (!empty($sub['atributo_unidade']) ? ' ' . $sub['atributo_unidade'] : '') . ';', ['color' => '000000']);
                            } else {
                                $textRun->addText(__('messages.nao_informado').';', ['color' => 'FF0000']);
                            }
                        
                            if (!empty($sub['observacao'])) {
                                $section->addText("\n\nOBS: {$sub['observacao']}");
                            }
                        }
                        
                    }
        
                    $resumosProdutos .= "<h5 style='margin:5px 0px;'>{$produtoNome} {$contador}</h5>";
                    $resumosProdutos .= $resumoProdutos;
                    $contador++; 
                }
            }
        }

        $fileName = 'resumo_especificacao_' . $id . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);
    
        return response()->streamDownload(function () use ($tempFile) {
            readfile($tempFile);
            unlink($tempFile); 
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);
    }

    private function addImageToSection($section, string $imgPath, int $maxWidth = 450, string $align = 'left'){
        if (!file_exists($imgPath)) {
            return;
        }

        list($originalWidth, $originalHeight) = getimagesize($imgPath);

        if ($originalWidth > $maxWidth) {
            $scale = $maxWidth / $originalWidth;
            $targetWidth = $maxWidth;
            $targetHeight = intval($originalHeight * $scale);
        } else {
            $targetWidth = $originalWidth;
            $targetHeight = $originalHeight;
        }

        $section->addImage($imgPath, [
            'width'  => $targetWidth,
            'height' => $targetHeight,
            'align'  => $align,
        ]);
    }

    public function revisao(array $dados)
    {
        DB::beginTransaction();

        try {

            $especificacao = Especificacao::find($dados['especificacao_id']);

            if (!$especificacao) {
                throw new \Exception('Especificação não encontrada.');
            }

            $especificacao->update([
                'revisao_selecionada_id' => $dados['revisao_id'],
            ]);

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function amostra_pedido(array $dados)
    {
        DB::beginTransaction();

        try {

            $registro = EspecificacaoAmostraPedido::where('atributo_amostra_indice_pedido_id', $dados['atributo_amostra_indice_pedido_id'])->where('especificacao_id', $dados['especificacao_id'])->first();

            if ($dados['checked'] == 1 && !$registro) {
                EspecificacaoAmostraPedido::create([
                    'especificacao_id' => $dados['especificacao_id'],
                    'atributo_amostra_indice_pedido_id' => $dados['atributo_amostra_indice_pedido_id'],
                ]);

            }elseif ($dados['checked'] == 0 && $registro) {
                $registro->delete();
            }

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function produto_pedido(array $dados)
    {
        DB::beginTransaction();

        try {

            $registro = EspecificacaoProdutoPedido::where('atributo_produto_indice_pedido_id', $dados['atributo_produto_indice_pedido_id'])->where('especificacao_id', $dados['especificacao_id'])->first();

            if ($dados['checked']  == 1 && !$registro) {
                EspecificacaoProdutoPedido::create([
                    'especificacao_id' => $dados['especificacao_id'],
                    'atributo_produto_indice_pedido_id' => $dados['atributo_produto_indice_pedido_id'],
                ]);

            } elseif ($dados['checked'] == 0 && $registro) {
                $registro->delete();
            }

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
