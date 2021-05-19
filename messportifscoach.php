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
<?php include("view/header_coach.php") ?>
<?php include("view/menuCoach.php") ?>

<section class='conteneur'>
    <div class="search">
        <form method="POST" action="traitementsportifscoach.php"> 
            Nom du joueur : <input type="text" name="recherche">
        <input type="SUBMIT" value="Recherche"> 
        </form>
    </div>
</section>
<?php include("view/footer.php") ?>

</body>

</html>

