<?php

require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="moduleconnexion.css">
</head>
<body>
<header>
        <nav>
            <a href="index.php">Accueil</a>
        </nav>
    </header>

    <?php
    require('config.php');

    
    ?>
   
    <main>
    <form class="box" action="" method="post" name="login">
<h1 class="box-title">Modifier mon profil</h1>
<input type="text" class="box-input" name="login" value="" placeholder="Login">
<input type="text" class="box-input" name="prenom" value="" placeholder="Nom">
<input type="text" class="box-input" name="nom" value="" placeholder="Prénom">
<input type="password" class="box-input" name="password" value="" placeholder="Mot de passe">
<input type="submit" value="Modifier " name="submit" class="box-button">
    </main>
    
</body>
</html>