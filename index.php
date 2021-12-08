<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="moduleconnexion.css" type="text/css">
</head>
<body>
    <header>
        <nav>
            <a href="#">Acceuil</a>
            <a href="connexion.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
        </nav>
    </header>
    <main>
        <section>
            <h1 class='big-title'>LOREM</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit molestias fugiat quisquam cum? Autem illum veniam unde inventore hic iure quidem, dolores repellat vero, consequuntur praesentium provident! Soluta, et nesciunt.
            </p>
</section>
<aside class="displayed">
    <img src="images/image-accueil.jpg" alt="">
</aside>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
    </main>
    <footer>
        <a href="https://github.com/omar-diane/module-connexion">Github</a>
        <table>
    <tbody>
        <tr class="menu-footer">
            <td><a href="#">ACCUEIL</a></td>
        </tr>
        <tr class="menu-footer">
            <td><a href="connexion.php">CONNEXION</a></td>
        </tr>
        <tr class="menu-footer">
            <td><a href="inscription.php">INSCRIPTION</a></td>
        </tr>
    </tbody>
</table>
    </footer>
    
</body>
</html>