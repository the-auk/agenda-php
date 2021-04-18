<?php

namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ ."/Controller.php");

use ClassHaters\hw3\src\views as views;
use ClassHaters\hw3\src\models as models;

class ViewAgendaController extends Controller{
    private $model;
    private $view;

    function run(){
      $agendaid = $_GET['arg1'];

      $agendainfo = $this->model->getAgendaInfo($agendaid);

      $categoryid = $agendainfo['categoryid'];
      $categoryname = $this->model->getCategoryName($categoryid);

      require_once("./src/views/ViewAgendaView.php");
      $this->view = new views\ViewAgendaView();
      $this->view->set($categoryname, $agendainfo);
      $this->view->render();
    }

    function __construct(){
      require_once("./src/models/ViewAgendaModel.php");
      $this->model = new models\ViewAgendaModel();
    }
}
