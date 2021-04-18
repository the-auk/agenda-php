<?php

namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\views as views;
use ClassHaters\hw3\src\models as models;

class AddCategoryController extends Controller
{
  function run()
  {
    require_once("./src/views/AddCategoryView.php");
    $view = new views\AddCategoryView();
    $view->render();
  }
}
