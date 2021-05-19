<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/laurene.css" />
        <title>Accueil</title>
    </head>

    <body>

    <header>
		<div id="titre_principal">
    			<div id="logo">
    				<img src="logo/logo.png" alt="logo"/>
                </div>
                <div id="titre">
    				<h1>Sport Sensor</h1>
                    <h2>Une plateforme innovante </h2>
                </div>
    	</div>
    	<div class="menu">
            <div id="pageaccueil">
                <a href="page_accueil.php">Accueil</a>
            </div>
            <div id="faq">
                <a href="faq.php">FAQ</a>
            </div>
            <div id="inscription">
                <a href="inscription.php">S'inscrire</a>
            </div>
        </div>
	</header>

	<section class="pageVisiteurs">

		<h1> Sport Sensor, qu'est ce que c'est ? </h1>

		<p id="soustitre"> Une plateforme intuitive et sécurisée destinée aux sportifs ! </p>

		<p> Sport Sensor est une plateforme web destinée aux entraineurs sportifs ! Peu importe le sport pratiqué, chaque entraineur peut s'y inscrire et y inscrire les membres de l'équipe qu'il entraine ! Toutes les données sont stockées sur la plateforme de manière sécurisé. </p>
		<p> Pour comprendre le fonctionnement de cette plateforme, rendez-vous sur les différentes rubriques ! </p>
		<div class="sommaire">
			<a href="#comment-ca-marche"> Comment ça marche ? </a></br>
			<a href="#quels-tests"> Quels tests peuvent être réalisés ? </a></br>
			<a href="#commentsinscrire"> Comment s'inscrire ? </a> </br>
			<a href="#questions"> Des questions ? </a></br>
		</div>
		</p>

		<div id="comment-ca-marche">
			<h2> Comment ça marche ? </h2>
			<p> Un entraineur d'une équipe sportive a besoin de connaître l'état physique de chacun des membres de son équipe. Ainsi, via cette plateforme, les coachs pourront faire passer différents types de tests aux sportifs. En effet, différents boitiers sont fournis pour réaliser les tests psychotechniques. </p>
			<p> Pour cela, les entraineurs et les sportifs s'inscrivent sur la plateforme. Pour passer un test, l'entraineur se connecte et choisit le test qu'il veut réaliser. Les sportifs peuvent alors passer différents tests et accéder aux résultats sous forme de graphiques et de tableaux. </p> 
			<p> Les entraineurs ont accès aux résultats de tous les sportifs de leur équipe ! Un classement est généré selon les résultats pour permettre une meilleure visibilité sur les membres de l'équipe et adapter l'entrainement ! </p>
			<p> Les sportifs, quant à eux, n'ont accès qu'à leurs résultats personnels ! </p>
		</div>

		<div id="quels-tests">
			<h2> Quels tests peuvent être réalisés ? </h2>
			<p> De nombreux tests psychotechniques peuvent être réalisés sur les sportifs grâce à plusieurs boitiers. </p>

			<h3> La température </h3>
			<div class="Température">
				<div id="logoTempérature"> 
					<img src="images/temperature.png" alt="logoTempérature">
				</div>
				<div id="texteTempérature">
					<p> Mesurer la température d'un sportif permettra au coach de connaître sa forme physique et sa capacité ou non à participer à une compétition sportive. </p>
				</div>
			</div>

			<h3> La fréquence cardiaque </h3>
			<div class="FréquenceCardiaque">
				<div id="logoFréquence"> 
					<img src="images/frequencecardiaque.png" alt="logoFréquenceCardiaque">
				</div>
				<div id="texteFréquence">
					<p> Pour évaluer le niveau de stress d'un sportif, on va pouvoir mesurer sa fréquence cardiaque. Le stress est un facteur important à connaître pour participer à une compétition sportive. </p>
				</div>
			</div>

			<h3> Les troubles auditifs </h3>
			<div class="Audition">
				<div id="logoAudition"> 
					<img src="images/audition.png" alt="logoAudition">
				</div>
				<div id="texteAudition">
					<p> Un test particulier va permettre à l'entraineur de voir si les sportifs de son équipe présentent des troubles auditifs. Les troubles auditifs peuvent s'avérer pénalisants lors d'un entrainement sportif ou lors d'une compétition. C'est pourquoi ce test va permettre de repérer les troubles auditifs. </p>
				</div>
			</div>

			<h3> Les réflexes </h3>
			<div class="Réflexes">
				<p> Grâce à ces tests, le coach pourra évaluer les différents réflexes des sportifs qu'il entraine. En effet, il est important pour un sportif d'avoir des réflexes et d'évaluer sa capacité à rester concentré sur ce qu'il fait si quelque chose d'innatendu survient. C'est pourquoi on va réalise deux types de tests pour évaluer les réflexes visuels et sonores. </p>
				<div class="RéflexesVisuels">
					<div id="logoOeil">
						<img src="images/oeil.png">
					</div>
					<div id="texteOeil">
						<p>Les réflexes visuels : on va pouvoir mesurer le temps de réaction à une lumière innatendue ou attendue mais répétée en extérieur. </p>
					</div>
				</div>
				<div class="RéflexesSonores">
					<div id="logoSon">
						<img src="images/son.png">
					</div>
					<div id="texteSon">
						<p>Les réflexes sonores : on va pouvoir mesurer le temps de réaction à un son innatendu en extérieur.</p>
					</div>
				</div>
			</div>
		</div>

		<div id="commentsinscrire">
			<h2> Comment s'inscrire ? </h2>
			<p> Pour s'inscrire, c'est très simple ! </p>
			<p> Rendez-vous sur la page d'inscription et suivez les instructions ! </p>
			<div id="pageInscription">
				<a href="inscription.php">S'inscrire</a>
			</div>
			<p> Vous pouvez aussi vous rendre sur notre <a href="faq.php">FAQ</a>, où une rubrique détaillée vous explique les modalités d'inscription ! </p>
		</div>

		<div id=questions>
			<h2> Des questions ? </h2>
			<p> N'hésitez pas à lire notre <a href="faq.php">FAQ</a> ou à <a href="mailto:laurene.de-blauwe@eleve.isep.fr"> nous contacter</a> directement ! </p>
		</div>
	</section>


<?php include("view/footer.php") ?>
    
    
    </body>
</html>