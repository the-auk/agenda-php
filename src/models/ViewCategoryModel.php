<?php

namespace ClassHaters\hw3\src\models;

require_once("Model.php");

class ViewCategoryModel extends Model
{
  function getCategories(){
    $retArray = [];
    $query = "SELECT name, categoryid from ".DBNAME.".categories ORDER BY name ASC";
    $result = mysqli_query($this->db, $query);
    $num_rows = mysqli_num_rows($result);
    for($i = 1; $i <= $num_rows; $i++){
      $tuple = [];
      $row = mysqli_fetch_array($result);
      $tuple["name"] = $row[0];
      $tuple["categoryCount"] = $this->getCategoryCountByID($row[1]);
      $tuple["categoryid"] = $row[1];
      array_push($retArray, $tuple);
    }
    return $retArray;
  }

  function getCategoryCountByID($categoryid){
      $query = "SELECT COUNT(agendaid) from ".DBNAME.".relationship WHERE categoryid = $categoryid;";
      $result = mysqli_query($this->db, $query);
      return mysqli_fetch_array($result)[0];
  }

  function getCategoryAgendas($categoryid){
    $retArray = [];
    $query = "SELECT agendaid, title, items, DATE(dt) as date from ".DBNAME.".agendas WHERE agendaid in
        (SELECT agendaid from ".DBNAME.".relationship WHERE categoryid = $categoryid) ORDER BY dt ASC";
    $result = mysqli_query($this->db, $query);
    $num_rows = mysqli_num_rows($result);
    for($i = 1; $i <= $num_rows; $i++){
      $row = mysqli_fetch_array($result);
      array_push($retArray, $row);
    }
    return $retArray;
  }

  function getCategoryName($categoryid){
    $query = "SELECT name FROM ".DBNAME.".categories WHERE categoryid = $categoryid;";
    $result = mysqli_query($this->db, $query);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        return $row["name"];
      }
    }
    return null;
  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
