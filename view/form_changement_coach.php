<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edition du Profil</title>
    <link rel="stylesheet" type="text/css" href="style/coach.css"/>
</head>
<?php include("header_coach.php") ?>
<body>
    <form method="POST" action="model/edition_coach.php"> 
      <fieldset>
               <label>Mail :</label>
               <input type="text" name="newmail" value="<?php echo $user['mailCoach']; ?>" /><br />
               <label>Mot de passe :</label>
               <input type="password" name="newmdp1"/><br />
               <label>Confirmation - mot de passe :</label>
               <input type="password" name="newmdp2" /><br />
               <label>Téléphone</label>
               <input type="tel" name="newtel" value="<?php echo $user['telephoneCoach']?>"/><br />
               <span class="envoie"><input type="submit" name="formsend" id="formsend" value="Envoyer" /></span>
      </fieldset>
</body>

<?php include("footer.php") ?>

