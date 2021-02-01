<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<meta charset="utf-8">
	<link rel = "stylesheet" href = "forum.css"/>
</head>
<body>
	<?php include 'connectbdd.php'; ?>
	<a href="deconnect.php"><strong>Se déconnecter</strong> </a>
		<?php
		$id = htmlspecialchars($_GET['id']);
		$req = $bdd->prepare('SELECT s.idSujet, s.titreSujet, s.contenuSujet, DATE_FORMAT(s.dateHeureSujet, "%d/%m/%Y %H:%i:%s") AS dateHeureSujet, s.id_user, c.id_categorie, c.nomCategorie, u.nom_user, u.prenom_user
			FROM sujet s 
			INNER JOIN categorie c
			ON s.id_categorie = c.id_categorie
			INNeR JOIN (SELECT idAdmin AS id_user, nomAdmin AS nom_user, prenomAdmin AS prenom_user FROM administrateur UNION SELECT idCoach, nomCoach, prenomCoach FROM coach UNION SELECT idJoueur, nomJoueur, prenomJoueur FROM joueur) AS u
			ON s.id_user = u.id_user
			WHERE idSujet = ?');
		$req->execute(array($id));
		$donnees = $req->fetch();

		$reqrole1 = $bdd->prepare('SELECT idAdmin FROM administrateur WHERE idAdmin = ?');
		$reqrole1->execute(array($donnees['id_user']));
		while($role1 = $reqrole1->fetch()){
			$role = 'Administrateur';
		}

		$reqrole2 = $bdd->prepare('SELECT idCoach FROM coach WHERE idCoach = ?');
		$reqrole2->execute(array($donnees['id_user']));
		while($role2 = $reqrole2->fetch()){
			$role = 'Coach';
		}

		$reqrole3 = $bdd->prepare('SELECT idJoueur FROM joueur WHERE idJoueur = ?');
		$reqrole3->execute(array($donnees['id_user']));
		while($role3 = $reqrole3->fetch()){
			$role = 'Sportif';
		}


		$req_equipe = $bdd->prepare('SELECT nomEquipe FROM equipe WHERE id_user = ?');
        $req_equipe->execute(array($donnees['id_user']));
        $nom_equipe = $req_equipe->fetch();
        if ($nom_equipe){
        	$equipe = $nom_equipe['nomEquipe'];
    	}
        else {
        	$equipe = '';
        }

		?>
	<div class = "cat">
		<a href="categories.php"><strong>Choisir une autre catégorie / </strong> </a>
		<a href="page.php?id_categorie=<?php echo htmlspecialchars($donnees['id_categorie']); ?>&nom_categorie=<?php echo htmlspecialchars($donnees['nomCategorie']); ?>"><strong>Choisir un autre sujet</strong> </a> <br><br>
		<div align = center class = tab>
			<h1><?php echo 'Sujet: '.htmlspecialchars($donnees['titreSujet']); ?></h1>
			<table cellpadding="10" cellspacing="0" class = rep >
				<tr bgcolor="#7ed957">
					<td width="10%" align="center" > <img width = "90%" src="img.php?id=<?php echo htmlspecialchars($donnees['id_user']); ?>" alt="Photo de profil" /></td>
					<td width="80%"><?php echo htmlspecialchars($donnees['prenom_user']).' '.htmlspecialchars($donnees['nom_user']);?> <br>
						<?php if ($equipe == '') {
							echo $role;
						} else {
							echo $equipe.' - '.$role;
						} ?> <br>
						<?php echo ($donnees['dateHeureSujet']); ?></td>
				</tr>
				<tr bgcolor="white">
					<td colspan = "2" class = "mess"><?php echo nl2br(htmlspecialchars($donnees['contenuSujet'])); ?></td>
				</tr>
			</table><br>

			<?php
			$req->closeCursor();

			$req2 = $bdd->prepare('SELECT m.idMessage, DATE_FORMAT(m.dateHeureMessage, "%d/%m/%Y %H:%i:%s") AS dateHeureMessage, m.contenuMessage, m.id_sujet, m.id_user, u.nom_user, u.prenom_user
					FROM message m
					INNeR JOIN (SELECT idAdmin AS id_user, nomAdmin AS nom_user, prenomAdmin AS prenom_user FROM administrateur UNION SELECT idCoach, nomCoach, prenomCoach FROM coach UNION SELECT idJoueur, nomJoueur, prenomJoueur FROM joueur) AS u
					ON m.id_user = u.id_user
					WHERE id_sujet = ?');
			$req2->execute(array($id));

			while($donnees2 = $req2->fetch()){
				$reqrole1 = $bdd->prepare('SELECT idAdmin FROM administrateur WHERE idAdmin = ?');
				$reqrole1->execute(array($donnees2['id_user']));
				while($role1 = $reqrole1->fetch()){
					$role = 'Administrateur';
				}

				$reqrole2 = $bdd->prepare('SELECT idCoach FROM coach WHERE idCoach = ?');
				$reqrole2->execute(array($donnees2['id_user']));
				while($role2 = $reqrole2->fetch()){
					$role = 'Coach';
				}

				$reqrole3 = $bdd->prepare('SELECT idJoueur FROM joueur WHERE idJoueur = ?');
				$reqrole3->execute(array($donnees2['id_user']));
				while($role3 = $reqrole3->fetch()){
					$role = 'Sportif';
				}


				$req_equipe2 = $bdd->prepare('SELECT nomEquipe FROM equipe WHERE id_user = ?');
		        $req_equipe2->execute(array($donnees2['id_user']));
		        $nom_equipe2 = $req_equipe2->fetch();
		        if ($nom_equipe2){
		        	$equipe2 = $nom_equipe2['nomEquipe'];
		    	}
		        else {
		        	$equipe2 = '';
		        }
				?>
				<table cellpadding="10" cellspacing="0" class = rep2>
					<tr bgcolor="#7ed957">
						<td width="10%" align="center" > <img width = "90%" src="img.php?id=<?php echo htmlspecialchars($donnees2['id_user']); ?>" alt="Photo de profil" /></td>
						<td width="80%"><?php echo htmlspecialchars($donnees2['prenom_user']).' '.htmlspecialchars($donnees2['nom_user']);?> <br>
						<?php if ($equipe2 == '') {
							echo $role;
						} else {
							echo $equipe2.' - '.$role;
						} ?> <br>
						<?php echo $donnees2['dateHeureMessage']; ?></td>
					</tr>

					<tr bgcolor="white">
						<td colspan = "2" class = "mess"><?php echo nl2br(htmlentities($donnees2['contenuMessage'])); ?></td>
					</tr>
			</table><br>

			<?php
			}
			$req2->closeCursor();
			?>

			<table class = "rep2">
				<form name="form1" method="post" action="add_answer.php">
					<tr><td colspan = "2" align = center><strong>Repondre:</strong></td></tr>
					<tr><td colspan = "2" align = center><textarea name="contenuMessage" rows="10" id="contenuMessage"></textarea></td></tr>
					<tr>
						<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
						<td align = center><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
					</tr>
				</form>
			</table>
		</div>
	</div>
</body>
</html>