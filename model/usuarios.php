<?php

date_default_timezone_set('America/Sao_Paulo');
require_once 'Banco.php';

class Usuarios extends Banco {

    private $idUsuario;
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome = NULL, $email = NULL, $senha = NULL) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function cadUsuario() {
        $conexao = parent::conecta();
        $dataCadastro = date('Y-m-d H:i:s');

        $sql = $conexao->prepare("INSERT INTO ".TBL_USUARIOS." (nome, email, senha, dataCadastro) VALUES (?,?,?,?)");

        $sql->bind_param("ssss", $this->nome, $this->email, $this->senha, $dataCadastro);

        if ($sql->execute()) {
            $retorno = true;
        } else {
            $retorno = false;
        }

        $sql->close();


        return $retorno;
        parent::desconecta();
    }

    public function altUsuario($idUsuario) {
        $conexao = parent::conecta();

        $sql = $conexao->prepare("UPDATE ".TBL_USUARIOS."
                                SET
                                nome = ?,
                                email = ?,
                                senha = ?
                                    WHERE idUsuario = ?
                                ");

        $sql->bind_param("ssss", $this->nome, $this->email, $this->senha, $idUsuario);

        if ($sql->execute()) {
            $retorno = true;
        } else {
            $retorno = false;
        }

        $sql->close();

        return $retorno;

        parent::desconecta();
    }

    public function delUsuario($idUsuario) {
        $conexao = parent::conecta();

        $sql = $conexao->prepare("DELETE FROM ".TBL_USUARIOS." WHERE idUsuario = ?");

        $sql->bind_param("s", $idUsuario);

        $sql->execute();

        $sql->close();

        parent::desconecta();
    }

    public function listaUsuarios() {
        $conexao = parent::conecta();

        $sql = "SELECT * FROM ".TBL_USUARIOS."";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        parent::desconecta();
    }

    public function listar1($idUsuario) {
        $conexao = parent::conecta();

        $sql = $conexao->prepare("SELECT idUsuario, nome, email, senha FROM ".TBL_USUARIOS." WHERE idUsuario = ?");
        $sql->bind_param('s', $idUsuario);

        $sql->execute();
        $sql->bind_result($idUsuario, $nome, $email, $senha);
        $sql->fetch();

        $linha = array('idUsuario' => $idUsuario, 'nome' => $nome, 'email' => $email, 'senha' => $senha);
        return $linha;


        parent::desconecta();
    }

    public function verificaLogin($login, $senha) {
        $conexao = parent::conecta();

        $sql = $conexao->prepare("SELECT idUsuario, nome FROM ".TBL_USUARIOS." WHERE email = ? AND senha = ?");

        $sql->bind_param('ss', $login, $senha);
        $sql->execute();
        $sql->bind_result($idUsuario, $nome);
        $sql->fetch();

        if ($idUsuario !== NULL) {
            $linha = array('idUsuario' => $idUsuario, 'nome' => $nome);
        } else {
            $linha = false;
        }

        $sql->close();

        return $linha;

        parent::desconecta();
    }

    public function verificaEmail($email) {
        $conexao = parent::conecta();

        $sql = $conexao->prepare("SELECT idUsuario, nome FROM ".TBL_USUARIOS." WHERE email = ?") or die($conexao->error);

        $sql->bind_param('s', $email);
        $sql->execute();
        $sql->bind_result($idUsuario, $nome);
        $sql->fetch();

        if ($idUsuario !== NULL) {
            $resposta = true;
        } else {
            $resposta = false;
        }

        $sql->close();

        return $resposta;

        parent::desconecta();
    }

    public function trocaSenha($email, $senha) {
        $conexao = parent::conecta();

        $sql = $conexao->prepare("UPDATE ".TBL_USUARIOS."
                                SET
                                senha = ?
                                    WHERE email = ?");


        $sql->bind_param("ss", $senha, $email);

        $sql->execute();

        $sql->close();

        parent::desconecta();
    }

}
