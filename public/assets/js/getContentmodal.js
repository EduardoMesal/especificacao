let token = $('meta[name="csrf-token"]').attr('content');

// function getComentary(id) {
//     $(".idComment").val("");
//     $.ajax({
//         url: "/comentario/editar/" + id,
//         type: "GET",
//         dataType: "json",
//         data: {
//             _token: token,
//         },
//         success: function (response) {
//             $(".modalContent").val(response.conteudo);
//         },
//     });
// }

//COM CK

function getComentary(id) {
    $(".idComment").val("");
    $.ajax({
        url: "/comentario/editar/" + id,
        type: "GET",
        dataType: "json",
        data: {
            _token: token,
        },
        success: function (response) {
            var editorInstance = CKEDITOR.instances[`texto-${id}`];

            if (editorInstance) {
                editorInstance.setData(response.conteudo);
            } else {
                CKEDITOR.replace(`texto-${id}`, {
                }).setData(response.conteudo);
            }
        },
    });
}
