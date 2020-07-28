<?php

include "scripts/database.php";

class BaseModel{
  protected $connection;

  function __construct(){
    $this->connection = openConnection();
  }

  function __destruct(){
    $this->connection = null;
  }
}