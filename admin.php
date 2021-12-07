<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <main>
  <table id='usertable'>
<?php

require('config.php');

$query="SELECT * FROM utilisateurs";
$req=mysqli_query($conn,$query);
$res=mysqli_fetch_all($req,MYSQLI_ASSOC);

foreach($res as $k => $v){
  echo '<tr>';
  foreach($v as $k2 => $v2){
    echo '<td>'.$v2.'</td>';
  }
  echo '</tr>';
}
?>
  </table>
  </main>
</body>
</html>