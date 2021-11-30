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
if (isset($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['password'])){
  // récupérer le nom d'utilisateur 
  $login = stripslashes($_POST['login']);
  $login = mysqli_real_escape_string($conn, $login); 
  // récupérer le nom 
  $nom = stripslashes($_POST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom);
  // récupérer le prenom
  $prenom = stripslashes($_POST['prenom']);
  $prenom = mysqli_real_escape_string($conn, $prenom);
  // récupérer le mot de passe 
  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  
  $query = "INSERT into `utilisateurs` (login, nom, prenom, password)
        VALUES ('$login', '$nom', 'utilisateurs', '".hash('sha256', $password)."')";
  $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
       </div>";
    }
}else{
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
<?php } ?>
</html>
