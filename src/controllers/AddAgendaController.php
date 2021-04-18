<?php
namespace ClassHaters\hw3\src\controllers;
require_once(__DIR__ . "/Controller.php");

use ClassHaters\hw3\src\views as views;
use ClassHaters\hw3\src\models as models;

class AddAgendaController extends Controller
{
  function run()
  {
  	session_start();
  	$categoryid = $_GET['arg1'];
    $currentcategory = $_GET['arg2'];

    if(isset($_POST['additem'])) {
      $_SESSION["title"] = $_POST['arg3'];
      $_SESSION["date"] = $_POST['arg4'];
      $_SESSION["time"] = $_POST['arg5'];
      $_SESSION["items"][1] = $_POST['agenda-item1'];

      for($i = 1; $i <= $_SESSION['count']; $i++)
      {
        $_SESSION["items"][$i] = $_POST['agenda-item'.$i];
      }
      if($_SESSION["count"] <= 1 || empty($_SESSION["count"])) {
      	$_SESSION["count"] = 2;
      } 
      else {
      	$_SESSION["count"]++;
      }
    }

    if(isset($_POST['done'])) {
		$_SESSION["title"] = $_POST['arg3'];
		$_SESSION["date"] = $_POST['arg4'];
		$_SESSION["time"] = $_POST['arg5'];
		$_SESSION["items"][1] = $_POST['agenda-item1'];
		$items = $_SESSION["items"][1] . "--";
		for($j = 2; $j <= $_SESSION['count']; $j++)
		{
			if(!empty($_POST['agenda-item'.$j])) {
				$items .= $_POST['agenda-item'.$j] ."--";
			}
		}
		require_once("./src/controllers/PutAgendaController.php");


		$title = $_SESSION['title'];
		$date = $_SESSION['date'];
		$time = $_SESSION['time'];

		session_destroy();
    	header("Location: " . "./index.php?c=putAgenda&arg1=$categoryid&arg3=".$title."&arg4=".$date."&arg5=".$time."&arg6=".$items);
    	
    }

    require_once("./src/views/AddAgendaView.php");
    $view = new views\AddAgendaView();
    if(empty($_SESSION["title"]) && empty($_SESSION["date"]) && empty($_SESSION["time"]) && empty($_SESSION["items"])) {
    	$view->set($currentcategory, $categoryid, NULL, "", "", "", "");
    }
    else {
        $view->set($currentcategory, $categoryid, $_SESSION['count'], $_SESSION['title'], $_SESSION['date'], $_SESSION['time'], $_SESSION['items']);	
    }
    $view->render();
  }

}
