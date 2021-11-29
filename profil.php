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
    require('config.php');

    if(isset($_SESSION['connected'])){
        $co_user = $_SESSION['connected'];

        $sql = "SELECT * FROM 'utilisateurs' WHERE 'login' = '$co_user'";
        $query = $conn->query($sql);
        $user = $query->fetch_all();

        $sql = "SELECT * FROM 'utilisateurs'";
        $query = $conn->query($sql);
        $users = $query->fetch_all();

        $login = $user[0][1];
        $prenom = $user[0][2];
        $nom = $user[0][3];
        $password = $user[0][4];
    }
    ?>
    <main>
            <h1>Modifier mon Profil</h1>
        <input type="text" class="box-input" name="login" placeholder=" Nouveau login">
        <input type="text" class="box-input" name="name" placeholder="Nouveau nom">
        <input type="text" class="box-input" name="prenom" placeholder="Nouveau prénom">
        <input type="password" class="box-input" name="password" placeholder="Nouveau mot de passe">
        <input type="submit" value="Modifier" name="submit" class="box-button">
        </form>
    </main>

    <?php

    if($_POST['submit']=='Envoyer'){
        if($login == NULL && $prenom == NULL){}
        else {
            $login = $_POST['login'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['name'];
            if($login == NULL){
                $_SESSION['update'] = 0;
            }
            if($prenom == NULL){
                $_SESSION['update'] = 0;
            }
            if($nom == NULL){
                $_SESSION['update'] = 0;
                $_SESSION['update'] = 3;
            }
            else {
                foreach($users as $users){
                    if(isset($_POST["login"]) && $_POST["login"] == $users[1] && $_POST["login"] !=$user[0][1]){
                        $taken = 1;
                        $_SESSION['update'] = 0;
                    }
                }
                if($taken == false){
                    $u_login = $user[0][1];
                    $sql = "UPDATE 'utilisateurs' SET prenom = '$prenom,login = '$login', nom='$nom' WHERE login = '$u_login'";
                    $query = $conn->query($sql);
                    $_SESSION['connected'] = $login;
                    header("Location: profil.php");
                    $_SESSION['update'] = 1;
                }
            }
        }
    }
    ?>
</body>
</html>