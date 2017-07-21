<?php
class glicemia {
    private $idGlicemia;
    private $idParticipante;
    private $glicemia;
    private $data;
    private $dataCadastro;
    
    
    public function getIdGlicemia() {
        return $this->idGlicemia;
    }

    public function getIdParticipante() {
        return $this->idParticipante;
    }
    
    public function getGlicemia() {
        return $this->glicemia;
    }

    public function getData() {
        return $this->data;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setIdGlicemia($idGlicemia) {
        $this->idGlicemia = $idGlicemia;
    }

    public function setIdParticipante($idParticipante) {
        $this->idParticipante = $idParticipante;
    }
    
    public function setGlicemia($glicemia) {
        $this->glicemia = $glicemia;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
}
