<?php

namespace ClassHaters\hw3\src\models;

require_once("Model.php");

class PutCategoryModel extends Model{

  function checkExists($categoryname){
    $categoryname = $this->inputSanitizer($categoryname);
    if($categoryname == False)
    {
      return False;
    }
    $query = "SELECT COUNT(name) from ".DBNAME.".categories where name = \"$categoryname\"";
    $result = mysqli_query($this->db, $query);
    if(mysqli_fetch_array($result)[0] > 0){
      return True;
    }
    return False;
  }

  function addCategory($categoryname){
    $categoryname = $this->inputSanitizer($categoryname);
    if($categoryname != false)
    {
      $query = "INSERT INTO ".DBNAME.".categories (name) VALUES (\"$categoryname\")";
      $result = mysqli_query($this->db, $query);
    }
  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
