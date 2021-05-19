
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edition du Profil</title>
    <link rel="stylesheet" type="text/css" href="style/joueur.css"/>
</head>

<?php include("header_joueur.php") ?>
<body>
    <form method="POST" action="model/edition_joueur.php"> 
            <fieldset> 
               <label>Mail :</label>
               <input type="text" name="newmail" value="<?php echo $user['mailJoueur']; ?>" /> </br>
               <label>Mot de passe :</label>
               <input type="password" name="newmdp1"/></br>
               <label>Confirmation - mot de passe :</label>
               <input type="password" name="newmdp2" /></br>
               <label>Téléphone</label>
               <input type="tel" name="newtel" value="<?php echo $user['telephoneJoueur']?>"/></br>
               <label>Poids</label>
               <input type="float" name="newpoidsJoueur" value="<?php echo $user['poidsJoueur']; ?>" /></br>
               <label>Taille</label>
               <input type="float" name="newtailleJoueur" value="<?php echo $user['tailleJoueur']; ?>"/></br>
               <span class="envoie"><input type="submit" name="formsend" id="formsend" value="Envoyer" /></span>
            </fieldset>
    </form>
</body>

<?php include("footer.php") ?>


