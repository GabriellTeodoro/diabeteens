<?php
class participante {
    private $idParticipante;
    private $nome;
    private $telefone;
    private $dataCadastro;
    
    public function getIdParticipante() {
        return $this->idParticipante;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setIdParticipante($idParticipante) {
        $this->idParticipante = $idParticipante;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
}
