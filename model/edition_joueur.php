
<?php 
session_start();
$_SESSION['profil']='joueur';
$_SESSION['id'] = 1;

include("config.php");


if(isset($_SESSION['id'])) 
{
   $requser = $bdd->prepare("SELECT * FROM joueur WHERE idJoueur = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();

   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mailJoueur']) 
   {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE joueur SET mailJoueur = ? WHERE idJoueur = ?");
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
        $insertmdp = $bdd->prepare("UPDATE joueur SET motDePasseJoueur = ? WHERE idJoueur = ?");
        $insertmdp->execute(array($mdp1,$_SESSION['id']));
        echo("ok ! (1) ");
         } 
      }
      else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   if(isset($_POST['newpoidsJoueur']) AND !empty($_POST['newpoidsJoueur']) AND $_POST['newpoidsJoueur'] != $user['poidsJoueur'])
      {
        $newpoidsJoueur = htmlspecialchars($_POST['newpoidsJoueur']);
        $insertpoids = $bdd->prepare("UPDATE joueur SET poidsJoueur = ? WHERE idJoueur = ?");
        $insertpoids->execute(array($newpoidsJoueur, $_SESSION['id']));
      }
   if(isset($_POST['newtailleJoueur']) AND !empty($_POST['newtailleJoueur']) AND $_POST['newtailleJoueur'] != $user['tailleJoueur']) 
      {
        $newtailleJoueur = htmlspecialchars($_POST['newtailleJoueur']);
        $inserttaille = $bdd->prepare("UPDATE joueur SET tailleJoueur = ? WHERE idJoueur = ?");
        $inserttaille->execute(array($newtailleJoueur, $_SESSION['id']));

      }
   if(isset($_POST['newtel']) AND !empty($_POST['newtel']) AND $_POST['newtel'] != $user['telephoneJoueur']) 
   {
         $newtel = htmlspecialchars($_POST['newtel']);
         $inserttel = $bdd->prepare("UPDATE joueur SET telephoneJoueur = ? WHERE idJoueur = ?");
         $inserttel->execute(array($newtel, $_SESSION['id']));
      }
   header("Location:../index_edition.php");
   }
else {
    echo('nope');
 }

 ?>



