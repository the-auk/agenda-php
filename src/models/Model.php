<?php

namespace CLassHaters\hw3\src\models;


use CLassHaters\hw3\src\configs as config;
class Model
{
  protected $db;

  function inputSanitizer($input)
  {
    return filter_var($input, FILTER_SANITIZE_STRING);
  }

  function __construct()
  {
    // create db connection
    include_once("./src/configs/Config.php");
    $this->db = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    // check connection
    if(!$this->db)
    {
      die("Connection failed: " . mysqli_connect_error());
    }
  }

  function __destruct()
  {
    if($this->db)
    {
      mysqli_close($this->db);
    }
  }
}
