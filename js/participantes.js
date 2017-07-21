idParticipante = 0;

function delParticipante(idParticipante) {
    $.post('control/participantesController.php', {opcao: 'excluir', idUsuario: idParticipante},
            function (r) {
                console.log(r);
                $("#modalDelParticipante").modal('hide');
                $("#listaParticipantes").load('listaParticipante.php');
            });
}

function modalDelParticipante(idParticipanteClick) {
    var nome = $(this).attr('data-name');
//    var idParticipanteClick = $(this).attr('data-id');
    idParticipante = idParticipanteClick;

    $("#nomeParticipanteModal").html(nome);
    $("#modalDelParticipante").modal();
}

$(document).ready(function () {

    ($("#telefone").length) ? $("#telefone").mask('(99)99999-9999') : '';

    $("#deleteParticipante").click(function () {
        delParticipante(idParticipante);
    });

    $("#foto").change(function () {
        var image_holder = $("#preview");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image"
            }).appendTo(image_holder);
        };
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    });

    $("#btnCadParticipante").click(function () {
        var file_data = $("#foto").prop("files")[0];
        var form_data = new FormData();
        var nome = $("#nome").val();
        var telefone = $("#telefone").val();
        var validaNome, validaTelefone = false;

        if (nome == '' || nome == "Nome") {
            validateBootstrap('nome', "Você deve preencher o nome do Participante", 1);
            validaNome = false;
        } else {
            validateBootstrap('nome', "", 0);
            validaNome = true;
        }

        if (telefone == '' || telefone == "Telefone") {
            validateBootstrap('telefone', "Você deve preencher o telefone do Participante", 1);
            validaTelefone = false;
        } else {
            validateBootstrap('telefone', "", 0);
            validaTelefone = true;
        }

        if (validaNome && validaTelefone) {

            form_data.append("foto", file_data);
            form_data.append("nome", nome);
            form_data.append("telefone", telefone);
            form_data.append("opcao", 'cadastrar');

            $.ajax({
                url: "control/participantesController.php",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (r) {
                    if (confirm("cadastrado com sucesso! Deseja Cadastrar mais participantes?") === true) {
                        $("#nome").val('');
                        $("#telefone").val('');
                        $("#foto").val('');
                        $("#preview").html('');

                        $("#form-group-telefone").removeClass('has-success');
                        $("#form-group-nome").removeClass('has-success');
                    } else {
                        window.location = 'principal.php';
                    }
                }
            })
        }
    })


    $("#btnAltParticipante").click(function () {
        var file_data = $("#foto").prop("files")[0];
        var form_data = new FormData();
        var nome = $("#nome").val();
        var telefone = $("#telefone").val();
        var idParticipante = $("#idParticipante").val();
        var validaNome, validaTelefone = false;

        if (nome == '' || nome == "Nome") {
            validateBootstrap('nome', "Você deve preencher o nome do Participante", 1);
            validaNome = false;
        } else {
            validateBootstrap('nome', "", 0);
            validaNome = true;
        }

        if (telefone == '' || telefone == "Telefone") {
            validateBootstrap('telefone', "Você deve preencher o telefone do Participante", 1);
            validaTelefone = false;
        } else {
            validateBootstrap('telefone', "", 0);
            validaTelefone = true;
        }

        if (validaNome && validaTelefone) {

            form_data.append("foto", file_data);
            form_data.append("nome", nome);
            form_data.append("telefone", telefone);
            form_data.append("idParticipante", idParticipante);
            form_data.append("opcao", 'alterar');

            $.ajax({
                url: "control/participantesController.php",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (r) {
                    window.location = 'participantes.php';
                }
            })
        }
    })
});