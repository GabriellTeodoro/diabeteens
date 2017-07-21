<?php

include_once 'bean/glicemia.php';
require_once 'Banco.php';

class GlicoseDAO extends Banco {

    public function listaPrincipal() {
        $conexao = parent::conecta();

        $sql = "SELECT p.idParticipante, p.nome,
                COUNT( CASE WHEN g.data = CURDATE() THEN g.idGlicemia ELSE NULL END) AS glicoses,
                COUNT( DISTINCT g.data) AS dias
                        FROM " . TBL_PARTICIPANTES . " p
                        LEFT JOIN " . TBL_GLICEMIAS . " g ON p.idParticipante = g.idParticipante
                            GROUP BY p.idParticipante
                            ORDER BY p.nome
                ";


        $banco = $conexao->query($sql);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        parent::desconecta();
    }

    public function listaCampos(glicemia $objGlicose) {
        $conexao = parent::conecta();

        $sql = $conexao->prepare("SELECT idGlicemia, glicemia FROM " . TBL_GLICEMIAS . " WHERE idParticipante = ? AND data = ?");
        $sql->bind_param("is", $objGlicose->getIdParticipante(), $objGlicose->getData());
        $sql->execute();
        $result = $sql->get_result();
        
        $lista = array();
        while ($item = $result->fetch_assoc()) {
            $lista[] = $item;
        }
        return $lista;

        parent::desconecta();
    }
    
    public function cadGlicemia(glicemia $objGlicemia){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("INSERT INTO ".TBL_GLICEMIAS." SET
               idParticipante = ?,
               glicemia = ?,
               data = ?,
               dataCadastro = ?
               ");
        
        $sql->bind_param('iiss', $objGlicemia->getIdParticipante(), $objGlicemia->getGlicemia(), $objGlicemia->getData(), $objGlicemia->getDataCadastro());
        
        if ($sql->execute()) {
            $retorno = $sql->insert_id;
        } else {
            $retorno = $sql->error;
        }

        $sql->close();
        
        return $retorno;
        
        parent::desconecta();
    }
    
    public function altGlicemia(glicemia $objGlicemia){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("UPDATE ".TBL_GLICEMIAS." SET
               glicemia = ?
                   WHERE idGlicemia = ?
               ");
        
        $sql->bind_param('ii', $objGlicemia->getGlicemia(), $objGlicemia->getIdGlicemia());
        
        if ($sql->execute()) {
            $retorno = $objGlicemia->getIdGlicemia();
        } else {
            $retorno = $sql->error;
        }

        $sql->close();
        
        return $retorno;
        
        parent::desconecta();
    }
    
    public function rankingDia(glicemia $objGlicose){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("SELECT p.idParticipante, p.nome,
                ROUND(SUM( g.glicemia /3 ),1) AS media,
                COUNT( CASE WHEN g.data = ? THEN g.idGlicemia ELSE NULL END) AS num
                    FROM participantes p
                    JOIN glicemias g ON p.idParticipante = g.idParticipante
                        GROUP BY p.idParticipante, g.data
                        HAVING num = 3
                        ORDER BY media
");
        
        $sql->bind_param("s", $objGlicose->getData());
        $sql->execute();
        $result = $sql->get_result();
        
        $lista = array();
        while ($item = $result->fetch_assoc()) {
            $lista[] = $item;
        }
        return $lista;
        
        parent::desconecta();
    }
    
    

}