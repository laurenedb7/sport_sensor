<?php

if(isset($_POST['formsend'])){ 
    extract($_POST);

    if(isset($_POST['sexe'], $_POST['nom'], $_POST['prenom'], $_POST['anniversaire'], $_POST['mail'],$_POST['cmail'], $_POST['mdp'], $_POST['cmdp'], $_POST['tel'], $_POST['poids'], $_POST['taille'], $_POST['code'])) {
        $sexeJoueur = $_POST['sexe'];
        $nomJoueur = htmlspecialchars($_POST['nom']);
        $prenomJoueur = htmlspecialchars($_POST['prenom']);
        $anniversaireJoueur = date('Y-m-d', strtotime($_POST['anniversaire']));
        $mdpJoueur = password_hash($_POST['mdp'],PASSWORD_DEFAULT); // Hachage du mot de passe
        $cmdpJoueur = password_hash($_POST['cmdp'],PASSWORD_DEFAULT); // Hachage du mot de passe
        $mailJoueur = htmlspecialchars($_POST['mail']);
        $cmailJoueur = htmlspecialchars($_POST['cmail']);
        $telJoueur = htmlspecialchars($_POST['tel']);
        $poidsJoueur = htmlspecialchars($_POST['poids']);
        $tailleJoueur = htmlspecialchars($_POST['taille']);
        $codeJoueur = htmlspecialchars($_POST['code']);

        if (!empty($_FILES['pdp']['name'])) {
            $pdp = file_get_contents ($_FILES['pdp']['tmp_name']);

            if(!empty($_POST['sexe']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['anniversaire']) AND !empty($_POST['mail']) AND !empty($_POST['cmail']) AND !empty($_POST['mdp']) AND !empty($_POST['cmdp'])  AND !empty($_POST['tel']) AND !empty($_POST['poids']) AND !empty($_POST['taille']) AND !empty($_POST['code'])) {

                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {

                    if($mailJoueur == $cmailJoueur) {

                        $reqmail = $bdd->prepare("SELECT * FROM joueur WHERE mailJoueur = ?");
                        $reqmail->execute(array($mailJoueur));
                        $mailexist = $reqmail->rowCount();

                        if($mailexist == 0) {

                            if (preg_match("#(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[._@!?-])[A-Za-z0-9._@!?-]{8,15}#", $_POST['mdp'])) {
                                
                                if($_POST['mdp'] == $_POST['cmdp']) {

                                    if (preg_match("#^0[0-9]{7}#", $_POST['tel'])) {

                                        $list_equipe = $bdd->prepare('SELECT idEquipe, nomEquipe, sportEquipe FROM equipe WHERE idEquipe = ?');
                                        $list_equipe->execute(array($codeJoueur));
                                        $IDequipe = $list_equipe->fetch();
                                        $id_equipe = (int)$IDequipe['idEquipe'];
                                        $nomEquipe = $IDequipe['nomEquipe'];
                                        $sportEquipe = $IDequipe['sportEquipe'];

                                        if ($codeJoueur == $id_equipe) {

                                            $maxID = $bdd->query('SELECT MAX(id_user) AS maxid FROM (SELECT idAdmin AS id_user FROM administrateur UNION SELECT idCoach FROM coach UNION SELECT idJoueur FROM joueur) AS u');
                                            $maxid = $maxID->fetch();
                                            $max_id = (int)$maxid['maxid'];
                                            if ($max_id == 0){
                                                $id_user=1;
                                            }
                                            else{
                                                $id_user = $max_id + 1;
                                            }

                                            $insert_joueur = $bdd->prepare("INSERT INTO joueur (idJoueur, sexeJoueur, nomJoueur, prenomJoueur, mailJoueur, telephoneJoueur, motDePasseJoueur, anniversaireJoueur, poidsJoueur, tailleJoueur, photoJoueur) VALUES(:idJoueur, :sexeJoueur, :nomJoueur, :prenomJoueur, :mailJoueur, :telephoneJoueur, :motDePasseJoueur, :anniversaireJoueur, :poidsJoueur, :tailleJoueur, :pdp)");
                                            $insert_joueur->execute(array(
                                                'idJoueur' => $id_user,
                                                'sexeJoueur' => $sexeJoueur,
                                                'nomJoueur' => $nomJoueur,
                                                'prenomJoueur' => $prenomJoueur,
                                                'mailJoueur' => $mailJoueur,
                                                'telephoneJoueur' => $telJoueur, 
                                                'motDePasseJoueur' => $mdpJoueur,
                                                'anniversaireJoueur' => $anniversaireJoueur,
                                                'poidsJoueur' => $poidsJoueur, 
                                                'tailleJoueur' => $tailleJoueur,
                                                'pdp' => $pdp
                                            ));


                                            $insert_joueur_equipe = $bdd->prepare('INSERT INTO equipe (idEquipe, nomEquipe, sportEquipe, id_user) VALUES (:idEquipe, :nomEquipe, :sportEquipe, :id_user)');
                                            $insert_joueur_equipe->execute(array(
                                                'idEquipe' => $codeJoueur,
                                                'nomEquipe' => $nomEquipe,
                                                'sportEquipe' => $sportEquipe,
                                                'id_user' => $id_user
                                            ));

                                            echo "Vous avez bien été inscrit ! ";
                                            header("Location:connexion.php");
                                        }

                                        else
                                        {
                                            echo "Votre code d'équipe n'est pas valide";
                                        }

                                    }
                                    else
                                    {
                                        echo "Votre téléphone n'est pas valide !";
                                    }
                                }
                                else
                                {
                                    echo "Vos mots de passes ne correspondent pas !";
                                } 
                            }
                            else 
                            {
                                echo "Votre mot de passe n'est pas assez sécurisé !";
                            }    
                        }
                        else 
                        {
                            echo "Adresse mail déjà utilisée !";
                        }
                    }
                    else 
                    {
                        echo "Vos adresses mail ne correspondent pas !";
                    }
                }
                else 
                {     
                    echo "Votre adresse mail n'est pas valide !";
                }
            }
            else 
            {
                echo "Tous les champs doivent être complétés !";
            }
        }
        else 
        {
            echo "Tous les champs doivent être complétés !";
        }
    }
    else
    {
        echo "Ca n'existe pas";
    }
}

?>