<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
</head>
<body class='main'>
<header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="#">Connexion</a>
            <a href="inscription.php">Inscription</a>
        </nav>
    </header>
    <?php
    
    require('config.php');

    if(!empty($_POST['login'])&& !empty($_POST['password'])){
      $login = htmlspecialchars($_POST['login']);
      $password = htmlspecialchars($_POST['password']);

      $check = $conn->prepare('SELECT login, password, token FROM utilisateurs WHERE login = ?');
        $check->execute(array($login));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($login, FILTER_VALIDATE_LOGIN))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['user'] = $data['token'];
                    header('Location: profil.php');
                    die();
                }else{ header('Location: connexion.php?login_err=password'); die(); }
            }else{ header('Location: connexion.php?login_err=email'); die(); }
        }else{
          header('location: index.php');
        } // si le formulaire est envoyé sans aucune données
    ?>
<main>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="login" placeholder="Login">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? 
  <a href="inscription.php">S'inscrire</a>
</p>
</form>
</main>
<footer>
  <a href="#">Github</a>
</footer>
</body>
</html>