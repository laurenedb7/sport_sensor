<?php 
session_start();
include 'connectbdd.php';
?>

<?php
if(isset($_POST['contenuMessage']) AND !empty($_POST['contenuMessage'])) {
	$id=$_POST['id'];
	$id_user = $_SESSION['id'];
	$a_answer=htmlspecialchars($_POST['contenuMessage']);

	// Insert answer
	$req = $bdd->prepare('INSERT INTO message(contenuMessage, id_sujet, id_user) VALUES(:contenuMessage, :id, :id_user)');
	$req->execute(array(
		'contenuMessage' => $a_answer,
		'id' => $id,
		'id_user' => $id_user
		));
	$req->closeCursor();
	header('Location: view_topic.php?id='.$id);
}
else {
	header("location:".  $_SERVER['HTTP_REFERER']);
}

?>