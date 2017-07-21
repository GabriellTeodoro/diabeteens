idParticipante = 0;

function atualizaCampos(data) {
    $("input[name='camposGlicose']").val('');

    $.ajax({
        url: 'control/glicosesController.php',
        type: 'post',
        data: {opcao: 'atualizaCampos', idParticipante: idParticipante, data: data},
        success: function (r) {
            var retorno = JSON.parse(r);
            $.each(retorno, function (i, val) {

                $("#glicose_" + i).val(val['glicemia']);
                $("#glicose_" + i).attr('data-id', val['idGlicemia']);
//                return (this != "four"); // will stop running to skip "five"
            });
        }
    })
}

$(document).ready(function () {
    $("#dataGlicose").change(function () {
        var data = $(this).val();
        atualizaCampos(data);
    });

    $("#modalGlicose").on('hide.bs.modal', function () {
        //apaga os valores alterados dinamicamente
        $("#idParticipante").val('');
        $("#glicose_0").val('');
        $("#glicose_1").val('');
        $("#glicose_2").val('');

        //apaga os data-id
        $("#glicose_0").attr('data-id', '0');
        $("#glicose_1").attr('data-id', '0');
        $("#glicose_2").attr('data-id', '0');

        //apaga as classes de validação
        $("#form-group-glicose_0").removeClass('has-error has-success has-feedback');
        $("#form-group-glicose_1").removeClass('has-error has-success has-feedback');
        $("#form-group-glicose_2").removeClass('has-error has-success has-feedback');

        //carrega os dados atualizados
        $("#listaParticipantesGlicemia tbody").load('listaPrincipal.php');
    });

    $("input[name='camposGlicose']").change(function () {
        var glicose = $(this).val();
        var data = $("#dataGlicose").val();
        var idGlicemia = $(this).attr('data-id');
        var idParticipante = $("#idParticipante").val();
        var opcao = (idGlicemia == 0) ? 'cadGlicemia' : 'altGlicemia';
        var idCampo = $(this).attr('id')
        var validaCampo = false;

        if (glicose < 70) {
            validateBootstrap(idCampo, 'A glicose deve ser maior que 70', 1);
            validaCampo = false;
        } else {
            validateBootstrap(idCampo, '', 0);
            validaCampo = true;
        }

        if (validaCampo) {
            $.ajax({
                url: 'control/glicosesController.php',
                type: 'post',
                data: {opcao: opcao, idParticipante: idParticipante, data: data, glicose: glicose, idGlicemia: idGlicemia},
                success: function (r) {
                    
                    console.log(r);
                    $("#" + idCampo).attr('data-id', r);
                }
            });
        }

    });
})