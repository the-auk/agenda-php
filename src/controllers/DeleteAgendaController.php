<?php
namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\models as models;

class DeleteAgenda extends Controller{

  private $model;

  function run()
  {
    if(isset($_GET['arg1']))
    {
      $agendaID = $_GET['arg1'];
      $categoryID = $this->model->getCategory($agendaID);
      $this->model->deleteAgenda($agendaID);
      header("Location: " . "./index.php?c=viewCategory&arg1=$categoryID");
    }
    else{
    require_once("./src/views/helpers/redirectIndex.php");
    }
  }

  function __construct(){
    require_once("./src/models/DeleteAgendaModel.php");
    $this->model = new models\DeleteAgendaModel();
  }

}
