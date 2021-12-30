<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="moduleconnexion.css">
</head>
<body>
<header>
        <nav>
            <a href="index.php">Accueil</a>
            <?php include "header.php";?>
        </nav>
    </header>
<main id="admin">
  <h1>Utilisateurs</h1>
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
  <form class="box" action="" method="post">
    <h1 class="box-title">Update user</h1>
    <input type="text" class="box-input" name="login" placeholder="Login" required />
    <input type="text" class="box-input" name="nom" placeholder="Nom" required />
    <input type="text" class="box-input" name="prenom" placeholder="Prenom" required />  
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
      <h2>Choisir un id pour changer les données de l'utilisateur</h2>
      <input type="text" class="box-input" name="id" placeholder="Choisis un id">
      <input type="submit" name="submit" value="Update" class="box-button" />
  </form>
  <?php

if(!empty($_POST['login'])and
!empty($_POST['prenom'])and
!empty($_POST['nom'])and
!empty($_POST['password'])and
!empty($_POST['id'])){

    if(isset($_POST['submit'])){
     $login = $_POST['login'];
     $prenom = $_POST['prenom'];
     $nom = $_POST['nom'];
     $password = $_POST['password'];
     $id = $_POST['id'];
     $sql = "UPDATE utilisateurs SET login='$login', prenom='$prenom', nom='$nom', password='$password' WHERE id='$id'";
     $req=mysqli_query($conn,$sql);
     header('location: admin.php');

    }
}
?>
<a href="logout.php">Déconnexion</a>
</main>
</body>
</html>