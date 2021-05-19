<link rel = "stylesheet" href = "style/style_header_coach.css"/>
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

  			<div class="infoCoach">
  				<div id="nomCoach">
  					<ul>
  						<li id="nom"> <?php echo $_SESSION['nom'] ?> </li>
  						<li id="prénom"> <?php echo $_SESSION['prenom'] ?> </li>
  						<li id="coach"> <?php echo $_SESSION['nomEquipe'].' - '.$_SESSION['profil'] ?> </li>
              <li id="deco"> <a href="deconnect.php"><strong>Se déconnecter</strong> </a> </li>
  					</ul>
  				</div>
  				<div id="photoCoach">
  					<img src="pdp.php" alt="Photo de profil" />
  				</div>
    	</header>