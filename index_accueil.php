<?php
session_start();
include("model/config.php");

if (isset($_SESSION['profil'],$_SESSION['id']))
{
    if ($_SESSION['profil'] == 'coach')
    {  
        include("model/info_utilisateur.php");
        include("view/accueilCoach.php");
    }
    if ($_SESSION['profil'] == 'joueur')
    {
        include("model/info_utilisateur.php");
        include("view/accueilJoueur.php");
    }
    if ($_SESSION['profil'] == 'admin')
    {
        include("model/info_utilisateur.php");
        include("view/accueilAdmin.php");
    }
}