let alteracoesFeitas = false;

$('input, textarea, select, input:radio, input:checkbox').on('change input', function () {
    alteracoesFeitas = true;
});

$(window).on('beforeunload', function (e) {
    if (alteracoesFeitas) {
        var message = "Você tem alterações não salvas. Tem certeza que deseja sair?";
        e.preventDefault();
        e.returnValue = message;
        return message;
    }
})