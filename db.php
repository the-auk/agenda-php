<?php
$password = "password";

// Create connection
$conn = new mysqli('localhost', 'root', $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE if NOT EXISTS Points";
$table1 = "CREATE TABLE CATEGORY (Name varchar(255))";
$table2 = "CREATE TABLE AGENDAS (Title varchar(255),
                                 Items varchar(255),
                                 aDate DATE,
                                  aTime TIME,
                                  Name varchar(255),
                                  FOREIGN KEY (Name) REFERENCES CATEGORY(Name))";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
  if ($conn->query($table1) === TRUE) {
    if ($conn->query($table2) === TRUE) {
      echo "table created";}}
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
