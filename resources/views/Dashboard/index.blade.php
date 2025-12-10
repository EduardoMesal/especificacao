@extends('layouts.admin')
@section('title', 'Especificações')

@section('css')
@endsection

@section('content')
<section class="section pt-40">
    <div class="container-fluid">
        <!-- <div class="title-wrapper">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h2>Home</h2>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="icon-card">
                    <div class="icon primary">
                        <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Especificações criadas</h6>
                        <h3 class="text-bold mb-10">{!! $especificacoesCount !!}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="icon-card">
                    <div class="icon success">
                        <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Pedidos criados</h6>
                        <h3 class="text-bold mb-10">{!! $pedidosCount !!}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="icon-card icon-card-final">
                    <div class="icon orange">
                        <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Máquinas cadastradas</h6>
                        <h3 class="text-bold mb-10">{!! $masquinasCount !!}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="pb-30 pb-xl-0 col-md-12 col-xl-6">
                <div class="card-style">
                    <div class="">
                        <div id="chartMonth"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="card-style" >
                    <div class="title d-flex flex-wrap align-items-center justify-content-between">
                        <div class="left">
                            <h6 class=" text-bold">Especificações</h6>
                        </div>
                    </div>
                    <div class="chartStatusArea">
                        <div id="chartStatus"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-style">
                    <div class="mb-30 d-flex align-items-center justify-content-between w-100">
                        <h6 class="text-medium ">Especificações recentes</h6>
                        <div style="height: 19px; margin-right: 5px; position: relative">
                            <button class="p-0 dropdown-modal" id="modalOpenFilter">
                                <i class="lni lni-more-alt"></i>
                            </button>
                            <div class="hidden modal-options-menu" data-modal="modalOpenFilter">
                                <ul class="modal-options">
                                    <li class="dropdown-item openSide link-modal" style="cursor: pointer;">
                                        <i class="bi bi-filter"></i> Filtrar
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{route('Dashboard.index')}}" class="text-danger">
                                            <i class="bi bi-filter"></i> Limpar filtro
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    @component('components.filtros', [
                    'url' => route('Dashboard.index'),
                    'nome' => isset($nome) ? $nome : null,
                    'telefone' => isset($telefone) ? $telefone : null,
                    'codigo_focco' => isset($codigo_focco) ? $codigo_focco : null,
                    'serie' => isset($serie) ? $serie : null,
                    'maquina_id' => isset($maquina_id) ? $maquina_id : null,
                    'cliente_id' => isset($cliente_id) ? $cliente_id : null,
                    'cliente_nome' => isset($cliente_nome) ? $cliente_nome : null,
                    'maquinas' => isset($maquinas) ? $maquinas : null,
                    'equipamentos' => isset($equipamentos) ? $equipamentos : null,
                    'equipamento_id' => isset($equipamento_id) ? $equipamento_id : null,
                    'clientes' => isset($clientes) ? $clientes : null,
                    'status' => isset($status) ? $status : null,
                    'criado' => isset($criado) ? $criado : null,
                    ])
                    @endcomponent
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="th-info">
                                        <h6>Id</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Código Focco</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Status</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Máquina</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Cliente</h6>
                                    </th>
                                    <th class="th-info">
                                        <h6>Criado</h6>
                                    </th>
                                    <th>
                                        <h6>Ações</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($especificacoes) > 0)
                                @foreach($especificacoes as $item)
                                @if($item->maquina)
                                <tr data-href="{{route('Especificacoes.especificacao', ['id' => $item->id])}}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {!! $item->id !!}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    @if($item->codigo_focco)
                                                    {!! $item->codigo_focco !!}
                                                    @else
                                                    -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <span class="d-block"></span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    @if ($item->status === 'Finalizada')
                                                    <span class="badge text-bg-finalizada">Finalizada</span>
                                                    @elseif ($item->status === 'Não iniciada')
                                                    <span class="badge text-bg-danger">Não iniciada</span>

                                                    @elseif ($item->status === 'Em andamento')
                                                    <span class="badge text-bg-grey">Em andamento</span>
                                                    @else
                                                    <span class="badge text-bg-danger">Não iniciada</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="{{ optional($item->maquina->maquinasIdiomas->first())->nome }}"
                                                    class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 150px">
                                                    @if((optional($item->maquina->maquinasIdiomas->first())->nome))
                                                    {{ optional($item->maquina->maquinasIdiomas->first())->nome }}
                                                    @else
                                                    -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="{{ $item->pedido->cliente->nome }}"
                                                    class="text-gray-800 text-hover-primary mb-1 fs-6 limite-texto" style="width: 150px">
                                                    @if($item->pedido->cliente->nome)
                                                    {!! $item->pedido->cliente->nome !!}
                                                    @else
                                                    -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <span class="d-block"></span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-gray-800 text-hover-primary mb-1 fs-6">
                                                    {{ $item->criado->format('d/m/Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <span class="d-block"></span>
                                    </td>
                                    <td >
                                        <div>
                                            <button class="p-0 dropdown-modal" id="modalOpenFilterEspcificacoes{{$item->id}}">
                                                <i class="lni lni-more-alt"></i>
                                            </button>
                                        </div>
                                        <div class="hidden modal-options-menu" data-modal="modalOpenFilterEspcificacoes{{$item->id}}">
                                            <ul class="modal-options modal-options-table">
                                                <li class="dropdown-item">
                                                    <a class="link-modal" href="{{route('Especificacoes.especificacao', ['id' => $item->id])}}"> <i class="bi bi-eye"></i> Visualizar
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a class="link-modal" href="{{route('Especificacoes.editar', ['id' => $item->id])}}"> <i class="bi bi-pencil"></i> Editar
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <form class="responseAjax" action="{{route('Especificacoes.excluir', ['id' => $item->id])}}" method="post">
                                                        @csrf
                                                        <button class="deleteBt text-danger" type="submit">
                                                            <i class="bi bi-trash"></i> Excluir
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                @endif
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">
                                        <span class="text-gray-800 d-block mb-1 fs-6">Nenhum resultado encontrado!</span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="contentPaginate">
                        {{ $especificacoes->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="section pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card-style">
                    <div class="title d-flex flex-wrap align-items-center justify-content-between">
                        <div class="left">
                            <h6 class="text-bold mb-4">Máquinas com mais especificações</h6>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 shadow text-center">
                                    <div class="icon iconMachine">
                                        <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection

@section('plugins')
<script src="{{ mixAssets('assets/js/apexcharts.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var especificacoesPerMonths = @json($especificacoesPerMonths);

        // var options = {
        //     chart: {
        //         type: 'bar',
        //         height: 420,
        //     },
        //     series: [{
        //         name: 'Especificações cadastradas',
        //         data: especificacoesPerMonths.map(function(item) {
        //             return item.especificacoes;
        //         })
        //     }],
        //     xaxis: {
        //         categories: especificacoesPerMonths.map(function(item) {
        //             return item.month;
        //         }),
        //     },
        //     yaxis: {
        //         title: {
        //             text: 'Especificações cadastradas'
        //         }
        //     },
        //     dataLabels: {
        //         enabled: true
        //     },
        //     tooltip: {
        //         y: {
        //             formatter: function(value) {
        //                 return value;
        //             }
        //         }
        //     },
        //     stroke: {
        //         curve: 'smooth',
        //     },
        //     markers: {
        //         size: 5,
        //         colors: ['#e2231a'],
        //         strokeColor: '#f9fafb',
        //         strokeWidth: 2,
        //     },
        //     colors: ['#e2231a'],
        //     grid: {
        //         borderColor: '#f9fafb',
        //         row: {
        //             colors: ['#f9fafb', 'transparent'],
        //             opacity: 0.5
        //         },
        //     }
        // };

        var options = {
            series: [{
                name: 'Especificações cadastradas',
                data: especificacoesPerMonths.map(function(item) {
                    return item.especificacoes;
                })
            }],
            chart: {
                type: 'bar',
                height: 420
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: true
            },
            markers: {
                size: 5,
                colors: ['#e2231a'],
                strokeColor: '#f9fafb',
                strokeWidth: 2,
            },
            colors: ['#e2231a'],
            grid: {
                borderColor: '#f9fafb',
                row: {
                    colors: ['#f9fafb', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: especificacoesPerMonths.map(function(item) {
                    return item.month;
                }),
            }
        };


        var chart = new ApexCharts(document.querySelector("#chartMonth"), options);
        chart.render();

        const pendentes = @json($especificacoesPendentesCount);
        const finalizadas = @json($especificacoesFinalizadasCount);
        const producao = @json($especificacoesEmProducaoCount);

        const total = pendentes + finalizadas + producao;

        const porcentagens = [
            (pendentes / total) * 100, // Não iniciada
            (producao / total) * 100, // Em andamento
            (finalizadas / total) * 100 // Finalizadas
        ];

        var options = {
            series: porcentagens,

            chart: {
                height: 436,
                type: 'radialBar',
            },

            colors: [
                '#e2231a', //  Vermelho → Não iniciada
                '#b9b9b9', //  Cinza → Em andamento
                '#60d66a' //  Verde → Finalizadas
            ],

            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },

                        value: {
                            fontSize: '16px',
                            formatter: function(val, opts) {
                                const valores = [pendentes, producao, finalizadas];
                                return `${Math.round(val)}%`;
                            }
                        },

                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function() {
                                return total;
                            }
                        }
                    }
                }
            },

            labels: ['Não iniciada', 'Em andamento', 'Finalizadas'],

            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: {
                    width: 12,
                    height: 12,
                    radius: 12
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chartStatus"), options);
        chart.render();
    });
</script>
@endsection