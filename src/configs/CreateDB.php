<?php
namespace ClassHaters\hw3\src\configs;

use ClassHaters\hw3\src\configs as config;

function create(){
  include_once("Config.php");
  $db = mysqli_connect(HOST, USERNAME, PASSWORD);
  
  if(!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $createdb = "CREATE DATABASE IF NOT EXISTS " . DBNAME;
  if (mysqli_query($db, $createdb)) {

    $categoriesTable = "CREATE TABLE ". DBNAME. ".categories (
      categoryid INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL
    )";
    
    $agendasTable = "CREATE TABLE ". DBNAME. ".agendas (
      agendaid INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(255) NOT NULL,
      items TEXT NOT NULL,
      dt DATETIME NOT NULL
    )";
    $relationships = "CREATE TABLE ". DBNAME. ".relationship (
      agendaid INT(6) UNSIGNED NOT NULL PRIMARY KEY,
      categoryid INT(6) UNSIGNED NOT NULL
    )";
    if (mysqli_query($db, $categoriesTable)) {
      
      if (mysqli_query($db, $agendasTable)) {
        
        if(mysqli_query($db, $relationships))
        {
          
        }
        else{
          echo "Could not create table: " . mysqli_error($db);
        }
      }
      else {
        
        echo "Could not create table: " . mysqli_error($db);
      }
    }
    else {
      
      echo "Could not create table: " . mysqli_error($db);
    }
  }
  else {
    
    echo "Could not create database: " . mysqli_error($db);
  }

  mysqli_close($db);
}

create();
