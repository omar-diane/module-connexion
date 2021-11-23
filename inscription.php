<?php

mysqli_connect('localhost', 'root', '','moduleconnexion');
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// on teste les deux mots de passe
	if ($_POST['pass'] != $_POST['pass_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
		$base = mysqli_connect ('localhost', 'root', '', 'moduleconnexion');

		// on recherche si ce login est déjà utilisé par un autre utilisateur
		$sql = 'SELECT count(*) FROM utilisateurs WHERE login="'.mysqli_escape_string($_POST['login']).'"';
		$req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
		$data = mysqli_fetch_array($req);

		if ($data[0] == 0) {
		$sql = 'INSERT INTO utilisateurs VALUES("", "'.mysqli_escape_string($_POST['login']).'", "'.mysqli_escape_string(md5($_POST['pass'])).'")';
		mysqli_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error());

		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: connexion.php');
		exit();
		}
		else {
		$erreur = 'Un utilisateur possède déjà ce login.';
		}
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
	<title>Inscription</title>
</head>
<body>
	<form action="" align="center">
		<label for=""> Login <input type="text" name="login"></label>
		<label for=""> Nom <input type="text" name="name"></label>
		<label for=""> Prenom <input type="text" name="prenom"></label>
		<label for=""> Mot de passe <input type="password" name="pass"></label>
		<label for=""> Confirmation de mot passe <input type="password" name="passconfirm"></label>
		<input type="submit" value="S'inscrire">
	</form>
</body>
</html>
