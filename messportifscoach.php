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

<?php include("view/header_coach.php") ?>
    
    <body>

        <div class="search">
            <form method="POST" action="traitementsportifscoach.php"> 
                Nom du joueur : <input type="text" name="recherche">
            <input type="SUBMIT" value="Recherche"> 
            </form>
        </div>
    </body>

<?php include("view/footer.php") ?>

</html>

