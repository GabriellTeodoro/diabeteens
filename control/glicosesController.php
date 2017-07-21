<?php
date_default_timezone_set("America/Sao_Paulo");
require_once '../model/glicoses.php';

$opcao = filter_input(INPUT_POST, 'opcao');
$model = new GlicoseDAO();
$objGlicose = new glicemia();


switch ($opcao) {
    case 'atualizaCampos':
        $data = filter_input(INPUT_POST, 'data');
        $idParticipante = filter_input(INPUT_POST, 'idParticipante');

        $objGlicose->setData($data);
        $objGlicose->setIdParticipante($idParticipante);
        
       echo $retorno = json_encode($model->listaCampos($objGlicose));

        break;
    
    
    case 'cadGlicemia':
        $glicose = filter_input(INPUT_POST, 'glicose');
        $data = filter_input(INPUT_POST, 'data');
        $idParticipante = filter_input(INPUT_POST, 'idParticipante');
        $dataCadastro = date('Y-m-d H:i:s');
        
        $objGlicose->setIdParticipante($idParticipante);
        $objGlicose->setData($data);
        $objGlicose->setDataCadastro($dataCadastro);
        $objGlicose->setGlicemia($glicose);
        
       echo $model->cadGlicemia($objGlicose);
        break;
    
    case 'altGlicemia':
        $glicose = filter_input(INPUT_POST, 'glicose');
        $idGlicemia = filter_input(INPUT_POST, 'idGlicemia');
        
        $objGlicose->setIdGlicemia($idGlicemia);
        $objGlicose->setGlicemia($glicose);
        
        echo $model->altGlicemia($objGlicose);
        break;
}