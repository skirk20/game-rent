<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<link rel="stylesheet" href="style.css">
<body>
<?php
include_once("nav.php")
?>
<meta name = "viewport" content = "width = device-width">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <div class="gora">
<h1><strong>Wypożycz grę</strong></h1>


<form class='tytul' method="post" action="<?php echo $_SERVER['PHP_SELF'];?> ">
  <h2>wyszukiwarka tytułów:</h2> 
  <input type="text" name="fname" class="input">
  <input type="submit" class="btn" value="szukaj">
</form>

</div>
<?php
include_once "conn.php";
$sql = "DELETE FROM `wyszukiwanie` WHERE 1";
$result = $mysqli->query($sql);
if (!isset($_POST['fname'])){
  $name = "";
}
else{
  $name = $_POST["fname"];
  $result=$mysqli->query("SELECT id, nazwa_gry FROM `gry` WHERE nazwa_gry REGEXP '($name)'");
$zmienna = $result->fetch_all();
$ile = count($zmienna);
$sql = "SELECT id, co from gry";
$result = $mysqli->query($sql);
for ($i=0; $i <$ile ; $i++) { 
  $wysw = $zmienna[$i][1];
  $z=$zmienna[$i][0];
  $sql = "INSERT INTO `wyszukiwanie`(`id`, `nazwa_gry`, `kto_wypozyczyl`) VALUES ('$z','$wysw','')";
  $result = $mysqli->query($sql);

} 
header("Location: wysz.php");
};
$sql = "SELECT id, nazwa_gry, co FROM gry";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  echo "<table class='table-striped table-hover table-condensed'><tr><th>ID</th><th class='gra'>Name</th><th class='text-truncate' style='max-width:70px'>kto wypożyczył</th><th class='wypozycz'>wypożycz</th><th class='oddaj'>oddaj</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<form method='post' ><tr>
    <td class = 'text-center'>".$row['id']."</td>
    <td class='gra'><input class=' text-truncate' name = 'gra' readonly value='".$row['nazwa_gry']."'style='display: none'><p class='text-truncate'>".$row['nazwa_gry']."</p></td>
    <td lass='text-truncate' style='max-width:70px'>".$row['co']."</td>
    <td class = 'guzik'><input type='submit' onclick = pokaz() name='wypozycz' value = 'wypożycz' class='btn btn-success' ></td>
    <td class = 'guzik'><input type='submit' onclick = pokaz() name = 'oddaj' value='oddaj' class='btn btn-success'></td></tr></form>";
  }
  echo "</table></form>";
} else {
  echo "0 results";
};
?>
<?php

ob_start();
if (isset($_POST['wypozycz'])) {
  $_SESSION['nazwa_gry'] = $_POST['gra'];
  ?>
  <script language="javascript" type="text/javascript">window.location = "wpis.php";</script>
<?php
};

if (isset($_POST['oddaj'])) {
  $_SESSION['nazwa_gry'] = $_POST['gra'];
  ?>
  <script language="javascript" type="text/javascript">window.location = "oddaj.php";</script>
<?php
};
?>
<script>
  function pokaz(){
    let a = document.getElementsByClassName['id'];
    var b =(document.getElementsByClassName('nazwa')[a])
  }
$a = document.getElementsByTagName("td");
 </script>
<?php


?>
</body>
</html>