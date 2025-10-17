@extends('layouts.admin')
@section('title', 'Editar proposta')

@section('css')
@endsection

@section('content')
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start flex-wrap mb-2">
                            <div class="flex-column">
                                <form class="form responseAjax" method="POST" action="{{route('Propostas.editar_action', ['id' => $proposta->id])}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        <h1 class="">Editar proposta</h1>
                                    </div>
                                    <div class="row g-9 mb-8">
                                       <input type="hidden" name="especificacao_id" value="{{$proposta->especificacao_id}}">
                                        <div class="col-md-12 mb-8 fv-row ckEditorView">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="notRequired">Conteúdo</span>
                                            </label>
                                            <textarea name="conteudo_proposta" id="texto-2" class="form-control ckText">
                                                {!! $proposta->conteudo_proposta !!}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                            <span class="indicator-label">Enviar</span>
                                        </button>
                                    </div>
                                </form>
                                <button id="exportarWord">Exportar para Word</button>
                            </div>
                            
                            <div class="word">
                                  {!! $proposta->conteudo_proposta !!}
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
    $('#exportarWord').on('click', function () {
    const element = $('.word').clone(); // clona para não alterar o DOM

    const imgs = element.find('img');
    const total = imgs.length;
    let loaded = 0;

    if (total === 0) {
        exportarParaWord(element.html());
        return;
    }

    imgs.each(function () {
        const img = $(this)[0];
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        const image = new Image();
        image.crossOrigin = 'anonymous'; // necessário para converter imagens externas
        image.src = img.src;

        image.onload = function () {
            canvas.width = image.width;
            canvas.height = image.height;
            ctx.drawImage(image, 0, 0);
            const dataURL = canvas.toDataURL();
            img.src = dataURL;

            loaded++;
            if (loaded === total) {
                exportarParaWord(element.html());
            }
        };

        image.onerror = function () {
            loaded++;
            if (loaded === total) {
                exportarParaWord(element.html());
            }
        };
    });

    function exportarParaWord(conteudo) {
        const header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
            "xmlns:w='urn:schemas-microsoft-com:office:word' " +
            "xmlns='http://www.w3.org/TR/REC-html40'>" +
            "<head><meta charset='utf-8'></head><body>";
        const footer = "</body></html>";
        const sourceHTML = header + conteudo + footer;

        const source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        const fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'proposta.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }
});


</script>
@endsection