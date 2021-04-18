<?php

namespace ClassHaters\hw3\src\models;

require_once("Model.php");

class DeleteCategoryModel extends Model{
  function deleteCategory($categoryID){
    $categoryID = $this->inputSanitizer($categoryID);
    if($categoryID != False)
    {
      $query = "DELETE FROM ".DBNAME.".categories WHERE categoryid = $categoryID";
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
