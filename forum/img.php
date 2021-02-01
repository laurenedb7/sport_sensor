<?php
include 'connectbdd.php';
$id = $_GET['id'];
$req = $bdd->prepare('SELECT pdp FROM (SELECT idAdmin AS id_user, nomAdmin AS nom_user, prenomAdmin AS prenom_user, photoAdmin AS pdp FROM administrateur UNION SELECT idCoach, nomCoach, prenomCoach, photoCoach FROM coach UNION SELECT idJoueur, nomJoueur, prenomJoueur, photoJoueur FROM joueur) AS u WHERE id_user = ?');
$req->execute(array($id));
$donnees = $req->fetch();
echo $donnees['pdp'];
?>