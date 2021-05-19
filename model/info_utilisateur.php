<?php
if(isset($_SESSION['id']) and $_SESSION['profil'] == 'joueur')
    {
    $requser = $bdd->prepare("SELECT * FROM joueur WHERE  idJoueur = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    }
if(isset($_SESSION['id']) and $_SESSION['profil'] == 'coach')
    {
    $requser = $bdd->prepare("SELECT * FROM coach WHERE  idCoach = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    }
if(isset($_SESSION['id']) and $_SESSION['profil'] == 'administrateur')
    {
    $requser = $bdd->prepare("SELECT * FROM joueur WHERE  idAdmin = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    }
?>