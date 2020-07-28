<?php

include "scripts/database.php";

//Classe Base para Models
class BaseModel{
  protected $connection;

  function __construct(){
    $this->connection = openConnection();
  }

  function __destruct(){
    //fecha a conexão
    $this->connection = null;
  }
}