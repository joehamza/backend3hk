<?php
session_start();
if(isset($_POST["password"])){
$password=$_POST["password"];
if($password=="123" ){
@$_SESSION["auto"]="oui";
header("location:https://apibacken3hk.herokuapp.com");
$_SESSION["mauv"]="premier test";
}
else{echo"Mauvais mot de passe";}
}
?>
<html>
<style>
.inp{
font-size:20px;
}
</style>
<center>
<br><br><br><br><br>
<h1>Formulaire de saisie du mot de passe</h1>
<div style="font-size:30px;">
<form  method="post">
Votre mot de passe    : <input type="password" size="10" name="password" class="inp" autofocus><p>
<input type="submit" class="inp" name="submit" value="Valider"> 
</form>
</div>
</center>
</html>
