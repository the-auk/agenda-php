<?php

namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\views as views;
use ClassHaters\hw3\src\models as models;

class PutCategory extends Controller{

  private $model;

  function run()
  {
    $newCategory = $_GET['arg1'];
    //Check if the category already exists
    if($this->model->checkExists($newCategory))
    {
      require_once("./src/views/helpers/redirectIndex.php");
    }
    else{
      $this->model->addCategory($newCategory);
      require_once("./src/views/helpers/redirectIndex.php");
    }
  }

  function __construct(){
    require_once("./src/models/PutCategoryModel.php");
    $this->model = new models\PutCategoryModel();
  }

}
