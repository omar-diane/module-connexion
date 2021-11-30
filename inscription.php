<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="moduleconnexion.css">
</head>
<body class="main2">
<header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="connexion.php">Connexion</a>
            <a href="#">Inscription</a>
        </nav>
    </header>

<?php
include ("config.php");

if(isset($_REQUEST['login'], $_REQUEST['prenom'], $_REQUEST['name'], $_REQUEST['password'])){
  $login = stripslashes($_REQUEST['login']);
  $login =mysqli_real_escape_string($conn, $login);
  $prenom = stripslashes($_REQUEST['prenom']);
  $prenom =mysqli_real_escape_string ($conn, $prenom);
  $name = stripslashes($_REQUEST['name']);
  $name = mysqli_real_escape_string($conn, $name);
  $password = stripslashes($_REQUEST['password']);
  $password =mysqli_real_escape_string ($conn, $password);

  $query = "INSERT INTO utilisateurs (login, prenom, name, password)
  VALUES ('$login', '$prenom', '$name', '".hash('sha256',  $password)."')";

  $res = mysqli_query($conn, $query);
  if(isset($res)){
    echo "<div class='sucess'>
    <h3> Vous êtes inscrit avec succés.</h3>
    <p>Cliquez ici pour vous <a href='connexion.php>connecter</a></p>
    </div>";
  }
}
?>

<form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire.</h1>
  <input type="text" class="box-input" name="login" 
  placeholder="Login" required />
  
    <input type="text" class="box-input" name="name" 
  placeholder="Nom" required />
  
    <input type="text" class="box-input" name="prenom" 
  placeholder="Prénom" required />

  <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />

  <input type="password" class="box-input" name="pass_confirm" 
  placeholder="Confirmation du mot de passe" required />


    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
  
    <p class="box-register">Déjà inscrit? 
  <a href="connexion.php">Connectez-vous ici</a></p>
</form>
</body>
</html>
