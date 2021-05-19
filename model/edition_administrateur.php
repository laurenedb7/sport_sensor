<?php
session_start();
include("model/config.php");


if(isset($_SESSION['id'])) 
{
   $requser = $bdd->prepare("SELECT * FROM administrateur WHERE idAdmin = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();

   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mailAdmin']) 
   {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE administrateur SET mailAdmin = ? WHERE idAdmin = ?");
      $insertmail->execute(array($newmail,$_SESSION['id']));
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) 
      {
      $mdp1 = $_POST['newmdp1'];
      $mdp2 = $_POST['newmdp2'];
      if($mdp1 == $mdp2) 
         {
        $mdp1= password_hash($mdp1,PASSWORD_DEFAULT);
        $mdp2= password_hash($mdp2,PASSWORD_DEFAULT);
        $insertmdp = $bdd->prepare("UPDATE administrateur SET motDePasseAdmin = ? WHERE idAdmin = ?");
        $insertmdp->execute(array($mdp1,$_SESSION['id']));
         } 
      }
      else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   if(isset($_POST['newtel']) AND !empty($_POST['newtel']) AND $_POST['newtel'] != $user['telephoneAdmin']) 
      {
         $newtel = htmlspecialchars($_POST['newtel']);
         $inserttel = $bdd->prepare("UPDATE administrateur SET telephoneAdmin = ? WHERE iAdmin = ?");
         $inserttel->execute(array($newtel, $_SESSION['id']));
      }
   header("Location:../index_edition.php");
   }
else {
    header("Location:connexion.php");
 }

 ?>