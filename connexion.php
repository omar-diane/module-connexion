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
            <a href="#">Connexion</a>
            <a href="inscription.php">Inscription</a>
        </nav>
    </header>
    <?php
    require('config.php');

    session_start();
if (isset($_POST['login'])){
  $login = stripslashes($_REQUEST['login']);
  $login = mysqli_real_escape_string($conn, $login);
  $_SESSION['login'] = $login;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM `utilisateurs` WHERE login='$login' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query);

  $rows = mysqli_num_rows($result);
  if($rows==1) {
    $_SESSION['login'] = $login;
    header('location: index.php');
  } else {
    $message = "Le nom d'utilisateur ou le mot de passe est incorrecte";
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
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</main>
<footer>
  <a href="#">Github</a>
</footer>
</body>
</html>