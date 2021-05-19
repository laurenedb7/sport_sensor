<?php include("model/config.php") ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<title>Inscription Administrateur</title>
 	<link rel="stylesheet" type="text/css" href="style/inscription_connexion.css"/>
</head>
<body>


<?php include("view/header_inscription.php") ?>

<div class="conteneur1">

	<?php include("view/iAdmin_formulaire.php") ?>

	<?php include("model/iAdmin_traitement.php") ?>
</div>

<?php include("view/footer.php") ?>


</body>
</html>
