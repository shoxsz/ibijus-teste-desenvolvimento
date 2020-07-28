<?php

include "scripts/controllers/LocaisController.php";
include "scripts/controllers/RestController.php";

function restRouting($rest, $routes){
  $routes->get("/ibijus/fetch-cep", function()use($rest){
    $rest->fetchCEP();
  });

  $routes->post("/ibijus/cadastrar-novo-local", function()use($rest){
    $rest->cadastrarNovoLocal();
  });

  $routes->post("/ibijus/atualizar-local", function()use($rest){
    $rest->editarLocal();
  });

  $routes->post("/ibijus/deletar-local", function()use($rest){
    $rest->deletarLocal();
  });
}

function pageRouting($locais, $routes){
  $routes->get("/ibijus/novo-local", function()use($locais){
    $locais->novoLocal();
  });

  $routes->get("/ibijus/editar-local", function()use($locais){
    $locais->editarLocal();
  });

  $routes->get("/ibijus/", function()use($locais){
    $locais->index();
  });
}

function buildRoutes($routes){
  $locais = new LocaisController();
  $rest = new RestController();

  restRouting($rest, $routes);
  pageRouting($locais, $routes);
}