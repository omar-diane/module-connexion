<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <?php

    if (isset($_REQUEST ['nom'], $_REQUEST ['prenom'], $_REQUEST ['password'])) {
        $name = stripslashes ($_REQUEST ['name']);
        $name = mysqli_real_escape_string ($conn,$name);

        $prenom = stripslashes ($_REQUEST ['prenom']);
        $prenom = mysqli_real_escape_string ($conn, $prenom);

        $password = stripslashes ($_REQUEST ['password']);
        $password = mysqli_real_escape_string ($conn, $password);

        $query = "INSERT into `moduleconnexion` (name, prenom, password)
              VALUES ('$name', '$prenom', '".hash('sha256', $password)."')";

        $res = mysqli_query ($conn, $query);
        if ($res){
            echo "<div class='success'>
            <h3> Vous êtes inscrit avec succés </h3>
            <p> Cliquer ici pour vous <a href='connexion.php'>connecter</a> </p>
            </div>";
        }      
    } else {
    ?>
    <form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="name" placeholder="Nom" required />
  <input type="text" class="box-input" name="prenom" placeholder="Prenom" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit ? <a href="connexion.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>
</body>
</html>