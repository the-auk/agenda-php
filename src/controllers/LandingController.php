<?php

namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\views as views;
use ClassHaters\hw3\src\models as models;

class LandingController extends Controller
{
    private $view;
    private $model;

  function run(){
    $categories = $this->model->getCategories();
    $agendas = $this->model->getAgendas();
    $this->view->set($categories, $agendas);
    $this->view->render();
  }

  function __construct()
  {
    require_once("./src/views/LandingView.php");
    $this->view = new views\LandingView();

    require_once("./src/models/LandingModel.php");
    $this->model = new models\LandingModel();
  }
}
