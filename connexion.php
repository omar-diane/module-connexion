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

            $query = "SELECT login FROM utilisateurs "; 

			$req = mysqli_query($conn,$query);

			$res = mysqli_fetch_all($req, MYSQLI_ASSOC);

            $admin=0;
            $usercheck=0;

            if (	(isset($_POST["login"])) and $_POST['login'] != ''){				// check if empty and exists
                if (	(isset($_POST["password"])) and $_POST['password'] != '') {

                    foreach($res as $k => $v){

                        if( $_POST['login'] === $v['login'] and	$_POST['login'] !== 'admin' ){

                            $usercheck++;

                        } elseif ($_POST['login'] === 'admin') {	
                            
                            $admin++;

                        }

                        if ($_POST['password'] === $v['password'] and $_POST['password'] !== 'admin' ){

                            $usercheck++;

                                if ($usercheck === 2 ){

                                    $_SESSION['connected']=$_POST['login'];
                                    $_SESSION['login']=$_POST['login'];


                                    header( 'Location: profil.php');
                                }

                        }	elseif ($_POST['login'] === 'admin') {

                            $admin++;

                            if ($admin === 2){

                                $_SESSION['adminconnected']=$_POST['login'];

                                    header( 'Location: admin.php');
                            }
                        }
                    }	 

                }	else {	echo 'please insert your password'; }
            }	else { echo 'please insert your login name';}


                        if(	(isset($_POST['login']) === $v))	{
                        if(	(isset($_POST['password']) === $v))	{

                        	$_SESSION['connected'][]=$_POST['submit']; 

                            $_SESSION['login'][]=$_POST['login']; 

                            header('Location: profil.php');
                                    
                            }else {
                                echo '<a href="inscription.php">Subscribe to Log In</a>';
                                }
                        }

                            if ($_POST['login'] === 'admin' ) {
                            $admin++;
                         
                            } 
                            if ($_POST['password'] === 'admin' )  {	
                                        $admin++; 
                                        if( $admin === 2 ){
                                            header( 'Location: admin.php');
                                        }
                                    }


?>