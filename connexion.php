<?php
session_start();
include("model/config.php") 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<title> Connexion </title>
 	<link rel="stylesheet" type="text/css" href="style/inscription_connexion.css"/>
</head>
<body>

<?php include("view/header_inscription.php") ?>
	
<?php include("view/connexion_formulaire.php") ?>

<?php include("model/connexion_traitement.php") ?>
             
<?php include("view/footer.php") ?>
	
</body>
</html>

