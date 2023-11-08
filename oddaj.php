<?php
session_start();
include_once "conn.php"; 
// echo $_SESSION['nazwa_gry'];
// echo "<form method='post'><input type='text' name='wpis'><input type='submit' name ='submit'></form>";
// $ktowy = $_POST['wpis'];
// print_r($_SESSION['nazwa_gry']);
$nazwa_g =  $_SESSION['nazwa_gry'];
// echo $_SESSION['nazwa_gry'];
// echo $ktowy.$nazwa_g;
// if (isset($_POST['submit'])){
$query="UPDATE `gry` SET `co`= '' WHERE `nazwa_gry` LIKE '".$nazwa_g."'";
// echo $query;
mysqli_query($mysqli, $query);
// header("Location: index.php");
header("Location: index.php")
?>