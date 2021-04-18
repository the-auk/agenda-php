<?php

namespace ClassHaters\hw3\src\models;

require_once("Model.php");

class ViewAgendaModel extends Model
{
  function getAgendaInfo($agendaid)
  {
    $retArray = [];
    $query = "SELECT categoryid, title, items, DATE(dt) as date, TIME(dt) as time FROM ".DBNAME.".agendas NATURAL JOIN ".DBNAME.".relationship
              WHERE agendaid = \"$agendaid\"";
    $result = mysqli_query($this->db, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $row;
  }

  function getCategoryName($categoryid)
  {
    $categoryid = $this->inputSanitizer($categoryid);
    if($categoryid != False)
    {
      $query = "SELECT name FROM ".DBNAME.".categories WHERE categoryid = $categoryid";
      $result = mysqli_query($this->db, $query);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          return $row["name"];
        }
      }
      return null;
    }
    else {
      return null;
    }
  }
}
