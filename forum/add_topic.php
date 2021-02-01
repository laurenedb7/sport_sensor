<?php 
session_start();
include 'connectbdd.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<meta charset="utf-8">
	<link rel = "stylesheet" href = "forum.css"/>
</head>
<body>

	<?php

	$id_user = $_SESSION['id'];

	if(isset($_POST['topic'], $_POST['detail'], $_POST['choix_categorie'])) {
		$topic=htmlspecialchars($_POST['topic']);
		$detail=htmlspecialchars($_POST['detail']);
		$id_categorie=$_POST['choix_categorie'];

		if(!empty($topic) AND !empty($detail) AND !empty($id_categorie)) {


			$req = $bdd->prepare('INSERT INTO sujet(titreSujet, contenuSujet, id_categorie, id_user) VALUES(:topic, :detail, :categorie, :id_user)');
			$req->execute(array(
				'topic' => $topic,
				'detail' => $detail,
				'categorie' => $id_categorie,
				'id_user' => $id_user
				));

			$req->closeCursor();
			
			$req2 = $bdd->lastInsertId();
			header('Location: view_topic.php?id='.$req2);?>

	    <a href="create_topic.php">Retourner au formulaire</a>
	    <?php

		}
	    else 
	    {
	        echo "Tous les champs doivent être complétés !";?>
	        <a href="create_topic.php">Retourner au formulaire</a>
	        <?php
	    }
	}
	else 
	{
	    echo "Tous les champs doivent être complétés !";?>
	    <a href="create_topic.php">Retourner au formulaire</a>
	    <?php
	}


	?>
</body>
</html>
