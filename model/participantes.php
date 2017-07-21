<?php
require_once 'Banco.php';
require_once 'bean/participante.php';

class ParticipantesDAO extends Banco {
    public function cadParticipante(Participante $objParticipante){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("INSERT INTO ".TBL_PARTICIPANTES." SET
                nome = ?,
                telefone = ?,
                dataCadastro = ?
               ");
        
        
        $sql->bind_param('sss', $objParticipante->getNome(), $objParticipante->getTelefone(), $objParticipante->getDataCadastro());
        
        if ($sql->execute()) {
            $retorno = $sql->insert_id;
        } else {
            $retorno = $sql->error;
        }
        
        $sql->close();
        
        return $retorno;
        
        parent::desconecta();
    }
    
    public function altParticipante(participante $objParticipante){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("UPDATE ".TBL_PARTICIPANTES." SET
                nome = ?,
                telefone = ?
                    WHERE idParticipante = ?
               ");
        
        
        $sql->bind_param('ssi', $objParticipante->getNome(), $objParticipante->getTelefone(), $objParticipante->getIdParticipante());
        
        if ($sql->execute()) {
            $retorno = true;
        } else {
            $retorno = $sql->error;
        }

        $sql->close();
        
        return $retorno;
        
        parent::desconecta();
    }
    
    public function listaTodos(){
        $conexao = parent::conecta();
        
        $sql = "SELECT * FROM ".TBL_PARTICIPANTES."";
        
        $banco = $conexao->query($sql);
        
        $linhas = Array();
        
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        parent::desconecta();
    }
    
    public function listaUm(participante $objParticipante){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("SELECT nome, telefone FROM ".TBL_PARTICIPANTES." WHERE idParticipante = ?");
        $sql->bind_param("i", $objParticipante->getIdParticipante());
        $sql->execute();
        $sql->bind_result($nome, $telefone);
        $sql->fetch();

        if ($nome == null) {
            $verificacaoNulo = false;
        } else {
            $verificacaoNulo = array("nome" => $nome, "telefone" => $telefone);
        }
        
        return $verificacaoNulo;
        
        parent::desconecta();
    }
    
    public function delParticipante(participante $objParticipante){
        $conexao = parent::conecta();
        
        $sql = $conexao->prepare("DELETE FROM ".TBL_PARTICIPANTES." WHERE idParticipante = ?");

        $sql->bind_param("i", $objParticipante->getIdParticipante());

        $sql->execute();

        $sql->close();
        
        parent::desconecta();
    }
}
