<?php

namespace ClassHaters\hw3\src\models;

require_once("Model.php");

class PutAgendaModel extends Model
{

  function putAgenda($categoryid, $title, $items, $dt)
  {
    $categoryid = $this->inputSanitizer($categoryid);
    $title = $this->inputSanitizer($title);
    $items = $this->inputSanitizer($items);
    $dt = $this->inputSanitizer($dt);

    if($categoryid != false && $title != false && $items != false && $dt != false){
      $query = "INSERT INTO ".DBNAME.".agendas(title, items, dt)
                              VALUES (\"$title\",\"$items\", \"$dt\")";
      $result = mysqli_query($this->db, $query);
      if(mysqli_affected_rows($this->db) > 0){
        $lastid = mysqli_insert_id($this->db);
        $query2 = "INSERT INTO ".DBNAME.".relationship(agendaid, categoryid) VALUES (\"$lastid\", \"$categoryid\")";
        $result = mysqli_query($this->db, $query2);
      }
    }
}

  function __construct()
  {
    parent::__construct();
  }

  function __destruct()
  {
    parent::__destruct();
  }
}
