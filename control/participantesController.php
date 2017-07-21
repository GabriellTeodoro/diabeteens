<?php

date_default_timezone_set("America/Sao_Paulo");

require_once '../model/participantes.php';

$opcao = filter_input(INPUT_POST, 'opcao');
$objParticipante = new participante();
$objParticipanteDao = new ParticipantesDAO();

switch ($opcao) {
    case 'excluir':
        $idParticipante = filter_input(INPUT_POST, 'idUsuario');

        $objParticipante->setIdParticipante($idParticipante);

        $objParticipanteDao->delParticipante($objParticipante);
        break;

    case 'cadastrar':
        $nome = filter_input(INPUT_POST, 'nome');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $dataCadastro = date("Y-m-d");
        $foto = ($_FILES['foto'] != null) ? $_FILES['foto'] : null;

        $objParticipante->setNome($nome);
        $objParticipante->setTelefone($telefone);
        $objParticipante->setDataCadastro($dataCadastro);

        echo $idParticipante = $objParticipanteDao->cadParticipante($objParticipante);

        if (!empty($foto) || $foto != null) {
            uploadImagem($foto, $idParticipante);
        }
        break;
        
    case 'alterar':
        $nome = filter_input(INPUT_POST, 'nome');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $idParticipante = filter_input(INPUT_POST, 'idParticipante');
        $foto = ($_FILES['foto'] != null) ? $_FILES['foto'] : null;

        $objParticipante->setNome($nome);
        $objParticipante->setTelefone($telefone);
        $objParticipante->setIdParticipante($idParticipante);

        $objParticipanteDao->altParticipante($objParticipante);

        if (!empty($foto) || $foto != null) {
            uploadImagem($foto, $idParticipante);
        }
        break;
}

function uploadImagem($arquivo, $idParticipante) {
//    $tipoArquivo = pathinfo($arquivo['name']);
//    $tipoArquivo = '.' . $tipoArquivo['extension'];
    $tipoArquivo = '.jpg';
    $novaImagem = $idParticipante . $tipoArquivo;

    $pasta = '../img/participantes/';
    if (!file_exists($pasta)) {
        mkdir($pasta);
    }

    $caminhoArquivo = $pasta . $novaImagem;
    if(file_exists($caminhoArquivo)){
        unlink($caminhoArquivo);
    }
    
    move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo);
    return $caminhoArquivo;
}
