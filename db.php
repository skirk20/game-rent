<?php
$characters = " \n\r";
// $dbHostName= "localhost";
// $dbHostUser="root";
// $dbHostPasswd="";
// $dbName="";
include_once "conn.php";
// $mysqli = mysqli_connect($dbHostName,$dbHostUser,$dbHostPasswd,$dbName) or die("nie działa");


// $query="USE m1467_baza_gier;";
$query="USE m1467_baza_gier;";
$run = $mysqli->query($query);

$query="CREATE TABLE IF NOT EXISTS gry(
    id int(100) PRIMARY KEY AUTO_INCREMENT,
    nazwa_gry varchar(255) NOT NULL,
    co varchar(255)
    
);";
$run = $mysqli->query($query);
$query = "CREATE TABLE IF NOT EXISTS wyszukiwanie (
    id int,
    nazwa_gry varchar(255) NOT NULL,
    kto_wypozyczyl varchar(255) NOT NULL
    );";
$run = $mysqli->query($query);
$pytania = array();
$file = file_get_contents('gierki.txt');
$lines = explode("\n",$file);
foreach($lines as $key){
    $rekord = trim($key,$characters);
    
    $sql3 = "SELECT * FROM gry WHERE nazwa_gry='$rekord'";
    $questions = $mysqli->query($sql3) or die($mysqli->error.__LINE__);
    $count = $questions->num_rows;

    if (strlen($rekord)!=0){
        if($count==0){
            $query="INSERT INTO gry VALUES(NULL,'$rekord',NULL)";
            $run = $mysqli->query($query) or die($mysqli-> error.__LINE__);
        }
    }
    
}



?>