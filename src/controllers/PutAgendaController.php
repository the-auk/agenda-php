<?php

namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\views as views;
use ClassHaters\hw3\src\models as models;

class PutAgenda extends Controller{

  function run(){
    $categoryid = $_GET['arg1'];
    $title = $_GET['arg3'];
    $date = $_GET['arg4'];
    $time = $_GET['arg5'];
    $dt = $date.' '.$time;
    $items = $_GET['arg6'];
   
    $this->model->putAgenda($categoryid, $title, $items, $dt);
    //I opted to send the user to the category page instead of the landing page after
    //adding a new agenda.
    header("Location: " . "./index.php?c=viewCategory&arg1=$categoryid");
  }

  function __construct(){
    require_once("./src/models/PutAgendaModel.php");
    $this->model = new models\PutAgendaModel();
  }

}
