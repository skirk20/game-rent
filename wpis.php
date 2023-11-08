<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wpis.css">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("nav.php")
    ?>
    <div class="content">
    <?php
session_start();
include_once "conn.php";
echo "<form class='form-horizontal text-center' method='GET' style='margin-top:2em;'><h2 style='font-weight:bold'>kto wypozycza</h2 ><br><input type='text' name='wpis' class='input-lg'><input class='btn' type='submit' name='submit'></form>";
if (!isset($_GET['wpis'])){
    $ktowy = '';
}
else{$ktowy = $_GET['wpis'];}
$nazwa_g =  $_SESSION['nazwa_gry'];
if (isset($_GET['submit'])){
  $query="UPDATE `gry` SET `co`= '".$ktowy."' WHERE nazwa_gry LIKE '".$nazwa_g."'";
  // echo $query;
  mysqli_query($mysqli, $query);
  $query="UPDATE `wyszukiwanie` SET `kto_wypozyczyl`= '".$ktowy."' WHERE nazwa_gry LIKE '".$nazwa_g."'";
  // echo $query;
  mysqli_query($mysqli, $query);
  header("Location: index.php");
}
?>  
</div>
</body>
</html>
