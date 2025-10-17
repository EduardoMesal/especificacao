@extends('layouts.lojista')
@section('title', 'Notificações')

@section('css')
@endsection

@section('content')

<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Notificações ({{$notificationsCount}})</h3>
                </div>
                <a href="{{route('Notification.read.all')}}" class="btn btn-primary readAll">Ler todas as notificações</a>
            </div>
            <div class="card-body">
                <div class="scroll-y me-n5 pe-5 h-lg-auto" data-kt-element="notificacoes" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="2px">
                    <div class="card">
                        <div class="card-body" style="padding: 0px 0px !important">
                            <div class="tab-content">
                                <div class="card-body tab-pane fade show active" role="tabpanel" style="padding: 0px 0px !important">
                                    <form class="responseAjax" action="{{route('Notification.action')}}" method="POST">
                                        @csrf
                                        @if($notificationsCount > 0)
                                        <div class="selectAll mb-5">
                                            <label class="form-check form-check-custom form-check-solid ">
                                                <input style="margin-left: 9px" class="form-check-input h-20px w-20px me-4" type="checkbox" type="checkbox" id="selecionar-todos">
                                                <span class="form-check-label fw-bold fs-5 fw-bold">Selecionar todos</span>
                                            </label>
                                        </div>
                                        @endif
                                        @foreach ($nt as $item)
                                        <a href="{{route('Lead.lead', ['marca' => $globalsite->marca->slug, 'slug' => $globalsite->id, 'id' => $item->lead_id])}}" class="text-reset notification-item">
                                            <div class="timeline mb-6 {{ $item->visualizada == 1 ? 'notifyContent' : '' }}">
                                                <div class="timeline-item align-items-center">
                                                    <div class="timeline-line w-40px"></div>
                                                    <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                                        <div class="symbol-label bg-light">
                                                            <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
                                                                    <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-content" style="margin-bottom: 0px">
                                                        <div class="pe-3 py-3">
                                                            <div class="fs-5 fw-bold mb-2">{{$item->titulo}}</div>
                                                            <div class="text-muted me-2 fs-7">{{$item->conteudo}}</div>
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <div class="text-muted me-2 fs-7">{{ Carbon\Carbon::parse($item->criado)->diffForHumans()}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($item->visualizada == 0)
                                                    <label class="form-check form-check-custom form-check-solid">
                                                        <input type="checkbox" class="form-check-input h-20px w-20px" name="notificacoes[]" value="{{ $item->id }}">
                                                    </label>
                                                    @elseif($item->visualizada != 0 && $notificationsCount > 0 )
                                                    <div style="margin-left: 15px"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                        <div class="d-flex align-items-center justify-content-between">
                                            @if($notificationsCount > 0)
                                            <button disabled type="submit" class="btn btn-primary w-lg leftAuto my-4" id="submitButtonCreate">Marcar como lido</button>
                                            @endif
                                            <div style="margin: 15px 0px">
                                                {{ $nt->links('vendor.pagination.custom') }}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('plugins')
<script>
    $(function() {
        $('#selecionar-todos').click(function() {
            $('input[type="checkbox"]').prop('checked', $(this).is(':checked'));
            if ($(this).is(':checked')) {
                $('#submitButtonCreate').prop('disabled', false); //remove
            } else {
                $('#submitButtonCreate').prop('disabled', true); //add
            }
        });

        $('input[type="checkbox"]').not('#selecionar-todos').click(function() {
            if (!$(this).is(':checked')) {
                $('#selecionar-todos').prop('checked', false);
            }
            if ($('input[type="checkbox"]').not('#selecionar-todos').is(':checked')) {
                $('#submitButtonCreate').prop('disabled', false); //remove
            } else {
                $('#submitButtonCreate').prop('disabled', true); //add
            }
        });
    });
</script>
@endsection