<?php
include("model/config.php");
?>

<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" 
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" type="text/css" href="messportifscoach.css" />
            <link rel="stylesheet" type="text/css" href="style/style-image.css" />
            <title>Mes sportifs</title>
    </head>

<?php 
include("view/header_coach.php"); 
include("view/menuCoach.php"); 
?>
    <body>

<?php

    // Récupère la recherche
    $recherche = $_POST['recherche'];
    $recup = htmlspecialchars($recherche);

    // la requete mysql
    $req = $bdd->prepare(
    "SELECT nomJoueur, prenomJoueur FROM joueur WHERE nomJoueur LIKE ? OR prenomJoueur LIKE ? LIMIT 10");

    $req->execute(array($_POST['recherche'],$_POST['recherche']));

    // affichage du résultat
    while($reponse = $req->fetch() ) {

       ?> 
       <div class="rep">
           <a href="statistiqueJoueur.php?$reponse['prenomJoueur']&$reponse['nomJoueur']"<?php echo '<br /> ' .$reponse['prenomJoueur'].' '.$reponse['nomJoueur'].'<br />'; ?> > 
        </div>

        <?php
   }



?>
    
    </body>
    
<?php include("view/footer.php") ?>

</html>