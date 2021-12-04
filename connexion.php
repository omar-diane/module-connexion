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
            <a href="index.php">Accuexil</a>
            <a href="#">Coonexion</a>
            <a href="inscription.php">Inscription</a>
        </nav>
    </header>
    <?php

    require('config.php');
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM utilisateurs";
$query = $conn->query($sql) ;
$users = $query->fetch_all();

session_start();

$_SESSION["conn"];
foreach($users as $user){
    if ( isset($_POST["login"]) && $_POST["login"] == $user[1] && password_verify($_POST['password'],$user[4]) == true){
        $_SESSION["connected"] = $_POST["login"] ;
        header("Location:index.php");
    }
    if ( isset($_POST["login"]) && $_POST["login"] == $user[1] && $_POST['password'] == $user[4]){
        $_SESSION["connected"] = $_POST["login"] ;
        header("Location:index.php");
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