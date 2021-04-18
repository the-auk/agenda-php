<?php

namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\views as views;
use ClassHaters\hw3\src\models as models;

class ViewCategoryController extends Controller
{
  private $view;
  private $model;

  function run(){
    $categoryid = $_GET['arg1'];

    $currentcategory = $this->model->getCategoryName($categoryid);
    $categories = $this->model->getCategories();
    $agendas = $this->model->getCategoryAgendas($categoryid);

    require_once("./src/views/ViewCategoryView.php");
    $this->view = new views\ViewCategoryView();

    $this->view->set($currentcategory, $categoryid, $categories, $agendas);

    $this->view->render();

  }

  function __construct()
  {
    require_once("./src/models/ViewCategoryModel.php");
    $this->model = new models\ViewCategoryModel();

  }
}
