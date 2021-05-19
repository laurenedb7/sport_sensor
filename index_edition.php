<?php
session_start();
include("model/config.php");

if (isset($_SESSION['profil'],$_SESSION['id']))
{
    if ($_SESSION['profil'] == 'coach')
    {  
        include("model/info_utilisateur.php");
        include("view/form_changement_coach.php");
    }
    if ($_SESSION['profil'] == 'joueur')
    {
        include("model/info_utilisateur.php");
        include("view/form_changement_joueur.php");
    }
    if ($_SESSION['profil'] == 'administrateur')
    {
        include("model/info_utilisateur.php");
        include("view/form_changement_administrateur.php");
    }
}


