<?php

mysqli_connect('localhost', 'root', '', 'moduleconnexion');
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$base = mysqli_connect ('localhost', 'root', '', 'moduleconnexion');

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM utilisateurs WHERE login="'.mysqli_escape_string($_POST['login']).'" AND pass_md5="'.mysqli_escape_string(md5($_POST['pass'])).'"';
	$req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
	$data = mysqli_fetch_array($req);

	mysqli_free_result($req);
	mysqli_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: profil.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = 'Compte non identifié.';
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="moduleconnexion.css">
</head>
<body>
    <header>
        <nav>
            <a href="#">Acceuil</a>
            <a href="connexion.php">Coonexion</a>
            <a href="inscription.php">Inscription</a>
        </nav>
    </header>
    <main>
        <section>
            <h1>La Maison</h1>
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
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
    </main>
    <footer>
        <a href="#">Github</a>
    </footer>
    
</body>
</html>