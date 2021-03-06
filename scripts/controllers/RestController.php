<?php

require_once "scripts/controllers/BaseController.php";
require_once "scripts/controllers/LocalValidator.php";
require_once "scripts/helpers/Validation.php";
require_once "scripts/helpers/DateFormater.php";

use Jarouche\ViaCEP\HelperViaCep;

//Esse controller recebe requisições REST
class RestController extends BaseController{
  public function fetchCEP(){
    try{
      if(!isset($_GET["cep"])){
        echo json_encode(array("error" => "Informe o CEP para ser pesquisado"));
        return;
      }

      $data = HelperViaCep::getBuscaViaCEP("JSON", $_GET["cep"]);

      if(isset($data["result"]["erro"])){
        echo json_encode(array("error" => "Falha ao pesquisar o CEP informado"));
      }else{
        echo json_encode($data);
      }
    }catch(Exception $ex){
      echo json_encode(array("error" => "Falha ao pesquisar o CEP informado"));
    }
  }

  public function cadastrarNovoLocal(){
    $this->setLocal();
  }

  public function editarLocal(){
    if(!isset($_POST["id"])){
      echo json_encode(array("error" => "Informe o local para ser deletado!"));
      return;
    }
    $this->setLocal();
  }

  private function setLocal(){
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
    $id = $locais->setLocal($_POST);
    if(!$id){
      echo json_encode(array("error" => "Oops, ocorreu um erro, por favor tente novamente mais tarde."));
    }else{
      echo json_encode(array("success" => $id));
    }
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