<?php

Class Nivel{
    private $idNivel;
    private $Nivel;
    
    //GET
    public function getIdNivel(){
        return $this->idNivel;
    }
    public function getNivel(){
        return $this->Nivel;
    }
    //SET
    public function setIdNivel($id){
        $this->idNivel = $id;
    }
    public function setNivel($Nivel){
        $this->Nivel = $Nivel;
    }

    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into tbnivelacesso (Nivel)
                        values (".$conexao->quote($this->getNivel()).");";
                        
        $conexao->exec($queryInsert);
        return 'true';
    }
    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idNivel, 
        Nivel from tbnivelacesso";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idNivel, Nivel from tdnivelacesso
                        where Nivel like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarNivel($nivel){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idNivel, Nivel from tdnivelacesso
                        where idNivel = ".$nivel->getIdNivel();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $nivel->setIdNivel($linha['idNivel']);
            $nivel->setNivel($linha['Nivel']);
        }
        return $nivel;   
    }
    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update tbnivelacesso
                        set Nivel = '".$this->getNivel()."'
                        where idNivel = ".$this->getIdNivel();
        $conexao->exec($queryUpdate);
        return 'true';
    }
    public function excluir(){
        try {
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "delete from tbnivelacesso
                            where idNivel = ".$this->getIdNivel();
            $conexao->exec($queryUpdate);
            return 'true';
        } catch (Exception $e) {
            return 'false';
        }
    }
    public static function get($id){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idNivel, 
        Nivel from tbnivelacesso WHERE idNivel = ".((int)$id);
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        return $lista;   
    }
}

?>