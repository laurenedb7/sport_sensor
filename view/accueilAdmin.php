<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Page d'accueil admin</title>
    <link rel="stylesheet" type="text/css" href="style/admin.css"/>
</head>

<body>

<?php include("view/header_admin.php") ?>

<?php include("view/menuAdmin.php") ?>


<section class="conteneur">

    <h1><?php echo($user['prenomAdmin'])?> <?php echo($user['nomAdmin'])?></h1>

    <article>

        <ul>
            <li>Nom : <?php echo($user['nomAdmin']) ?></li>
            <li>Prénom : <?php echo($user['prenomAdmin']) ?></li>
            <li>Mail : <?php echo($user['mailAdmin']) ?></li>
            <li>Téléphone : <?php echo($user['telAdmin']) ?></li>
        </ul>

<?php include("view/footer.php") ?>


</body>
</html>