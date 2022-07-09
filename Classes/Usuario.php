<?php

Class Usuario{
    private $idUser;
    private $Usuario;
    private $Email;
    private $Senha;
    private $idNivel;

    //GET
    public function getIdUser(){
        return $this->idUser;
    }
    public function getUsuario(){
        return $this->Usuario;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getSenha(){
        return $this->Senha;
    }
    public function getIdNivel(){
        return $this->idNivel;
    }
    //SET
    public function setIdUser($id){
        $this->idUser = $id;
    }
    public function setUsuario($Usuario){
        $this->Usuario = $Usuario;
    }
    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function setSenha($Senha){
        $this->Senha = $Senha;
    }
    public function setIdNivel($id){
        $this->idNivel = $id;
    }

    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into tbusuario (Usuario, Email, Senha, idNivel)
                        values (".$conexao->quote($this->getUsuario()).",
                        ".$conexao->quote($this->getEmail()).",
                        ".$conexao->quote($this->getSenha()).",
                        ".$conexao->quote($this->getIdNivel())."
                    );";
                        
        $conexao->exec($queryInsert);
        return 'true';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idUser, 
        Usuario, Email, Senha, idNivel from tbusuario";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public static function get($id){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idUser, 
        Usuario, Email, Senha, idNivel from tbusuario WHERE idUser = ".((int)$id);
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        return $lista;   
    }

    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idUser, Usuario, Email, Senha, idNivel from tbusuario
                        where Usuario like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public function listarUsuario($usuario){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idUser, Usuario, Email, Senha, idNivel from tbUsuario
                        where idUser = ".$usuario->getIdUser();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $usuario->setIdUser($linha['idUser']);
            $usuario->setUsuario($linha['Usuario']);
            $usuario->setEmail($linha['Email']);
            $usuario->setSenha($linha['Senha']);
            $usuario->setIdNivel($linha['idNivel']);

        }
        return $usuario;   
    }

    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update tbusuario
                        set Usuario = '".$this->getUsuario()."'
                        ,Email = '".$this->getEmail()."'
                        ,Senha = '".$this->getSenha()."'
                        ,idNivel = '".$this->getIdNivel()."'
                         where idUser = ".$this->getIdUser();
        $conexao->exec($queryUpdate);
        return 'true';
    }
    public function excluir(){
        try {
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "delete from tbusuario
                            where idUser = ".$this->getIdUser();
            $conexao->exec($queryUpdate);
            return 'true';
        } catch (Exception $e) {
            return 'false';
        }
    }

    public function login(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idUser, 
        Usuario, Email, Senha, idNivel from tbusuario WHERE Usuario LIKE ".($conexao->quote($this->getUsuario()))." AND Senha = ".($conexao->quote($this->getSenha()))." LIMIT 1";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        if($lista) {
            $this->setidUser($lista["idUser"]);
            $this->setUsuario($lista["Usuario"]);
            $this->setEmail($lista["Email"]);
            $this->setSenha($lista["Senha"]);
            $this->setIdNivel($lista["idNivel"]);
            return true;
        }
        return false;
    }
}
?>