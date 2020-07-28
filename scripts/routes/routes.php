<?php

//Classe que faz o roteamento das requisições
//É uma classe simples, não suporta regex nas rotas
class Routes{
  private $postRoutes;
  private $getRoutes;

  public function post($urls, $callback){
    $this->configRoute($this->postRoutes, $urls, $callback);
  }

  public function get($urls, $callback){
    $this->configRoute($this->getRoutes, $urls, $callback);
  }
  
  private function configRoute(&$array, $urls, $callback){
    if(is_array($urls)){
      $array[] = array("routes" => $urls, "callback" => $callback);
    }else{
      $array[$urls] = $callback;
    }
  }

  public function route(){
    $URI_DATA = explode('?', $_SERVER["REQUEST_URI"]);
    $routesArray = $_SERVER["REQUEST_METHOD"] == "POST" ? $this->postRoutes : $this->getRoutes;

    $request_url = $URI_DATA[0];

    $found = false;
    foreach($routesArray as $key => $data){
      if(is_array($data)){
        foreach($data["routes"] as $route){
          if(substr($request_url, 0, strlen($route)) === $route){
            $this->executeRoute($data["callback"]);
            $found = true;
            break;
          }
        }
      }else if(substr($request_url, 0, strlen($key)) === $key){
        $this->executeRoute($data);
        $found = true;
        break;
      }

      if($found){
        break;
      }
    }
  }

  private function executeRoute($routeCallback){
    try{
      call_user_func_array($routeCallback, []);
    }catch(Exception $ex){
      echo "An exception ocurred while processing the request<br/>";
      echo $ex->getTraceAsString();
    } 
  }
}