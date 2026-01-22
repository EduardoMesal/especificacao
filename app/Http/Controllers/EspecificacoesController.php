<?php

namespace App\Http\Controllers;

use App\Models\Especificacao;
use App\Models\AtributoEspecificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EspecificacoesControllerRequest;
use App\Services\EspecificacaoService;
use App\Services\DeleteDefaultService;

class EspecificacoesController extends Controller
{   
    public function index(Request $request, EspecificacaoService $especificacaoService)
    {
        $dados = [
            'codigo_focco' => $request->input('codigo_focco'),
            'serie' => $request->input('serie'),
            'maquina_id' => $request->input('maquina_id'),
            'cliente_nome' => $request->input('cliente_nome'),
            'status' => $request->input('status'),
            'usuario' => $request->input('usuario'),
            'criado' => $request->input('criado'),
        ];

        $query = $especificacaoService->index($dados);
        
        return view('Especificacoes/index', [
            'codigo_focco' => $dados['codigo_focco'] ?? '',
            'serie' => $dados['serie'] ?? '',
            'cliente_nome' => $dados['cliente_nome'] ?? '',
            'status' => $dados['status'] ?? '',
            'maquinas' => $query['maquinas'],
            'maquina_id' => $dados['maquina_id'] ?? '',
            'usuario' => $dados['usuario'] ?? '',
            'especificacoes' => $query['especificacoes'],
            'criado' => $dados['criado'] ?? '',
        ]);
    }

    public function criar_etapa1(Request $request, EspecificacaoService $especificacaoService)
    {
        $dados = [
            'nome' => $request->input('nome'),
        ];

        $maquinas = $especificacaoService->get_criar_etapa1($dados);

        return view('Especificacoes/criar/etapa1', [
            'nome' => $dados['nome'] ?? '',
            'maquinas' => $maquinas,
        ]);
    }

    public function criar_etapa2($slug, EspecificacaoService $especificacaoService)
    {
        $query = $especificacaoService->get_criar_etapa2($slug);

        if (!$query['maquina']) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhuma máquina foi encontrada.'
            ]);
        }

        return view('Especificacoes/criar/etapa2', [
            'maquina' => $query['maquina'],
            'pedidos' => $query['pedidos'],
        ]);
    }

    public function criar_action(EspecificacoesControllerRequest $request, $id, EspecificacaoService $especificacaoService)
    {   
        try {
            $data = $request->only(['codigo_focco', 'pedido_id', 'serie', 'caracteristicas', 'att']);
            $especificacaoService->criar($data, $id);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => $e->getMessage() ?? 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }


    public function editar($id, EspecificacaoService $especificacaoService)
    {
        $query = $especificacaoService->get_editar($id);

        if (!$query['especificacao']) {
           return redirect('/dashboard')->with([
                'error' => 'Nenhuma especificação foi encontrada.'
            ]);
        }

        if (!$query['especificacao']->maquina) {
            return redirect('/dashboard')->with([
                'error' => 'Especificação não encontrada ou sem máquina associada.'
            ]);
        }

        // if (!$query['clientes']) {
        //     return redirect('/dashboard')->with([
        //         'error' => 'Nenhum cliente foi encontrado.'
        //     ]);
        // }
        return view('Especificacoes/editar', [
            'especificacao' => $query['especificacao'],
            // 'clientes' => $query['clientes'],
            'pedidos' => $query['pedidos'],
            'atributosSelecionados' => $query['atributosSelecionados'],
        ]);
    }
    
    public function editar_action(EspecificacoesControllerRequest $request, $id, EspecificacaoService $especificacaoService)
    {
        $user = Auth::User();

        try {
            $data = $request->only(['cliente_id', 'codigo_focco', 'serie', 'caracteristicas', 'att', 'pedido_id', 'att_ids_originais']);
            $especificacaoService->editar($data, $id, $user);
            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => $e->getCode() === 404
                    ? $e->getMessage()
                    : 'Ocorreu um erro durante o processamento. Tente novamente.',
            ],  500);
        }
    }

    public function especificacao(Request $request, $id, EspecificacaoService $especificacaoService)
    {
        $dados = $request->only([
            'lang',
        ]);

        $query = $especificacaoService->especificacao($id, $dados);

        if (!$query['especificacao']) {
            return redirect('/dashboard')->with([
                'error' => 'Especificação não foi encontrada.'
            ]);
        }

        if (!$query['especificacao']->maquina) {
            return redirect('/dashboard')->with([
                'error' => 'Nenhuma especificação ou máquina associada foi encontrada.'
            ]);
        }
        

        return view('Especificacoes/especificacao', [
            'especificacao' => $query['especificacao'],
            'listaComparacao' => $query['listaComparacao'],
            'amostrasEspecificacoes' => $query['amostrasEspecificacoes'],
            'maquinaAmostras' => $query['maquinaAmostras'],
            'produtosEspecificacoes' => $query['produtosEspecificacoes'],
            'maquinaProdutos' => $query['maquinaProdutos'],
            'resumoItens' => $query['resumoItens'],
            'dadosPorAmostra' => $query['dadosAgrupadoAmostras'],
            'dadosPorProduto' => $query['dadosAgrupadoProdutos'],
            'resumoItensRevisoes' => $query['resumoItensRevisoes'],
            'revisoes' => $query['revisoes'],
            'amostrasPedido' => $query['amostrasPedido'],
            'especificacaoAmostrasPedido' => $query['especificacaoAmostrasPedido'],
            'produtosPedido' => $query['produtosPedido'],
            'especificacaoProdutosPedido' => $query['especificacaoProdutosPedido'],
            'porcentagemResumo' => $query['porcentagemResumo'],
        ]);
    }

    public function amostra_pedido(Request $request, EspecificacaoService $especificacaoService)
    {   
        try {
            $data = $request->only(['atributo_amostra_indice_pedido_id', 'checked', 'especificacao_id']);

            $especificacaoService->amostra_pedido($data);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => $e->getMessage() ?? 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function produto_pedido(Request $request, EspecificacaoService $especificacaoService)
    {   
        try {
            $data = $request->only(['atributo_produto_indice_pedido_id', 'checked', 'especificacao_id']);

            $especificacaoService->produto_pedido($data);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => $e->getMessage() ?? 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function excluir($id, DeleteDefaultService $deleteDefaultService)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'ID não fornecido',
            ], 400);
        }

        try {
    
           $deleteDefaultService->remove(new Especificacao(), 'id', null, $id, null);

           return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Excluído com sucesso',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function excluir_caracteristica(Request $request, $id, DeleteDefaultService $deleteDefaultService)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'ID não fornecido',
            ], 400);
        }

        $atributoEspecificacao = AtributoEspecificacao::where('caracteristica_id', $id)->where('especificacao_id', $request->especificacao_id)->first();
        
        if (!$atributoEspecificacao) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Especificação não encontrada',
            ], 404);
        }

        if ($atributoEspecificacao) {

            DB::beginTransaction();

            try {

                $response = $atributoEspecificacao->delete();

                if (!$response) {
                    throw new \Exception('Erro ao excluir a especificação.');
                }

                if ($response) {
                    DB::commit();
                    return response()->json([
                        'success' => true,
                        'title' => 'Feito',
                        'icon' => 'success',
                        'message' => 'Excluído com sucesso',
                    ], 200);
                }
            } catch (\Exception $e) {
                DB::rollBack();
        
                return response()->json([
                    'success' => false,
                    'title' => 'Oops...',
                    'icon' => 'error',
                    'erro' => $e->getMessage(),
                    'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
                ], 500);
            }
        }

        return response()->json([
            'success' => false,
            'title' => 'Oops...',
            'icon' => 'error',
            'message' => 'Falha ao excluir especificação',
        ], 500);
    }


    public function exportarWord(Request $request, $id, EspecificacaoService $especificacaoService)
    {
        $document = $especificacaoService->exportarWord($id, $request);

        if (!$document) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Especificação não encontrada',
            ], 404);
        }

        return $document;
    }

    public function comparacao(Request $request, $id)
    {
        $especificacaoBaseId = $request->input('especificacaoBaseId');

        $idioma = $request->input('idioma') ?? 'pt';

        $especificacaoBase = Especificacao::where('id', $especificacaoBaseId)->where('excluido', null)->first();
        $especificacao = Especificacao::where('id', $id)->where('excluido', null)->first();

        $atributosComparar = AtributoEspecificacao::where('especificacao_id', $id)
        ->where('revisao_id', $especificacao->revisao_selecionada_id)
        ->with([
            'caracteristica.secao' => function ($query) {
                $query->select('id', 'ordem');
            },
            'caracteristica' => function ($query) use($idioma) {
                $query->select('id', 'tipo', 'excluido', 'secao_id', 'comparavel')
                ->with([
                    'caracteristicasIdiomas' => function ($q) use($idioma) {
                        $q->whereHas('idiomas', function ($sub) use($idioma) {
                            $sub->where('codigo', $idioma);
                        })
                        ->limit(1);
                    },
                ]);
            },
            'atributo' => function ($query) use($idioma) {
                $query->whereNull('excluido')
                ->with([
                    'atributosIdiomas' => function ($q) use($idioma) {
                        $q->where('nome', 'not like', '%N/A%')
                        ->where('nome', 'not like', '%n/a%')
                        ->whereHas('idiomas', function ($sub) use($idioma) {
                            $sub->where('codigo', $idioma);
                        })
                        ->limit(1);
                    },
                ]);
            },
        ])
        ->get()
        ->sortBy(function ($item) {
            $comparavel = $item->caracteristica->comparavel ?? 0;
            $ordemSecao = $item->caracteristica->secao->ordem ?? 9999;
            return [$comparavel ? 0 : 1, $ordemSecao];
        })
        ->values();

        $atributosBase = AtributoEspecificacao::where('especificacao_id', $especificacaoBaseId)
        ->where('revisao_id', $especificacaoBase->revisao_selecionada_id)
        ->with([
            'caracteristica.secao' => function ($query) {
                $query->select('id', 'ordem');
            },
            'caracteristica' => function ($query) use($idioma) {
                $query->with([
                    'caracteristicasIdiomas' => function ($q) use($idioma) {
                        $q->whereHas('idiomas', function ($sub) use($idioma) {
                            $sub->where('codigo', $idioma);
                        });
                    },
                ]);
            },
            'atributo' => function ($query) use($idioma) {
                $query->whereNull('excluido')
                ->with([
                    'atributosIdiomas' => function ($q) use($idioma) {
                        $q->where('nome', 'not like', '%N/A%')
                        ->where('nome', 'not like', '%n/a%')
                        ->whereHas('idiomas', function ($sub) use($idioma) {
                            $sub->where('codigo', $idioma);
                        });
                    },
                ]);
            },
        ])
        ->get()
        ->sortBy(function ($item) {
            $comparavel = $item->caracteristica->comparavel ?? 0;
            $ordemSecao = $item->caracteristica->secao->ordem ?? 9999;

            return [$comparavel ? 0 : 1, $ordemSecao];
        })
        ->values();

        $iguaisRaw = [];
        $diferentesComparado = [];
        $diferentesBase = [];

        $comparadoPorCaracteristica = $atributosComparar->groupBy('caracteristica_id');
        $basePorCaracteristica = $atributosBase->groupBy('caracteristica_id');

       foreach ($comparadoPorCaracteristica as $caracteristicaId => $itensComparado) {

            $itensBase = $basePorCaracteristica->get($caracteristicaId);

            if (!$itensBase) {
                continue;
            }

            $tipo = $itensComparado->first()->caracteristica->tipo;

            // 🔹 TEXTO / SELECIONÁVEL
            if ($tipo !== 'multiplos') {
                $attrComparado = $itensComparado->first();
                $attrBase = $itensBase->first();

                $iguais = false;

                if ($tipo === 'texto') {
                    $iguais = trim(strtolower($attrComparado->conteudo ?? '')) ===
                            trim(strtolower($attrBase->conteudo ?? ''));
                }

                if ($tipo === 'selecionavel') {
                    $iguais = $attrComparado->atributo_id === $attrBase->atributo_id;
                }

                if ($iguais) {
                    $iguaisRaw[] = $attrComparado;
                } else {
                    $diferentesComparado[] = $attrComparado;
                    $diferentesBase[] = $attrBase;
                }

                continue;
            }

            // 🔹 MULTIPLOS
            $baseIndexado = $itensBase->keyBy('atributo_id');

            foreach ($itensComparado as $itemComparado) {

                $itemBase = $baseIndexado->get($itemComparado->atributo_id);

                $conteudoComparado = trim(strtolower($itemComparado->conteudo ?? ''));
                $conteudoBase = trim(strtolower($itemBase->conteudo ?? ''));

                $iguais = false;

                // ambos vazios
                if ($conteudoComparado === '' && $conteudoBase === '') {
                    $iguais = true;
                }

                // ambos preenchidos e iguais
                if ($conteudoComparado !== '' && $conteudoComparado === $conteudoBase) {
                    $iguais = true;
                }

                if ($iguais) {
                    $iguaisRaw[] = $itemComparado;
                } else {
                    $diferentesComparado[] = $itemComparado;

                    if ($itemBase) {
                        $diferentesBase[] = $itemBase;
                    }
                }
            }
        }

        return response()->json([
            'iguais' => self::formatarItens(
                collect($iguaisRaw)->values()->all()
            ),
            'diferentes' => [
                'comparado' => self::formatarItens(
                    collect($diferentesComparado)->values()->all()
                ),
                'base' => self::formatarItens(
                    collect($diferentesBase)->values()->all()
                ),
            ]
        ]);
    }

    private static function formatarItens(array $itens)
    {
        $agrupados = [];

        foreach ($itens as $item) {
            $tipo = $item->caracteristica->tipo ?? '';
            $nomeCaract = $item->caracteristica->caracteristicasIdiomas->first()->nome ?? '';
            $nomeAttr = $item->atributo?->atributosIdiomas->first()->nome ?? null;
            $conteudo = $item->conteudo ?? null;
            $unidade = $item->caracteristica->caracteristicasIdiomas->first()->unidade ?? '';

            $valor = 'Não informado';
            $nomeCaract = "<span style='font-weight: 600; color: #000'>{$nomeCaract}:</span>";
            if ($tipo === 'texto') {
                if (!empty($conteudo) && strtolower($conteudo) !== 'n/a') {
                    $valor = $conteudo;
                }
                $linha = "{$nomeCaract} {$valor}";
                if ($unidade && $valor !== 'Não informado') $linha .= " {$unidade}";
                $linha .= ';';
                $agrupados[] = $linha;

            } elseif ($tipo === 'multiplos') {
                $linha = "<span style='font-weight: 600; color: #000'>{$nomeAttr}:</span> ";
                $linha .= (!empty($conteudo) && strtolower($conteudo) !== 'n/a') ? $conteudo : "<span style='color: #e2231a'>Não informado</span>";
                if ($unidade) $linha .= " {$unidade}";
                $linha .= ';';
                $agrupados[$nomeCaract][] = $linha;

            } elseif ($tipo === 'selecionavel') {
                $valor = $nomeAttr ?? "<span style='color: #e2231a'>Não informado</span>";

                $linha = "{$nomeCaract} {$valor}";
                if ($unidade && $valor !== 'Não informado'){
                    $linha .= " {$unidade}";
                }
                $linha .= ';';
                $agrupados[] = $linha;
            } else {
                $linha = "{$nomeCaract} <span style='color: #e2231a'>Não informado</span>;";
                $agrupados[] = $linha;
            }
        }

        $resultado = [];
        
        foreach ($agrupados as $chave => $valor) {
            if (is_array($valor)) {
                $linhas = implode("<br/>\n", $valor);
                $resultado[] = "{$chave}:<br/>\n{$linhas}";
            } else {
                $resultado[] = $valor;
            }
        }

        return $resultado;
    }

    public function revisao(Request $request, EspecificacaoService $especificacaoService)
    {
        $dados = [
            'especificacao_id' => $request->input('especificacao_id'),
            'revisao_id' => $request->input('revisao_id'),
        ];

        $revisao = $especificacaoService->revisao($dados);

        if (!$revisao) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Revisão não encontrada.',
            ], 404);
        }

        return $revisao;
    }

    public function get_amostra_pedido(Request $request, EspecificacaoService $especificacaoService)
    {
        $data = $request->only(['atributo_amostra_indice_pedido_id', 'lang']);
        $amostraPedido = $especificacaoService->get_amostra_pedido($data);

        if (!$amostraPedido) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Amostra não encontrada.',
            ], 404);
        }

        return $amostraPedido;
    }

    public function get_produto_pedido(Request $request, EspecificacaoService $especificacaoService)
    {
        $data = $request->only(['atributo_produto_indice_pedido_id', 'lang']);
        $produtoPedido = $especificacaoService->get_produto_pedido($data);

        if (!$produtoPedido) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'Produto não encontrado.',
            ], 404);
        }

        return $produtoPedido;
    }
}
