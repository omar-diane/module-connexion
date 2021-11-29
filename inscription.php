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

require('config.php');

if  ((isset($_POST['login']) and ($_POST['login']) != '')){


  if (mysqli_num_rows($req) != 0){
    echo '<h4>this username already exists. please choose another username</h4>';
    return;
  } else { 	
    if  (   (isset($_POST['prenom']) and ($_POST['prenom']) != '') and
               (isset($_POST['nom']) and ($_POST['nom']) != '') and
               (isset($_POST['password']) and ($_POST['password']) != '') and
              (isset($_POST['passwordconf']) and ($_POST['passwordconf']) != '') )  {	
            if( $_POST['password'] === $_POST['passwordconf']){
              if(isset($_POST['submit'])){

                $login = $_POST['login'];
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom']; 
                $password = $_POST['password'];
                $status = 0;
                $statusad =0;

                $quest2= " INSERT INTO utilisateurs( login, prenom, nom, password, status, statusad) VALUES ('$login','$prenom','$nom','$password', '$status', '$statusad' ) ";

                $req2 = mysqli_query($conn,$quest2);

                header( "Location: connexion.php" );

              }	
            } else { echo '<span class="ads"> passwords don\'t match </span>';
            }
    } else {  echo '<span class="ads"> please insert your details </span>'; 
    }
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
