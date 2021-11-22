<?php


// Connection to database 

			$db_server = 'localhost';
			$db_user = 'root';
			$db_password = '';
			$db = 'moduleconnexion';
			
			$conn = mysqli_connect($db_server, $db_user, $db_password, $db);	// establish my connexion


// Pose my conditions to validate forms if all fields are filled

			// I start with login to check if it already exist , if it exists, i send an error message
			// like this i don't have to stay checking the connection form and relate it to the id but is sufficient the login name 

if (isset($_POST['login'])&& ($_POST['login']) != '') { 


			$query = "SELECT login FROM utilisateurs "; 

			$req = mysqli_query($conn,$query);

			$res = mysqli_fetch_all($req, MYSQLI_ASSOC);

			for($i=0; $i<isset($res[$i]); $i++){
				foreach($res[$i] as $k => $v){	
					if($v !== $_POST['login']){

			// Here i continue posing my conditions

						if  (   (isset($_POST['prenom']) and ($_POST['prenom']) != '') and
								 	(isset($_POST['nom']) and ($_POST['nom']) != '') and
								 	(isset($_POST['password']) and ($_POST['password']) != '')	)	{	//**

								$login = $_POST['login'];
								$prenom = $_POST['prenom'];
								$name = $_POST['nom']; 
								$password = $_POST['password'];

								$query2= " INSERT INTO utilisateurs( login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password') ";

								$req2 = mysqli_query($conn,$query2);

								if(isset($_POST['submit'])){
								
									header( "Location: connexion.php" );

								}	
						}	else { 	echo 'error';	}						//**isset($_POST['pass.	
					}	else {	echo 'error';	}							//**if($v !== $_POST['l..
				}
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
        <label for=""> Login <input type="text" name="login"></label> <br>
        <label for=""> Nom <input type="text" name="name"></label> <br>
        <label for=""> Prénom <input type="text" name="prenom"></label> <br>
        <label for=""> Mot de passe <input type="password" name="password"></label><br>
        <label for=""> Confirmation du mot de passe <input type="password" name="confirmpassword"></label> <br>
		<input type="submit" value="S'inscrire">
    </form>

    <a href="index.php"></a>
</body>
</html>
