<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
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
            <?php include "header.php"; ?>
        </nav>
    </header>

    <?php
    require('config.php');
$id=$_SESSION['connected'];
    $query="SELECT * FROM utilisateurs WHERE id='$id'";
    $req=mysqli_query($conn,$query);
    $res=mysqli_fetch_all($req,MYSQLI_ASSOC);

    ?>
   
    <main>
    <form class="box" action="" method="post">
<h1 class="box-title">Modifier mon profil</h1>
<input type="text" class="box-input" name="login" value="<?php echo $res[0]['login'];?>">
<input type="text" class="box-input" name="prenom" value="<?php echo $res[0]['prenom']; ?>">
<input type="text" class="box-input" name="nom" value="<?php echo$res[0]['nom'];?>">
<input type="password" class="box-input" name="password" value="<?php echo$res[0]['password'];?>">
<input type="submit" value="Modifier " name="submit" class="box-button">
</form>
<?php


if(!empty($_POST['login'])and
   !empty($_POST['prenom'])and
   !empty($_POST['nom'])and
   !empty($_POST['password'])){

       if(isset($_POST['submit'])){
        $login = $_POST['login'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];
        
        $sql = "UPDATE utilisateurs SET login='$login', prenom='$prenom', nom='$nom', password='$password' WHERE id='$id'";
        $req=mysqli_query($conn,$sql);
       }
   }
?>
    </main>
    
</body>
</html>