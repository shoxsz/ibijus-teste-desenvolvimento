<?php 

//Classe auxiliar, valida os campos de um Local recebidos via POST
class LocalValidator{
  public function forRegistering(){
    $validation = new Validation($_POST);
    $validation->addField('nome', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 1, Validation::$MAX_SIZE => 100), array(Validation::$REQUIRED => "Insira um nome para a localidade", Validation::$MIN_SIZE => "Name muito curto", Validation::$MAX_SIZE => "Nome muito grande"));
    $validation->addField('cep', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 8, Validation::$MAX_SIZE => 8), array(Validation::$REQUIRED => "Favor informar o CEP para a consulta", Validation::$MIN_SIZE => "CEP inválido", Validation::$MAX_SIZE => "CEP inválido"));
    $validation->addField('logradouro', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 1, Validation::$MAX_SIZE => 150), array(Validation::$REQUIRED => "Insira o logradouro", Validation::$MIN_SIZE => "Logradouro muito curto", Validation::$MAX_SIZE => "Logradouro muito grande"));
    $validation->addField('complemento', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 1, Validation::$MAX_SIZE => 100), array(Validation::$REQUIRED => "Insira o complemento", Validation::$MIN_SIZE => "Complemento muito curto", Validation::$MAX_SIZE => "Complemento muito grande"));
    $validation->addField('numero', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 1, Validation::$MAX_SIZE => 6), array(Validation::$REQUIRED => "Insira o número", Validation::$MIN_SIZE => "Número muito curto", Validation::$MAX_SIZE => "Número muito grande"));
    $validation->addField('bairro', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 1, Validation::$MAX_SIZE => 100), array(Validation::$REQUIRED => "Insira o bairro", Validation::$MIN_SIZE => "Bairro muito curto", Validation::$MAX_SIZE => "Bairro muito grande"));
    $validation->addField('uf', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 1, Validation::$MAX_SIZE => 2), array(Validation::$REQUIRED => "Insira a UF", Validation::$MIN_SIZE => "UF muito curta", Validation::$MAX_SIZE => "UF muito grande"));
    $validation->addField('cidade', array(Validation::$REQUIRED => true, Validation::$MIN_SIZE => 1, Validation::$MAX_SIZE => 100), array(Validation::$REQUIRED => "Insira a UF", Validation::$MIN_SIZE => "Nome da cidade muito curto", Validation::$MAX_SIZE => "Nome da cidade muito grande"));
    $validation->addField('data', array(Validation::$REQUIRED => true, Validation::$DATE => true), array(Validation::$REQUIRED => "Insira a UF", Validation::$DATE => "Insira uma data válida"));
  
    if(!$validation->validate()){
      $errors = [];
      $validation->pushErrors($errors);
      return [false, $errors[0]];
    }
    
    return [true, null];
  }
}