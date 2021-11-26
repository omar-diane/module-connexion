<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="moduleconnexion.css">
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['login'], $_REQUEST['name'], $_REQUEST['prenom'], $_REQUEST['password'])){
  // récupérer le login 
  $login = stripslashes($_REQUEST['login']);
  $login = mysqli_real_escape_string($conn, $login); 
  // récupérer le nom 
  $name = stripslashes($_REQUEST['name']);
  $name = mysqli_real_escape_string($conn, $name);
  //récupérer le prénom
  $prenom = stripslashes($_REQUEST['name']);
  $prenom = mysqli_real_escape_string($conn, $prenom);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  // récupérer le type (user | admin)
  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);

  $query = "INSERT into utilisateurs (login, name, prenom, password)
        VALUES ('$login', '$name', '$prenom', '".hash('sha256', $password)."')";

$res = mysqli_query($conn, $query);
if($res){
   echo "<div class='sucess'>
         <h3>L'utilisateur a été créée avec succés.</h3>
         <p>Cliquez <a href='index.php'>ici</a> pour retourner à la page d'accueil</p>
   </div>";
}
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Add user</h1>
  <input type="text" class="box-input" name="Login" placeholder="Login" required />
  
    <input type="text" class="box-input" name="name" placeholder="Nom" required />
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
</body>
</html>