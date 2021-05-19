<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<title> Inscription 2/2 </title>
 	<link rel="stylesheet" type="text/css" href="style/inscription_connexion.css"/>
</head>
	<body>
		
		<form method="post" action="iCoach.php" enctype="multipart/form-data">
		<fieldset><legend>Formulaire Coach</legend>
			<p>
				<p>
	                <input type="radio" name="sexe" value="Homme" id="homme" /> <label for="Homme"> Homme </label>
	                <input type="radio" name="sexe" value="Femme" id="femme" /> <label for="Femme"> Femme </label><br/>
            	</p>
				<label>Nom</label>
				<input type="text" name="nom"> </br>
				<label>Prénom</label>
				<input type="text" name="prenom"> </br>
				<label>Anniversaire</label>
				<input type="date" name="anniversaire"> </br>
				<label>Mail</label>
				<input type="mail" name="mail"> </br>
				<label>Confirmation mail</label>
				<input type="mail" name="cmail"> </br>
				<label>Mot de passe</label>
				<input type="password" name="mdp"> </br>
				<label>Confirmation mot de passe</label>
				<input type="password" name="cmdp"> </br>
				<label>Téléphone </label>
				<input type="tel" name="tel"> </br>
				<label>Nom de l'équipe</label>
				<input type="text" name="nomEquipe"> </br>
				<label>Sport de l'équipe</label>
				<input type="text" name="sportEquipe"> </br>
				<label>Code d'accès</label>
				<input type="number" name="codeEquipe"> </br>
				<label>Photo de profil</label>
				<input type="file" name="pdp"> </br>
				<span class="envoie"><input type="submit" name="formsend" id="formsend" value="Envoyer" /></span>
			</p>
		</fieldset>	
		</form>



	</body>
</html>
