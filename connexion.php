<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="moduleconnexion.css" type="text/css">
</head>
<body class='main'>
<header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="#">Conexion</a>
            <a href="inscription.php">Inscription</a>
        </nav>
    </header>
    <?php

require('config.php');

$utilcheck=0;
$admin=0;

if(!empty($_POST['login']) and !empty($_POST['password'])){

    $login = $_POST['login'];

    $sql = "SELECT login, password, id FROM utilisateurs WHERE login = '$login' ";
    $query = $conn->query($sql) ;
    $res = mysqli_fetch_row($query);
    
    if($_POST['login'] === $res[0] and $_POST['login'] !== 'admin' ){
        $utilcheck++;
    } elseif ( $_POST['login'] === 'admin' ){
        $admin++;
    }
    if($_POST['password'] === $res[1] and $_POST['password'] !== 'admin'){
        $utilcheck++;
    } elseif ( $_POST['password'] === 'admin' ){
        $admin++;
    }
    if($utilcheck === 2){
        $_SESSION['connected']= $_POST['login'];
        $_SESSION['id']=$res[2];
    header('Location: profil.php');
    } elseif ($admin === 2){
        $_SESSION['adconnected']= $_POST['login'];
        header('Location: admin.php');
    }
} 



?>

<main>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="login" placeholder="Login">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? 
  <a href="inscription.php">S'inscrire</a>
</p>
</form>
</main>
</body>
</html> 