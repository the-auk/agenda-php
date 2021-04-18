<?php

namespace ClassHaters\hw3\src\models;

require_once("Model.php");

class DeleteAgendaModel extends Model{
  function deleteAgenda($agendaid){
    $agendaid = $this->inputSanitizer($agendaid);
    if($agendaid != False)
    {
      $query = "DELETE FROM ".DBNAME.".agendas WHERE agendaid = $agendaid";
      $result = mysqli_query($this->db, $query);
      $query2 = "DELETE FROM ".DBNAME.".relationship WHERE agendaid = $agendaid";
      $result = mysqli_query($this->db, $query2);
    }
  }

  function getCategory($agendaid)
  {
      $agendaid = $this->inputSanitizer($agendaid);
      if($agendaid != False)
      {
        $query = "SELECT categoryid FROM ".DBNAME.".relationship WHERE agendaid = $agendaid";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_array($result)[0];
      }
  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
