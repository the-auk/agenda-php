<?php
namespace ClassHaters\hw3;
use ClassHaters\hw3\src\controllers as control;

if(!empty($_GET['c'])){
  $controller = $_GET['c'];
}
else{
  $controller = "LandingView"; #LandingView is the default
}

if($controller == "LandingView"){
  require_once("./src/controllers/LandingController.php");
  $controller = new control\LandingController();
}
else if($controller == "addCategory"){
  require_once("./src/controllers/AddCategoryController.php");
  $controller = new control\AddCategoryController();
}
else if($controller == "deleteCategory"){
  require_once("./src/controllers/DeleteCategoryController.php");
  $controller = new control\DeleteCategory();
}
else if ($controller == "putCategory"){
  require_once("./src/controllers/PutCategoryController.php");
  $controller = new control\PutCategory();
}
else if ($controller == "viewCategory"){
  require_once("./src/controllers/ViewCategoryController.php");
  $controller = new control\ViewCategoryController();
}
else if ($controller == "addAgenda"){
  require_once("./src/controllers/AddAgendaController.php");
  $controller = new control\AddAgendaController();
}
else if ($controller == "putAgenda"){
  require_once("./src/controllers/PutAgendaController.php");
  $controller = new control\PutAgenda();
}
else if($controller == "viewAgenda"){
  require_once("./src/controllers/ViewAgendaController.php");
  $controller = new control\ViewAgendaController();
}
else if($controller == "deleteAgenda"){
  require_once("./src/controllers/DeleteAgendaController.php");
  $controller = new control\DeleteAgenda();
}
else{
  require_once("./src/controllers/LandingController.php");
  $controller = new control\LandingController();
}


$controller->run();
