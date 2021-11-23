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
    <title>Connexion</title>
</head>
<body>
Connexion à l'espace membre :<br />
<form action="index.php" method="post">
Login : <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
<input type="submit" name="connexion" value="Connexion">
</form>
<a href="inscription.php">Vous inscrire</a>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>