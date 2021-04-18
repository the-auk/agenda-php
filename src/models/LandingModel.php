<?php

namespace ClassHaters\hw3\src\models;

require_once("Model.php");

class LandingModel extends Model{

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

  function getCategoryCountByName($categoryName){
    $query = "SELECT COUNT(agendaid) from ".DBNAME.".relationship WHERE categoryid = (SELECT categoryid FROM ".DBNAME.".categories WHERE name=\"$categoryName\")";
    $result = mysqli_query($this->db, $query);
    return mysqli_fetch_array($result)[0];
  }

  function getAgendas(){
    $limit = 3;
    $retArray = [];
    $query = "SELECT agendaid, title, DATE(dt) as date, TIME(dt) as time from ".DBNAME.".agendas ORDER BY dt ASC LIMIT $limit";
    $result = mysqli_query($this->db, $query);
    $num_rows = mysqli_num_rows($result);
    for($i = 0; $i <= $num_rows-1; $i++){ 
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      array_push($retArray, $row);
    }
    return $retArray;
  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
