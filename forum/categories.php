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
	$req = $bdd->query('SELECT c.id_categorie, c.nomCategorie, ( SELECT COUNT(*) FROM sujet s WHERE s.id_categorie = c.id_categorie) AS nb_sujets
		FROM categorie c ORDER BY c.nomCategorie
		');
	$req2 = $bdd->query('SELECT COUNT(*) AS nb_sujets FROM sujet');
	$donnees2 = $req2->fetch();
	?>
	<div class = "cat">
		<table class = "searchbar" >
			<tr align = "left">
			</tr>
			<form method="post" action="search.php">
				<tr>
					<td align="center" ><input type="search" name="q" maxlength="60" placeholder="Recherche..." /><input type="submit" value="Q" /></td>
				</tr>
			</form>
		</table> <br>
		<table class = "tabcat">
			<tr>
					<td width="80%" align="center" class = "titretab" >Catégorie</td>
					<td width="20%" align="center" class = "titretab" >Sujets</td>
			</tr>
			<tr>
					<td width="80%" align="center" class = "texttab" ><a href="all.php">Tous les sujets</a></td>
					<td width="20%" align="center" class = "texttab" ><?php echo $donnees2['nb_sujets']; ?></td>
			</tr>
			<?php
			while($donnees = $req->fetch()){
				?>
				<tr bgcolor="#E9E3E3">
					<td width="80%" align="center" class = "texttab" ><a href="page.php?id_categorie=<?php echo $donnees['id_categorie']; ?>&nom_categorie=<?php echo htmlspecialchars($donnees['nomCategorie']); ?>"><?php echo htmlspecialchars($donnees['nomCategorie']); ?></a></td>
					<td width="20%" align="center" class = "texttab" ><?php echo $donnees['nb_sujets']; ?></td>
				</tr>
		<?php } ?>
			<tr>
				<td colspan = "2" align="right" bgcolor="#7ed957" ><a href="create_topic.php"><strong>Créer un nouveau sujet</strong></a></td>
			</tr>
		</table>
	</div>
</body>
</html>