<?php
namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\models as models;

class DeleteCategory extends Controller{

  private $model;

  function run()
  {
    if(isset($_GET['arg1']))
    {
      $categoryID = $_GET['arg1'];
      $this->model->deleteCategory($categoryID);
    }
    require_once("./src/views/helpers/redirectIndex.php");
  }

  function __construct(){
    require_once("./src/models/DeleteCategoryModel.php");
    $this->model = new models\DeleteCategoryModel();
  }

}
