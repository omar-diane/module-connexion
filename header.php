<?php 

$utilcheck=0;
$admin=0;

if($utilcheck === 2){
   $_SESSION['connected']=$res[2];
} elseif ($admin === 2){
   $_SESSION['adconnected']= $_POST['login'];
}

   if(isset($_SESSION["adconnected"])){
      echo "<a href='admin.php'> Admin </a>";
      echo "<a href='logout.php'> Déconnexion </a>";
   } elseif (isset($_SESSION["connected"])) {
      echo "<a href='profil.php'> Mon profil </a>";
      echo "<a href='logout.php'> Déconnexion </a>";
   } else {
      echo"<a href='connexion.php'> Connexion </a>";
      echo"<a href='inscription.php'> Inscription </a>";
   }

   if(isset($_POST['logout'])){
   session_destroy();
   header("Location:connexion.php");
   }

?>