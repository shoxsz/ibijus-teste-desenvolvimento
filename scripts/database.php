<?php

function openConnection(){
  try{
    return new PDO('mysql:host=localhost;dbname=MeusLocais', 'root');
  }catch (PDOException $e) {
    //log it
    return null;
  }
}