<?php

if(isset($_POST['formsend'])){ 
    extract($_POST);

    if(isset($_POST['sexe'], $_POST['nom'], $_POST['prenom'], $_POST['anniversaire'], $_POST['mail'], $_POST['cmail'], $_POST['mdp'], $_POST['cmdp'], $_POST['tel'], $_POST['nomEquipe'], $_POST['sportEquipe'], $_POST['codeEquipe'], $_FILES['pdp'])) {
        $sexeCoach = $_POST['sexe'];
        $nomCoach = htmlspecialchars($_POST['nom']);
        $prenomCoach = htmlspecialchars($_POST['prenom']);
        $anniversaireCoach = date('Y-m-d', strtotime($_POST['anniversaire']));
        $mdpCoach = password_hash($_POST['mdp'],PASSWORD_DEFAULT); // Hachage du mot de passe
        $cmdpCoach = password_hash($_POST['cmdp'],PASSWORD_DEFAULT); // Hachage du mot de passe
        $mailCoach = htmlspecialchars($_POST['mail']);
        $cmailCoach = htmlspecialchars($_POST['cmail']);
        $telCoach = htmlspecialchars($_POST['tel']);
        $nomEquipe = htmlspecialchars($_POST['nomEquipe']);
        $sportEquipe = htmlspecialchars($_POST['sportEquipe']);
        $codeEquipe = htmlspecialchars($_POST['codeEquipe']);

        if (!empty($_FILES['pdp']['name'])) {
            $pdp = file_get_contents ($_FILES['pdp']['tmp_name']);
        
            if(!empty($_POST['sexe']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['anniversaire']) AND !empty($_POST['mdp']) AND !empty($_POST['cmdp']) AND !empty($_POST['mail']) AND !empty($_POST['cmail']) AND !empty($_POST['tel']) AND !empty($_POST['nomEquipe']) AND !empty($_POST['sportEquipe']) AND !empty($_POST['codeEquipe'])) {

                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {

                    if($mailCoach == $cmailCoach) {

                        $reqmail = $bdd->prepare("SELECT * FROM coach WHERE mailCoach = ?");
                        $reqmail->execute(array($mailCoach));
                        $mailexist = $reqmail->rowCount();

                        if($mailexist == 0) {

                            if (preg_match("#(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[._@!?-])[A-Za-z0-9._@!?-]{8,15}#", $_POST['mdp'])) {

                                if($_POST['mdp'] == $_POST['cmdp']) {

                                    if (preg_match("#^0[0-9]{7}#", $_POST['tel'])) {

                                        if (preg_match("#[0-9]{5}#", $_POST['codeEquipe'])) {

                                            $verif_code = $bdd->prepare("SELECT idEquipe FROM equipe WHERE idEquipe = ?");
                                            $verif_code->execute(array($codeEquipe));
                                            $verif = $verif_code->fetch();

                                            if (!$verif) {

                                                $maxID = $bdd->query('SELECT MAX(id_user) AS maxid FROM (SELECT idAdmin AS id_user FROM administrateur UNION SELECT idCoach FROM coach UNION SELECT idJoueur FROM joueur) AS u');
                                                $maxid = $maxID->fetch();
                                                $max_id = (int)$maxid['maxid'];
                                                if ($max_id == 0){
                                                    $id_user=1;
                                                }
                                                else{
                                                $id_user = $max_id + 1;
                                                }
                                        
                                                $insert_coach = $bdd->prepare('INSERT INTO coach (idCoach, sexeCoach, nomCoach, prenomCoach, anniversaireCoach, mailCoach, motDePasseCoach, telephoneCoach, photoCoach) VALUES(:idCoach, :sexeCoach, :nomCoach, :prenomCoach, :anniversaireCoach, :mailCoach,  :motDePasseCoach, :telephoneCoach, :pdp)');
                                                $insert_coach->execute(array(
                                                    'idCoach' => $id_user,
                                                    'sexeCoach' => $sexeCoach,
                                                    'nomCoach' => $nomCoach,
                                                    'prenomCoach' => $prenomCoach,
                                                    'anniversaireCoach' => $anniversaireCoach,
                                                    'mailCoach' => $mailCoach,
                                                    'motDePasseCoach' => $mdpCoach,
                                                    'telephoneCoach' => $telCoach,
                                                    'pdp' => $pdp
                                                ));

                                                
                                                $insert_equipe = $bdd->prepare("INSERT INTO equipe (idEquipe, nomEquipe, sportEquipe, id_user) VALUES (:idEquipe, :nomEquipe, :sportEquipe, :id_user)");
                                                $insert_equipe->execute(array(
                                                    'idEquipe' => $codeEquipe,
                                                    'nomEquipe' => $nomEquipe,
                                                    'sportEquipe' => $sportEquipe,
                                                    'id_user' => $id_user
                                                ));

                                                echo "Vous avez bien été inscrit !";
                                                header("Location:connexion.php");
                                            }
                                            else
                                            {
                                                echo "Votre code d'équipe est déjà utilisé";
                                            }
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