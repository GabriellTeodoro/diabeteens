<?php

include_once 'bean/glicemia.php';
require_once 'Banco.php';

class GlicoseDAO extends Banco {

    public function rankingDia(glicemia $objGlicose){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("SELECT p.idParticipante, p.nome,
                                ROUND(SUM( g.glicemia /3 ),1) AS media,
                                COUNT( CASE WHEN g.data = ? THEN g.idGlicemia ELSE NULL END) AS num
                                    FROM participantes p
                                    JOIN glicemias g ON p.idParticipante = g.idParticipante
                                        GROUP BY p.idParticipante, g.data
                                        HAVING num = 3
                                        ORDER BY media");
        
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