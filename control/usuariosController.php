<?php

@session_start();
require_once '../model/usuarios.php';

$opcao = filter_input(INPUT_POST, 'opcao');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');


switch ($opcao) {
    case 'cadastrar':
        if ($nome != '' && $email != '' && $senha != '') {
            $senha = md5($senha);
            $objUsuario = new Usuarios($nome, $email, $senha);


            $resposta = $objUsuario->cadUsuario();

            if ($resposta) {
                $mensagem['codigo'] = 1;
                $mensagem['mensagem'] = 'Cadastrado com sucesso!';
            } else {
                $mensagem['codigo'] = 0;
                $mensagem['mensagem'] = 'Erro ao cadastrar!';
            }
        } else {
            $mensagem['codigo'] = 0;
            $mensagem['mensagem'] = 'Todos os campos precisam ser preenchidos!';
        }

        echo $mensagem = json_encode($mensagem);
        break;

    case 'alterar':
        if ($nome != '' && $email != '') {
            $senha = filter_input(INPUT_POST, 'senha'); //campo de senha do formulário
            $senhaAtual = filter_input(INPUT_POST, 'senhaAtual'); //senha cadastrada no banco

            $senha = ( $senha != '') ? md5($senha) : $senhaAtual;
            $idUsuario = filter_input(INPUT_POST, 'idUsuario');

            $objUsuario = new Usuarios($nome, $email, $senha);
            $resposta = $objUsuario->altUsuario($idUsuario);

            if ($resposta) {
                $mensagem['codigo'] = 1;
                $mensagem['mensagem'] = 'Alterado com sucesso!';
            } else {
                $mensagem['codigo'] = 0;
                $mensagem['mensagem'] = 'Erro ao alterar!';
            }
        } else {
            $mensagem['codigo'] = 0;
            $mensagem['mensagem'] = 'Os campos NOME e EMAIL precisam ser preenchidos!';
        }

        echo $mensagem = json_encode($mensagem);
        break;

    case 'excluir':
        $idUsuario = filter_input(INPUT_POST, 'idUsuario');
        $objUsuario = new Usuarios();
        $objUsuario->delUsuario($idUsuario);
        break;

    case 'verificaLogin':
        $login = filter_input(INPUT_POST, 'login');
        $senha = md5(filter_input(INPUT_POST, 'senha'));

        $objUsuario = new Usuarios();

        $retorno = $objUsuario->verificaLogin($login, $senha);

        if ($retorno === false) {
            $mensagem['codigo'] = 0;
            $mensagem['mensagem'] = 'Usuário e senha não conferem!';
        } else {
            $_SESSION['idUsuario'] = $retorno['idUsuario'];
            $_SESSION['nome'] = $retorno['nome'];

            $mensagem['codigo'] = 1;
            $mensagem['mensagem'] = 'Logado com sucesso!';
        }

        echo json_encode($mensagem);
        break;

    case 'lembrarSenha':

        $email = filter_input(INPUT_POST, 'email');

        $objUsuario = new Usuarios();
        $validEmail = $objUsuario->verificaEmail($email);

        if ($validEmail === true) {
            require_once '../plugins/PHPMailer/PHPMailerAutoload.php';
            $senha = geraSenha(8,true,true,true);

            $objUsuario = new Usuarios();
            
            $objUsuario->trocaSenha($email, md5($senha));
            $mail = new PHPMailer();
//    $destinatario = "fernando@ojk.com.br";
            $destinatario = $email;

            $mail->IsSMTP(); // Define que a mensagem será SMTP
            $mail->Host = "aspecti.com.br"; // Endereço do servidor SMTP
            $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
            $mail->Username = 'paulo.sergio@aspecti.com.br'; // Usuário do servidor SMTP
            $mail->Password = 'Aspecti123#'; // Senha do servidor SMTP
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;


            $mail->From = 'naoresponda@ojk.com.br'; // Seu e-mail
            $mail->FromName = ''; // Seu nome
            $mail->Subject = "Loja Virtual O JK - Alteração de senha";
            $mail->Body = "Sua nova senha é: " . $senha . " \r\n :)";
            $mail->AltBody = "Sua nova senha é: " . $senha . " \r\n :)";


            $mail->AddAddress($destinatario, '');
            //$mail->AddAddress('ciclano@site.net');
            //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
            //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

            $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
            //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

            $enviado = $mail->Send();

            // Limpa os destinatários e os anexos
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();

            if ($enviado) {
                $resposta['mensagem'] = "E-mail enviado com sucesso!";
                $resposta['codigo'] = 1;
            } else {
                $resposta['mensagem'] = "Não foi possível enviar o e-mail. Informe este erro ao suporte: <b>" . $mail->ErrorInfo . "</b>";
                $resposta['codigo'] = 0;
            }
        } else {
            $resposta['mensagem'] = "Este email não se encontra em nossa base";
            $resposta['codigo'] = 0;
        }
        echo json_encode($resposta);

        break;
}

function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
    $lmin = 'abcdefghijklmnopqrstuvwxyz';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
    $simb = '!@#$%*-';
    $retorno = '';
    $caracteres = '';
    $caracteres .= $lmin;
    if ($maiusculas)
        $caracteres .= $lmai;
    if ($numeros)
        $caracteres .= $num;
    if ($simbolos)
        $caracteres .= $simb;
    $len = strlen($caracteres);
    for ($n = 1; $n <= $tamanho; $n++) {
        $rand = mt_rand(1, $len);
        $retorno .= $caracteres[$rand - 1];
    }
    return $retorno;
}
