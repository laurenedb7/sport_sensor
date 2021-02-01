<?php 

    $valid =FALSE; 

if (isset($_POST['adresse'],$_POST['mdp'])){
    $adresse  = htmlspecialchars($_POST['adresse']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if (!empty($_POST['adresse']) AND !empty($_POST['mdp'])) {

        $reponseC  =  $bdd->prepare('SELECT idCoach, motDePasseCoach FROM coach WHERE mailCoach = ?');
        $reponseC -> execute(array($_POST['adresse']));
            while ($donneesC = $reponseC->fetch()){
                $isPasswordCorrect = password_verify($mdp, $donneesC['motDePasseCoach']);
                if ($isPasswordCorrect) {
                    $valid = TRUE; 
                    $_SESSION['profil']='coach';
                    $_SESSION['id']=$donneesC['idCoach'];
                    echo 'Bienvenue coach </br>';
                    header('Location:index_accueil.php');
                    }
            }
        $reponseC->closeCursor();

        $reponsesJ  =  $bdd->prepare('SELECT idJoueur, motDePasseJoueur FROM joueur WHERE mailJoueur = ?');
        $reponsesJ -> execute(array($_POST['adresse']));
            while ($donneesJ = $reponsesJ->fetch()){
                $isPasswordCorrect = password_verify($mdp, $donneesJ['motDePasseJoueur']);
                if ($isPasswordCorrect) {
                    $valid = TRUE;
                    $_SESSION['profil']='joueur';
                    $_SESSION['id']=$donneesJ['idJoueur'];
                    header('Location:index_accueil.php');
                }
            }
        $reponsesJ->closeCursor();

        $reponses  =  $bdd->prepare('SELECT idAdmin, motDePasseAdmin  FROM administrateur WHERE mailAdmin = ?');
        $reponses -> execute(array($_POST['adresse']));
            while ($donnees = $reponses->fetch()){
                $isPasswordCorrect = password_verify($mdp, $donnees['motDePasseAdmin']);
                if ($isPasswordCorrect) {
                    $valid = TRUE; 
                    echo 'Bienvenue Admin';
                    $_SESSION['profil']='admin';
                    $_SESSION['id']=$donnees['idAdmin'];
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
