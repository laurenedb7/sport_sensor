<?php
session_start();
include("model/config.php");

if (isset($_SESSION['profil'],$_SESSION['id']))
{
    if ($_SESSION['profil'] == 'coach')
    {  
        include("view/accueilCoach.php");
    }
    elseif ($_SESSION['profil'] == 'joueur')
    {
        include("view/accueilJoueur.php");
    }
    elseif ($_SESSION['profil'] == 'admin')
    {
        include("view/accueilAdmin.php");
    }
}
?>