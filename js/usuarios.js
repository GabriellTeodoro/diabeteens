function delUsuario(idUsuario, dt) {
    $.post('control/usuariosController.php', {opcao: 'excluir', idUsuario: idUsuario},
    function (r) {

        var posicao = dt.fnGetPosition($("#linha" + idUsuario)[0]);
        dt.fnDeleteRow(posicao)

        $("#modalDelUsuario").modal('hide');
    })
}

function btnEsqueceuSenha() {
    var email = $("#emailLembrarSenha").val();
//    console.log(email);

    if (email == '' || email == 'Email') {
        validateBootstrap('emailLembrarSenha', 'Você deve preencher um email!', 1);
    } else if (!IsEmail(email)) {
        validateBootstrap('emailLembrarSenha', 'Você deve preencher um email válido!', 1);
    } else {

        $.post('control/usuariosController.php', {opcao: 'lembrarSenha', email: email},
        function (r) {
            console.log(r);
            var resposta = JSON.parse(r);
            var erro;
            
            if (resposta.codigo == 1) {
                erro = 0;
            } else {
                erro = 1;
            }
            validateBootstrap('emailLembrarSenha', resposta.mensagem, erro);
        });
    }
}

$(document).ready(function () {
    idUsuario = 0;

    if ($("#listaUsuarios").length > 0) {
        datatable = $("#listaUsuarios").dataTable();
    }

    $("#btnCadUsuario").click(function () {
        var nome = $("#nomeUsuario").val();
        var email = $("#emailUsuario").val();
        var senha = $("#senhaUsuario").val();
        var validaNome, validaEmail, validaSenha = false;

        if (nome == '' || nome == 'Nome') {
            validateBootstrap('nomeUsuario', 'Você deve preencher o nome do usuário!', 1);
            validaNome = false;
        } else {
            validateBootstrap('nomeUsuario', '', 0);
            validaNome = true;
        }

        if (email == '' || email == 'Email') {
            validateBootstrap('emailUsuario', 'Você deve preencher o email do usuário!', 1);
            validaEmail = false;
        } else if (!IsEmail(email)) {
            validateBootstrap('emailUsuario', 'Você deve preencher um email válido!', 1);
            validaEmail = false;
        } else {
            validateBootstrap('emailUsuario', '', 0);
            validaEmail = true;
        }

        if (senha == '' || senha == 'Senha') {
            validateBootstrap('senhaUsuario', 'Você deve preencher a senha do usuário!', 1);
            validaSenha = false;
        } else {
            validateBootstrap('senhaUsuario', '', 0);
            validaSenha = true;
        }
        if (validaNome && validaEmail && validaSenha) {
            $.post('control/usuariosController.php', {nome: nome, email: email, senha: senha, opcao: 'cadastrar'},
            function (r) {
                var resposta = JSON.parse(r);
                alert(resposta.mensagem);

                if (resposta.codigo != 0) {
                    window.location = 'usuarios.php';
                }
            });
        }
    });

    $("#btnAltUsuario").click(function () {
        var nome = $("#nomeUsuario").val();
        var email = $("#emailUsuario").val();
        var senha = $("#senhaUsuario").val();
        var senhaAtual = $("#senhaAtualUsuario").val();
        var idUsuario = $("#idUsuario").val();
        var validaNome, validaEmail = false;

        if (nome == '' || nome == 'Nome') {
            validateBootstrap('nomeUsuario', 'Você deve preencher o nome do usuário!', 1);
            validaNome = false;
        } else {
            validateBootstrap('nomeUsuario', '', 0);
            validaNome = true;
        }

        if (email == '' || email == 'Email') {
            validateBootstrap('emailUsuario', 'Você deve preencher o email do usuário!', 1);
            validaEmail = false;
        } else if (!IsEmail(email)) {
            validateBootstrap('emailUsuario', 'Você deve preencher um email válido!', 1);
            validaEmail = false;
        } else {
            validateBootstrap('emailUsuario', '', 0);
            validaEmail = true;
        }

        if (validaNome && validaEmail) {
            $.post('control/usuariosController.php', {nome: nome, email: email, senha: senha, senhaAtual: senhaAtual, idUsuario: idUsuario, opcao: 'alterar'},
            function (r) {
                console.log(r);
                var resposta = JSON.parse(r);
                alert(resposta.mensagem);

                if (resposta.codigo != 0) {
                    window.location = 'usuarios.php';
                }
            });
        }
    });

    $("a[name='delUsuario']").click(function () {
        var nome = $(this).attr('data-name');
        var idUsuarioClick = $(this).attr('data-id');

        idUsuario = idUsuarioClick;

        console.log(nome);

        $("#nomeUsuarioModal").html(nome);

        $("#modalDelUsuario").modal();
    });

    $("#deleteUsuario").click(function () {
        delUsuario(idUsuario, datatable);
    });

    $("#btnLoginIndex").click(function () {
        var login = $("#emailLogin").val();
        var senha = $("#senhaLogin").val();
        var validaEmail, validaSenha = false;

        if (login == '') {
            validateBootstrap('emailLogin', 'Você deve preencher o email!', 1);
            validaEmail = false;
        } else if (!IsEmail(login)) {
            validateBootstrap('emailLogin', 'Você deve preencher um email válido!', 1);
            validaEmail = false;
        } else {
            validateBootstrap('emailLogin', '', 0);
            validaEmail = true;
        }

        if (senha == "") {
            validateBootstrap('senhaLogin', 'Você deve preencher a senha!', 1);
            validaSenha = false;
        } else {
            validateBootstrap('senhaLogin', '', 0);
            validaSenha = true;
        }

        if (validaEmail && validaSenha) {
            $.post('control/usuariosController.php', {login: login, senha: senha, opcao: 'verificaLogin'},
            function (r) {
                console.log(r);
                var resposta = JSON.parse(r);

                if (resposta.codigo == '0') {
                    validateBootstrap('senhaLogin', resposta.mensagem, 1);
                } else {
                    window.location = 'principal.php';
                }
            });
        }
    });

});