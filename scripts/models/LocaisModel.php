<?php

include "BaseModel.php";

class LocaisModel extends BaseModel{
  public function listAll(){
    $statement = $this->connection->query("select * from Locais;");
    $locais = [];

    while($local = $statement->fetch(PDO::FETCH_OBJ)){
      $locais[] = $local;
    }

    return $locais;
  }

  public function load($id){
    $statement = $this->connection->prepare("select * from Locais where id = :id");
    $statement->bindParam(":id", $id);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_OBJ);
  }

  //cria ou edita um local
  public function setLocal($data){
    $updating = isset($data["id"]);

    if($updating){
      $statement = $this->connection->prepare("update Locais set nome = :nome, cep = :cep, logradouro = :logradouro, complemento = :complemento, numero = :numero, bairro = :bairro, uf = :uf, cidade = :cidade, data = :data where id = :id;");
      $statement->bindParam(':id', $data["id"]);
    }else{
      $statement = $this->connection->prepare("insert into Locais(nome, cep, logradouro, complemento, numero, bairro, uf, cidade, data) values(:nome, :cep, :logradouro, :complemento, :numero, :bairro, :uf, :cidade, :data);");
    }

    $statement->bindParam(':nome', $data["nome"]);
    $statement->bindParam(':cep', $data["cep"]);
    $statement->bindParam(':logradouro', $data["logradouro"]);
    $statement->bindParam(':complemento', $data["complemento"]);
    $statement->bindParam(':numero', $data["numero"]);
    $statement->bindParam(':bairro', $data["bairro"]);
    $statement->bindParam(':uf', $data["uf"]);
    $statement->bindParam(':cidade', $data["cidade"]);
    $statement->bindParam(':data', $data["data"]);

    if(!$statement->execute()){
      return false;
    }

    if($updating){
      return $data["id"];
    }else{
      return $this->connection->lastInsertId();
    }
  }

  public function delete($id){
    $statement = $this->connection->prepare("delete from Locais where id = :id");
    $statement->bindParam(":id", $id);
    return $statement->execute();
  }
};