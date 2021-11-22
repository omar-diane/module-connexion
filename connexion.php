<?php

session_start();
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
    <form action="" method="post" align="center">
        <label for="">Login <input type="text" name="login"></label>
        <label for="">Mot de passe <input type="password" name="password"></label>
        <input type="submit" name="Se connecter">
    </form>
</body>
</html>

<?php

$db_server = 'localhost';
			$db_user = 'root';
			$db_password = '';
			$db = 'moduleconnexion';
			
			$conn = mysqli_connect($db_server, $db_user, $db_password, $db);

            if(isset($_POST['login']) AND ($_POST['login']) !=''){
                foreach($users as $users){
                    if(
                        $users['login']==$_POST ['login'] AND
                        $users['password']==$_POST ['password'] AND
                    ) {
                        $loggedUsers = [
                            'login' => $users['login']
                        ];
                    } else {
                        $erroMessage = sprintf("Les informations envoyer ne permettent pas de vous identifier")
                    }
                }
            }

?>