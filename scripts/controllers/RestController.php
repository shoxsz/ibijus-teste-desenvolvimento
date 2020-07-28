<?php

require_once "scripts/controllers/BaseController.php";
require_once "scripts/controllers/LocalValidator.php";
require_once "scripts/helpers/Validation.php";
require_once "scripts/helpers/DateFormater.php";

use Jarouche\ViaCEP\HelperViaCep;

class RestController extends BaseController{
  public function fetchCEP($cep){
    try{
      $data = HelperViaCep::getBuscaViaCEP("JSON", $cep);
      echo json_encode($data);
    }catch(Exception $ex){
      echo json_encode(array("error" => "Falha ao processar o CEP informado"));
    }
  }

  public function cadastrarNovoLocal(){
    //validate data
    $validator = new LocalValidator();
    [$valid, $error] = $validator->forRegistering();
    if(!$valid){
      echo json_encode(array("error" => $error));
      return;
    }

    //format date
    $_POST["data"] = DateFormater::ToMySQL($_POST["data"]);

    //store data
    $locais = $this->loadModel("locais");
    if(!$locais->register($_POST)){
      echo json_encode(array("error" => "Oops, ocorreu um erro, por favor tente novamente mais tarde."));
      return;
    }

    echo json_encode(array("success" => true));
  }

  public function editarLocal(){
    if(!isset($_POST["id"])){
      echo json_encode(array("error" => "Informe o local para ser deletado!"));
      return;
    }

    //validate data
    $validator = new LocalValidator();
    [$valid, $error] = $validator->forRegistering();
    if(!$valid){
      echo json_encode(array("error" => $error));
      return;
    }

    //format date
    $_POST["data"] = DateFormater::ToMySQL($_POST["data"]);

    //store data
    $locais = $this->loadModel("locais");
    if(!$locais->update($_POST)){
      echo json_encode(array("error" => "Oops, ocorreu um erro, por favor tente novamente mais tarde."));
      return;
    }

    echo json_encode(array("success" => true));
  }

  public function deletarLocal(){
    if(!isset($_POST["id"])){
      echo json_encode(array("error" => "Informe o local para ser deletado!"));
      return;
    }

    $locais = $this->loadModel("locais");
    if(!$locais->delete($_POST["id"])){
      echo json_encode(array("error" => "Oops, ocorreu um erro, por favor tente novamente mais tarde."));
      return;
    }

    echo json_encode(array("success" => true));
  }
};