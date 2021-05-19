<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<title> Inscription 2/2 </title>
 	<link rel="stylesheet" type="text/css" href="style/inscription_connexion.css"/>
</head>
	<body>
		
		<form method="post" action="iSportif.php" enctype="multipart/form-data">
		<fieldset><legend>Formulaire sportif</legend>
			<p>
				<p>
	                <input type="radio" name="sexe" value="Homme" id="homme" /> <label for="Homme"> Homme </label>
	                <input type="radio" name="sexe" value="Femme" id="femme" /> <label for="Femme"> Femme </label><br/>
            	</p>
				<label>Nom</label>
				<input type="text" name="nom"> </br>
				<label>Prénom</label>
				<input type="text" name="prenom"> </br>
				<label>Anniversaire </label>
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
				<label>Poids (en kg) </label>
				<input type="number" name="poids"> </br>
				<label>Taille (en cm) </label>
				<input type="number" name="taille"> </br>
				<label>Code équipe </label>
				<input type="number" name="code"> </br>
				<label>Photo de profil</label>
				<input type="file" name="pdp"> </br>
				<span class="envoie"><input type="submit" name="formsend" id="formsend" value="Envoyer" /></span>
			</p>
	
		</fieldset>
	</form>
</body>
</html>
