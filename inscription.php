<form action="" method="post">
    <label>Login: <input type="text" name="login"/></label><br/>
    <label>Nom: <input type="text" name="nom"/></label><br/>
    <label>Prenom: <input type="text" name="prenom"/></label><br/>
    <label>Mot de passe: <input type="password" name="passe"/></label><br/>
    <label>Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
    <input type="submit" value="M'inscrire"/>
</form>

<?php

if(empty($_POST['login'])){
    mysqli_connect("localhost", "root","", "moduleconnexion");
    $passe = mysqli_real_escape_string(htmlspecialchars($_POST['passe']));
    $passe2 = mysqli_real_escape_string(htmlspecialchars($_POST['passe2']));
    if($passe ==$passe2){
        $login = mysqli_real_escape_string(htmlspecialchars($_POST['login']));
        $name = mysqli_real_escape_string(htmlspecialchars($_POST['nom']));
        $prenom = mysqli_real_escape_string(htmlspecialchars($_POST['prenom']));

        $passe = sha1($passe);

        mysqli_query("INSERT INTO utilisateurs VALUES ('$login', '$name', '$prenom', '$passe')");
    } else{
        echo 'Les mots de passe ne correspondent pas';
    }
}
?>