<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<meta charset="utf-8">
	<link rel = "stylesheet" href = "style/forum.css"/>
</head>
<body>
	<?php include 'model/config.php'; ?>
	<?php
	if (isset($_SESSION['profil'],$_SESSION['id']))
	{
	    if ($_SESSION['profil'] == 'coach')
	    {  
	        include("view/header_coach.php");
			include("view/menuCoach.php");
	    }
	    elseif ($_SESSION['profil'] == 'joueur')
	    {
	        include("view/header_joueur.php");
			include("view/menuJoueur.php");
	    }
	    elseif ($_SESSION['profil'] == 'admin')
	    {
	        include("view/header_admin.php");
			include("view/menuAdmin.php");
	    }
	}
	?>
	<?php
	$id_user = $_SESSION['id'];

	$req = $bdd->query('SELECT s.idSujet, s.titreSujet, s.contenuSujet, DATE_FORMAT(s.dateHeureSujet, "%d/%m/%Y %H:%i:%s") AS dateHeureSujet, s.id_user, c.nomCategorie, u.nom_user, u.prenom_user, ( SELECT COUNT(*) FROM message m WHERE m.id_sujet = s.idSujet) AS nb_reponses
		FROM sujet s 
		INNER JOIN categorie c
		ON s.id_categorie = c.id_categorie
		INNER JOIN (SELECT idAdmin AS id_user, nomAdmin AS nom_user, prenomAdmin AS prenom_user FROM administrateur UNION SELECT idCoach, nomCoach, prenomCoach FROM coach UNION SELECT idJoueur, nomJoueur, prenomJoueur FROM joueur) AS u
		ON s.id_user = u.id_user
		ORDER BY idSujet DESC');
	?>

	<div class = "cat">
		<table class = "searchbar" >
			<tr align = "left">
				<td><h1>Tous les sujets</h1></td>
			</tr>
			<tr align = "left">
				<td> <a href="forum_categories.php"><strong>Choisir une autre catégorie</strong> </a></td>
			</tr>
			<form method="post" action="forum_search.php">
				<tr>
					<td align="center" ><input type="search" name="q" maxlength="60" placeholder="Recherche..." /><input type="submit" value="Q" /></td>
				</tr>
			</form>
		</table> <br>
		<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
				<td width="12%" align="center" class = "titresujet"><strong>Catégorie</strong></td>
				<td width="45%" align="center" class = "titresujet"><strong>Sujet</strong></td>
				<td width="20%" align="center" class = "titresujet"><strong>Auteur</strong></td>
				<td width="13%" align="center" class = "titresujet"><strong>Date/heure</strong></td>
				<td width="10%" align="center" class = "titresujet"><strong>Réponses</strong></td>
			</tr>

			<?php
			while ($donnees = $req->fetch()){
				?>
				<tr class = "liensujet">
					<td align="center" class = "textsujet"><?php echo $donnees['nomCategorie']; ?></td>
					<td align="center" class = "textsujet"><a href="forum_view_topic.php?id=<?php echo htmlspecialchars($donnees['idSujet']); ?>"><?php echo htmlspecialchars($donnees['titreSujet']); ?></a></td>
					<td align="center" class = "textsujet"><?php echo htmlspecialchars($donnees['prenom_user']).' '.htmlspecialchars($donnees['nom_user'])?></td>
					<td align="center" class = "textsujet"><?php echo $donnees['dateHeureSujet']; ?></td>
					<td align="center" class = "textsujet"><?php echo $donnees['nb_reponses']; ?></td>
				</tr>
			<?php
			}
			$req->closeCursor();
			?>

			<tr>
				<td colspan="5" align="right" bgcolor="#7ed957"><a href="forum_create_topic.php"><strong>Créer un nouveau sujet</strong> </a></td>
			</tr>
		</table>
	</div>
	<?php include("view/footer.php") ?>
</body>
</html>