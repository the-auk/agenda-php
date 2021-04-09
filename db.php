<?php

$link = mysqli_connect('localhost', 'root', "password");
$query = "CREATE DATABASE if NOT EXISTS Points";
mysqli_query($link, $query);
mysqli_close($link);
$link = mysqli_connect('localhost', 'root', "password", "points");
$table1 = "CREATE TABLE CATEGORY (Name varchar(255))";
mysqli_query($link, $table1);
$table2 = "CREATE TABLE AGENDAS (Title varchar(255) NOT NULL,
                                 Items varchar(255),
                                 aDate DATE,
                                 aTime TIME,
                                 Name varchar(255),
                                 PRIMARY KEY (Title)
                                 )";
mysqli_query($link, $table2);
mysqli_close($link);
?>
