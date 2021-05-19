<?php

if(isset($_POST['formsend'])){ 
    extract($_POST);

    if(isset($_POST['sexe'], $_POST['nom'], $_POST['prenom'], $_POST['mail'],$_POST['cmail'], $_POST['mdp'], $_POST['cmdp'], $_POST['tel'], $_POST['code'])) {
        $sexeAdmin = $_POST['sexe'];
        $nomAdmin = htmlspecialchars($_POST['nom']);
        $prenomAdmin = htmlspecialchars($_POST['prenom']);
        $mdpAdmin = password_hash($_POST['mdp'],PASSWORD_DEFAULT); // Hachage du mot de passe
        $cmdpAdmin = password_hash($_POST['cmdp'],PASSWORD_DEFAULT); // Hachage du mot de passe
        $mailAdmin = htmlspecialchars($_POST['mail']);
        $cmailAdmin = htmlspecialchars($_POST['cmail']);
        $telAdmin = htmlspecialchars($_POST['tel']);
        $codeAdmin = htmlspecialchars($_POST['code']);

         if (!empty($_FILES['pdp']['name'])) {
            $pdp = file_get_contents ($_FILES['pdp']['tmp_name']);

            if(!empty($_POST['sexe']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp']) AND !empty($_POST['cmdp']) AND !empty($_POST['mail']) AND !empty($_POST['cmail']) AND !empty($_POST['tel']) AND !empty($_POST['code'])) {

                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {

                    if($mailAdmin == $cmailAdmin) {

                        $reqmail = $bdd->prepare("SELECT * FROM administrateur WHERE mailAdmin = ?");
                        $reqmail->execute(array($mailAdmin));
                        $mailexist = $reqmail->rowCount();

                        if($mailexist == 0) {

                            if (preg_match("#(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[._@!?-])[A-Za-z0-9._@!?-]{8,15}#", $_POST['mdp'])) {
                                
                                if($_POST['mdp'] == $_POST['cmdp']) {

                                    if (preg_match("#^0[0-9]{7}#", $_POST['tel'])) {

                                        if (preg_match("#[0-9]{5}#", $_POST['code'])) {

                                            $maxID = $bdd->query('SELECT MAX(id_user) AS maxid FROM (SELECT idAdmin AS id_user FROM administrateur UNION SELECT idCoach FROM coach UNION SELECT idJoueur FROM joueur) AS u');
                                            $maxid = $maxID->fetch();
                                            $max_id = (int)$maxid['maxid'];
                                            if ($max_id == 0){
                                                $id_user=1;
                                            }
                                            else{
                                                $id_user = $max_id + 1;
                                            }

                                            $insert_admin = $bdd->prepare("INSERT INTO administrateur (idAdmin, sexeAdmin, nomAdmin, prenomAdmin, motDePasseAdmin, mailAdmin, telephoneAdmin, codeAdmin, photoAdmin) VALUES(:idAdmin, :sexeAdmin, :nomAdmin, :prenomAdmin, :motDePasseAdmin, :mailAdmin, :telephoneAdmin, :codeAdmin, :pdp)");
                                            $insert_admin->execute(array(
                                                'idAdmin' => $id_user,
                                                'sexeAdmin' => $sexeAdmin,
                                                'nomAdmin' => $nomAdmin,
                                                'prenomAdmin' => $prenomAdmin,
                                                'motDePasseAdmin' => $mdpAdmin,
                                                'mailAdmin' => $mailAdmin,
                                                'telephoneAdmin' => $telAdmin, 
                                                'codeAdmin' => $codeAdmin,
                                                'pdp' => $pdp
                                            ));

                                            echo "Vous avez bien été inscrit !";
                                            header("Location:connexion.php");
                                        }

                                        else
                                        {
                                            echo "Votre code d'administrateur n'est pas valide";
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
                                echo "Votre mot de passe n'est pas assez sécurisé ! Veuillez rentrer au moins une lettre majuscule, une lettre miniscule, un chiffre et un caractère spécial.";
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