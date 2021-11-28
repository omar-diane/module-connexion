<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="moduleconnexion.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
        </nav>
    </header>
    <?php
    session_start();
    require("config.php");
 
    if (!isset($_SESSION['id'])){
        header('Location: index.php');
        exit;
    }
 
    // On récupère les informations de l'utilisateur connecté
    $afficher_profil = $DB->query("SELECT * 
        FROM utilisateur 
        WHERE id = ?",
        array($_SESSION['id']));
    $afficher_profil = $afficher_profil->fetch();
 
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['modification'])){
            $login = htmlentities(trim($login));
            $nom = htmlentities(trim($nom));
            $prenom = htmlentities(trim($prenom));
            $password = htmlentities(strtolower(trim($password)));

            if(empty($login)){
                $valid = false;
                $er_login = "Il faut mettre un login"
            }
 
            if(empty($nom)){
                $valid = false;
                $er_nom = "Il faut mettre un nom";
            }
 
            if(empty($prenom)){
                $valid = false;
                $er_prenom = "Il faut mettre un prénom";
            }
 
            if(empty($password)){
                $valid = false;
                $er_password = "Il faut mettre un mot de passe";
 
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $login)){
                $valid = false;
                $er_login = "Le login n'est pas valide";
 
            }else{
                $req_login = $DB->query("SELECT login 
                    FROM utilisateur 
                    WHERE login = ?",
                    array($login));
                $req_login = $req_login->fetch();
 
                if ($req_login['login'] <> "" && $_SESSION['login'] != $req_login['login']){
                    $valid = false;
                    $er_login = "Ce login existe déjà";
                }
            }
 
            if ($valid){
 
                $DB->insert("UPDATE utilisateur SET login=?, prenom = ?, nom = ?, password = ? 
                    WHERE id = ?", 
                    array($login, $prenom, $nom, $password, $_SESSION['id']));
 
                $_SESSION['login'] = $login;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['password'] = $password;
 
                header('Location:  profil.php');
                exit;
            }   
        }
    }
?>

    <main>
        <form action="">
            <h1>Modifier mon Profil</h1>
        <input type="text" class="box-input" name="login" placeholder=" Nouveau login">
        <input type="text" class="box-input" name="name" placeholder="Nouveau nom">
        <input type="text" class="box-input" name="prenom" placeholder="Nouveau prénom">
        <input type="password" class="box-input" name="password" placeholder="Nouveau mot de passe">
        <input type="submit" value="Modifier" name="submit" class="box-button">
        </form>
    </main>
</body>
</html>