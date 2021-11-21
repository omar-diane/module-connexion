<?php
$db_server = 'localhost';
$$db_username = 'root';
$db_password = '';
$db = 'moduleconnexion';

$conn = mysqli_connect($db_server, $db_username, $db_password, $db);
if (isset($_POST['login']) ($_POST['login']) != '')
        (isset($_POST['nom']) ($_POST['nom']) != '')
	 	(isset($_POST['prenom']) ($_POST['prenom']) != '')
	 	(isset($_POST['password']) ($_POST['password']) != '')){

			$login = $_POST['login'];
			$name = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$password = $_POST['password'];

			$query= " INSERT INTO utilisateurs( login, prenom, nom, password) VALUES ('$login','$name','$prenom','$password') ";

			$req = mysqli_query($conn,$quest);

			if(isset($_POST['submit'])){
			
			header( "Location: connexion.php" );

			}

	} else {

		echo 'Tous les champs ne sont pas renseignés';
	}

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for=""> Login <input type="text" name="login"></label>
        <label for=""> Nom <input type="text" name="name"></label>
        <label for=""> Prénom <input type="text" name="prenom"></label>
        <label for=""> Mot de passe <input type="password" name="password"></label>
        <label for=""> Confirmation du mot de passe <input type="password" name="confirmpassword"></label>
    </form>

    <a href="index.php"></a>
</body>
</html>
