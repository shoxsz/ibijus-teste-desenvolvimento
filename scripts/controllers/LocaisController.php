<?php

require_once "scripts/controllers/BaseController.php";

require_once "scripts/helpers/DateFormater.php";

class LocaisController extends BaseController{
  public function __construct(){
    parent::__construct();
    
    $this->setDefaultHeader("header");
    $this->setDefaultFooter("footer");
  }

  public function index(){
    $locais = $this->loadModel("Locais");

    $allLocais = $locais->listAll();

    $this->loadView("header");
    $this->loadView("index", array("locais" => $allLocais));
    $this->loadView("footer");
  }

  public function novoLocal(){
    $this->loadView("local-form");
  }
  
  public function editarLocal(){
    if(!isset($_GET["id"])){
      header("Location: /ibijus/");
      return;
    }

    $locais = $this->loadModel("Locais");
    $local = $locais->load($_GET["id"]);

    if($local){
      //format date
      $local->data = DateFormater::FromMySQL($local->data);

      $this->loadView("local-form", array("local" => $local));
    }else{
      header("Location: /ibijus/");
    }
  }
}