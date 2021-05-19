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
	<section class = 'conteneur'>
	<table align="center" cellpadding="10" cellspacing="0" class="tabcreate" >
		<form id="form1" name="form1" method="post" action="forum_add_topic.php">
		<tr>
			<td colspan="3" class = "titretab"><strong>Create New Topic</strong> </td>
		</tr>
		<tr>
			<td width="14%"><strong>Catégorie</strong></td>
			<td width="2%">:</td>
			<td width="84%">
				<select name="choix_categorie">
					<?php
					$req = $bdd->query('SELECT * FROM categorie');

					while($donnees = $req->fetch()){
					?>
					    <option value=<?php echo $donnees['id_categorie']; ?>><?php echo htmlspecialchars($donnees['nomCategorie']); ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td width="14%"><strong>Topic</strong></td>
			<td width="2%">:</td>
			<td width="84%"><input name="topic" type="text" maxlength="60" id="topic" size="70" /></td>
		</tr>
		<tr>
			<td valign="top"><strong>Detail</strong></td>
			<td valign="top">:</td>
			<td><textarea name="detail" cols="70" rows="10" id="detail"></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
		</tr>
		<tr>
			<td colspan="3"	align="right"><a href="forum_categories.php"><strong>Annuler</strong> </a></td>
		</tr>
		</form>
	</table>
	</section>
	<?php include("view/footer.php") ?>
</body>
</html>
