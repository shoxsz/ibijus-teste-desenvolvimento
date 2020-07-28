<?php

include "scripts/database.php";

//Classe Base para Models
class BaseModel{
  protected $connection;

  function __construct(){
    $this->connection = openConnection();

    if($this->connection == null){
      throw new Exception("Database connection could not be stablished, check your credentials or database server!");
    }
  }

  function __destruct(){
    //fecha a conexão
    $this->connection = null;
  }
}