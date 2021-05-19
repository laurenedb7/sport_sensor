<!DOCTYPE HTML>
<html>
	<head> 
	 	<meta charset="utf-8">
	 	<title> Joueur </title>
	 	<link rel="stylesheet" type="text/css" href="style/joueur.css"/>
	</head>

	<body>

<?php include("view/header_joueur.php") ?>

<?php include("view/menuJoueur.php") ?>


	<section class='conteneur'>
		
		<div class='nom'>
			<h1><?php echo($_SESSION['prenom'])?> <?php echo($_SESSION['nom'])?></h1>
			<h2>Equipe : <?php echo($_SESSION['nomEquipe']) ?></h2>
		</div>

			<div class = "information">
				<article >
					<ul >
						<li>Nom : <?php echo($_SESSION['nom']) ?></li>
						<li>Prénom : <?php echo($_SESSION['prenom']) ?></li>
						<li>Poids: <?php echo($_SESSION['poids']) ?></li>
						<li>Taille : <?php echo($_SESSION['taille']) ?></li>
						<li>Mail :<?php echo($_SESSION['mail']) ?></li>
						<li>Téléphone : <?php echo($_SESSION['tel']) ?></li>
					</ul>
				</article>
				<a href="index_edition.php">Editer votre profil</a>
			</div>
		</div>	

		<div class='appellation'>
			<h2>Résultats des trois dernières semaines</h2>
		</div>
		<div class='trait'></div>

		<div class= bandeau>
			<article>
				<div class= 'semaine'>
					<a href="images/table.png" >
						
						<h3>Cette semaine </h3>
						<img src="images/camSem1.png" alt="Résulatat semaine 1" class ='graph' >
						
					</a>
				</div>

				<div class= 'semaine'>
					<a href="images/table.png" >
						<h3>La semaine derniere </h3>
						<img src="images/camSem2.png" alt="Résulatat semaine 2" class= "graph">
					</a>
				</div>

				<div class= 'semaine'>
					<a href="images/table.png" >
						<h3>Il y a deux semaines</h3>
						<img src="images/camSem3.png" alt="Résulatat semaine 3" class= "graph">
					</a>
				</div>

			</article>
		</div>
			
		<div class ='bouton'>
			<a href="statistiqueJoueur.php">Plus de détails</a>
		</div>	
	</section>

<?php include("view/footer.php") ?>

	</body>
</html>