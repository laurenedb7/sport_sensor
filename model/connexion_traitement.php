<?php 

    $valid =FALSE; 

if (isset($_POST['adresse'],$_POST['mdp'])){
    $adresse  = htmlspecialchars($_POST['adresse']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if (!empty($_POST['adresse']) AND !empty($_POST['mdp'])) {

        $reponseC  =  $bdd->prepare('SELECT a.idCoach, a.sexeCoach, a.nomCoach, a.prenomCoach, a.motDePasseCoach, a.anniversaireCoach, a.mailCoach, a.telephoneCoach, a.photoCoach, e.idEquipe, e.nomEquipe, e.sportEquipe
            FROM coach a
            INNER JOIN equipe e
            ON a.idCoach = e.id_user
            WHERE a.mailCoach = ?');
        $reponseC -> execute(array($_POST['adresse']));
            while ($donneesC = $reponseC->fetch()){
                $isPasswordCorrect = password_verify($mdp, $donneesC['motDePasseCoach']);
                if ($isPasswordCorrect) {
                    $valid = TRUE; 
                    $_SESSION['profil']='coach';
                    $_SESSION['id']=$donneesC['idCoach'];
                    $_SESSION['sexe']=$donneesC['sexeCoach'];
                    $_SESSION['nom']=$donneesC['nomCoach'];
                    $_SESSION['prenom']=$donneesC['prenomCoach'];
                    $_SESSION['mdp']=$donneesC['motDePasseCoach'];
                    $_SESSION['anniv']=$donneesC['anniversaireCoach'];
                    $_SESSION['mail']=$donneesC['mailCoach'];
                    $_SESSION['tel']=$donneesC['telephoneCoach'];
                    $_SESSION['pdp']=$donneesC['photoCoach'];
                    $_SESSION['idEquipe']=$donneesC['idEquipe'];
                    $_SESSION['nomEquipe']=$donneesC['nomEquipe'];
                    $_SESSION['sportEquipe']=$donneesC['sportEquipe'];
                    echo 'Bienvenue coach </br>';
                    header('Location:index_accueil.php');
                    }
            }
        $reponseC->closeCursor();


        $reponseJ  =  $bdd->prepare('SELECT a.idJoueur, a.sexeJoueur, a.nomJoueur, a.prenomJoueur, a.motDePasseJoueur, a.anniversaireJoueur, a.mailJoueur, a.telephoneJoueur, a.photoJoueur, a.poidsJoueur, a.tailleJoueur, e.idEquipe, e.nomEquipe, e.sportEquipe
            FROM joueur a
            INNER JOIN equipe e
            ON a.idJoueur = e.id_user
            WHERE a.mailJoueur = ?');
        $reponseJ -> execute(array($_POST['adresse']));
            while ($donneesJ = $reponseJ->fetch()){
                $isPasswordCorrect = password_verify($mdp, $donneesJ['motDePasseJoueur']);
                if ($isPasswordCorrect) {
                    $valid = TRUE;
                    $_SESSION['profil']='joueur';
                    $_SESSION['id']=$donneesJ['idJoueur'];
                    $_SESSION['sexe']=$donneesJ['sexeJoueur'];
                    $_SESSION['nom']=$donneesJ['nomJoueur'];
                    $_SESSION['prenom']=$donneesJ['prenomJoueur'];
                    $_SESSION['mdp']=$donneesJ['motDePasseJoueur'];
                    $_SESSION['mail']=$donneesJ['mailJoueur'];
                    $_SESSION['tel']=$donneesJ['telephoneJoueur'];
                    $_SESSION['anniv']=$donneesJ['anniversaireJoueur'];
                    $_SESSION['poids']=$donneesJ['poidsJoueur'];
                    $_SESSION['taille']=$donneesJ['tailleJoueur'];
                    $_SESSION['pdp']=$donneesJ['photoJoueur'];
                    $_SESSION['idEquipe']=$donneesJ['idEquipe'];
                    $_SESSION['nomEquipe']=$donneesJ['nomEquipe'];
                    $_SESSION['sportEquipe']=$donneesJ['sportEquipe'];
                    header('Location:index_accueil.php');
                }
            }
        $reponseJ->closeCursor();

        $reponses  =  $bdd->prepare('SELECT * FROM administrateur WHERE mailAdmin = ?');
        $reponses -> execute(array($_POST['adresse']));
            while ($donnees = $reponses->fetch()){
                $isPasswordCorrect = password_verify($mdp, $donnees['motDePasseAdmin']);
                if ($isPasswordCorrect) {
                    $valid = TRUE; 
                    echo 'Bienvenue Admin';
                    $_SESSION['profil']='admin';
                    $_SESSION['id']=$donnees['idAdmin'];
                    $_SESSION['sexe']=$donnees['sexeAdmin'];
                    $_SESSION['nom']=$donnees['nomAdmin'];
                    $_SESSION['prenom']=$donnees['prenomAdmin'];
                    $_SESSION['mdp']=$donnees['motDePasseAdmin'];
                    $_SESSION['mail']=$donnees['mailAdmin'];
                    $_SESSION['tel']=$donnees['telephoneAdmin'];
                    $_SESSION['codeAdmin']=$donnees['codeAdmin'];
                    $_SESSION['pdp']=$donnees['photoAdmin'];
                    header('Location:index_accueil.php');
                }
                
            }
        $reponses->closeCursor();

        if (!$valid){
            echo 'vous n\'êtes pas inscrit ou bien vous avez commis une erreur lors de l\'entrée d\'un champs';
        }    
    }
    else {
        echo 'Veuillez remplir tout les champs ';
    }
}

?>
