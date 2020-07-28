<?php

class DateFormater{
  public static function ToMySQL($data){
    $date = DateTime::createFromFormat('d/m/Y', $_POST["data"]);
    return $date->format("Y-m-d");
  }

  public static function FromMySQL($data){
    return date('d/m/Y', strtotime($data));
  }
}