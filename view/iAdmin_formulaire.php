<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<title>Inscription Administrateur</title>
 	<link rel="stylesheet" type="text/css" href="style/inscription_connexion.css"/>
</head>
	<body>
        
		<form method="post" enctype="multipart/form-data">
		<fieldset><legend>Inscription Administrateur</legend>
			<p>
				<p>
	                <input type="radio" name="sexe" value="Homme" id="homme" /> <label for="Homme"> Homme </label>
	                <input type="radio" name="sexe" value="Femme" id="femme" /> <label for="Femme"> Femme </label><br/>
            	</p>
				<label>Nom</label>
				<input type="text" name="nom"> </br>
				<label>Prénom</label>
				<input type="text" name="prenom"> </br>
	            <hr>
	            <label>Mail</label>
				<input type="mail" name="mail"> </br>
				<label>Confirmation mail</label>
	            <input type="mail" name="cmail"> </br>
	            <hr>
				<label>Mot de passe</label>
				<input type="password" name="mdp"> </br>
	            <label>Confirmation mot de passe</label>
	            <input type="password" name="cmdp"> </br>
	            <hr>
				<label>Téléphone </label>
				<input type="tel" name="tel"> </br>
	            <label>Code Administrateur </label>
	            <input type="text" name="code"> </br>
	            <label>Photo de profil</label>
				<input type="file" name="pdp"> </br>
				<span class="envoie"><input type="submit" name="formsend" id="formsend" value="Envoyer" /></span>
			</p>
			
		</fieldset>
        </form>
    </body>
</html>
