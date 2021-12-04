<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="moduleconnexion.css">
</head>
<body class="main2">
<header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="connexion.php">Connexion</a>
            <a href="#">Inscription</a>
        </nav>
    </header>

    <?php
    require('config.php');
     
if (isset($_POST['submit']))
{
   /* on test si les champ sont bien remplis */
    if(!empty($_POST['login']) and !empty($_POST['prenom']) and !empty($_POST['nom']) and !empty($_POST['password']) and !empty($_POST['pass_conf']))
    {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['password']==$_POST['pass_conf'])
            {
                // On crypte le mot de passe
                $_POST['password']= md5($_POST['password']);
                //On créé la requête
                $sql = "INSERT INTO utilisateurs VALUES (login, preom, nom, password)";
            }
            else echo "Les mots de passe ne sont pas identiques";
        }
    }
?>
<main>
<form class="box" action="" method="POST">
    <h1 class="box-title">S'inscrire.</h1>
  <input type="text" class="box-input" name="login" 
  placeholder="Login" required />
  
    <input type="text" class="box-input" name="nom" 
  placeholder="Nom" required />
  
    <input type="text" class="box-input" name="prenom" 
  placeholder="Prénom" required />

  <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />

  <input type="password" class="box-input" name="pass_conf" 
  placeholder="Confirmation du mot de passe" required />


    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
  
    <p class="box-register">Déjà inscrit? 
  <a href="connexion.php">Connectez-vous ici</a></p>
</form>
</main>
</body>
</html>
