<?php

//Parametry do lacznosci z lokalna developerska baza danych xamp
 $dbHostName= "s50.mydevil.net";
$dbHostUser="m1467";
 $dbHostPasswd="N!Xh0q8P#UxbYF33&x78";
 $dbName="m1467_baza_gier";
// $dbHostName= "localhost";
// $dbHostUser="root";
// $dbHostPasswd="";
// $dbName="";
// tworzenie obiektu mysql
$mysqli = new mysqli($dbHostName, $dbHostUser, $dbHostPasswd,$dbName);
// $mysqli = mysqli_connect($dbHostName,$dbHostUser,$dbHostPasswd,$dbName) or die("nie działa");
if($mysqli->connect_error){
    printf("connect failed: %s\n",$mysqli->connect_error);
    exit();
}




$query="CREATE DATABASE IF NOT EXISTS m1467_baza_gier DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;";
$run = $mysqli->query($query);
$dbName="m1467_baza_gier";
$mysqli = mysqli_connect($dbHostName,$dbHostUser,$dbHostPasswd,$dbName) or die("nie działa");
$query="USE m1467_baza_gier;";
$run = $mysqli->query($query);
include_once "db.php";
?>