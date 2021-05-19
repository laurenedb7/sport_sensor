<?php
session_start();
include("model/config.php");
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Mes sportifs</title>
        <link rel="stylesheet" type="text/css" href="messportifscoach.css" />
        <link rel="stylesheet" type="text/css" href="style/style-image.css" />
    </head>

<body>
<?php 
include("view/header_coach.php"); 
include("view/menuCoach.php"); 
?>

<section class='conteneur'>
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
               <a href="statistiqueJoueur.php?$reponse['prenomJoueur']&$reponse['nomJoueur']"<?php echo '<br /> ' .$reponse['prenomJoueur'].' '.$reponse['nomJoueur'].'<br />'; ?>> </a>
            </div>

            <?php
       }

    ?>
</section>
<?php include("view/footer.php") ?>
    
</body>
    

</html>