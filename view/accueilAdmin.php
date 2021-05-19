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

    <h1><?php echo($_SESSION['prenom'])?> <?php echo($_SESSION['nom'])?></h1>

    <article>

        <ul>
            <li>Nom : <?php echo($_SESSION['nom']) ?></li>
            <li>Prénom : <?php echo($_SESSION['prenom']) ?></li>
            <li>Mail : <?php echo($_SESSION['mail']) ?></li>
            <li>Téléphone : <?php echo($_SESSION['tel']) ?></li>
        </ul>
    </article>
</section>

<?php include("view/footer.php") ?>


</body>
</html>