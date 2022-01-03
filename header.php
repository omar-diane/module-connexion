<?php 



   if($_SESSION["adconnected"]=='admin'){
      echo "<a href='admin.php'> Page admin </a>";
   } elseif (isset($_SESSION["connected"])){
      echo "<a href='profil.php'> Profil </a>";
   } else {
      echo "<a href='inscription.php'> Inscription </a>";
   }

   if(isset($_SESSION["connected"])){
   echo "<a href='logout.php'> Déconnexion </a>";
   } else {
   echo "<a href='connexion.php'> Connexion </a>";
   }

   if(isset($_POST['logout'])){
   session_destroy();
   header("Location:index.php");
   }
?>