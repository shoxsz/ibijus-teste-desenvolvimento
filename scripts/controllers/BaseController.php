<?php

class BaseController{
  private $defaultHeader = null;
  private $defaultFooter = null;

  public function __construct(){}

  public function setDefaultHeader($defaultHeader){
    $this->defaultHeader = $defaultHeader;
  }

  public function setDefaultFooter($defaultFooter){
    $this->defaultFooter = $defaultFooter;
  }

  protected function loadView($view, $data = null){
    if($data){
      extract($data);
    }
    if($this->defaultHeader){
      include("scripts/views/$this->defaultHeader.php");  
    }
    include("scripts/views/$view.php");
    if($this->defaultFooter){
      include("scripts/views/$this->defaultFooter.php");  
    }
  }

  protected function loadModel($model){
    $ModelClass = $this->getModelClassName($model);
    require_once("scripts/models/$ModelClass.php");
    return new $ModelClass;
  }

  private function getModelClassName($model){
    return ucfirst($model . "Model");
  }
};