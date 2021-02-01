<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/laurene.css" />
        <title> Page choix des tests </title>
    </head>

    <body>

<?php include("view/header_coach.php") ?>

<?php include("view/menuCoach.php") ?>

    <section class="pageTests">

        <form method="post" action="traitement.php">
            <h1> Choix des tests </h1>
            <p> Sélectionner les tests que vous voulez réaliser : <br/><br/>
                <input type="checkbox" name="fréquence cardiaque" id="fréquence cardiaque" /> <label for="fréquence cardiaque"> Mesurer la fréquence cardiaque </label><br/>
                <input type="checkbox" name="température" id="température" /> <label for="température"> Mesurer la température </label><br/>
                <input type="checkbox" name="troubles auditifs" id="troubles auditifs" /> <label for="troubles auditifs"> Quantifier les troubles auditifs </label><br/>
                <input type="checkbox" name="réflexes visuels" id="réflexes visuels" /> <label for="réflexes visuels"> Mesurer le temps de réponse à une lumière innattendue en extérieur </label><br/>
                <input type="checkbox" name="réflexes visuels bis" id="réflexes visuels bis" /> <label for="réflexes visuels bis"> Mesurer le temps de réponse à une lumière attendue mais répétée en extérieur </label><br/>
                <input type="checkbox" name="réflexes sonores" id="réflexes sonores" /> <label for="réflexes sonores"> Mesurer le temps réponse à un son innatendu</label><br/>
                <input type="checkbox" name="réflexes sonores bis" id="réflexes sonores bis" /> <label for="réflexes sonores bis"> Mesurer le temps réponse à un son attendu mais répété </label><br/>
            </p>

            <h1>Choix du joueur à tester</h1>
            <div id="choixsportifs">
            	<label for="sportifs"> Quel sportif voulez-vous tester ? </label><br/>
                	<select name="sportifs" id="sportifs">
                   	 	<option value="sportif1"> Sportif 1 </option>
                    	<option value="sportif2"> Sportif 2 </option>
                    	<option value="sportif3"> Sportif 3 </option>
                    	<option value="sportif4"> Sportif 4 </option>
                    	<option value="sportif5"> Sportif 5 </option>
                    	<option value="sportif6"> Sportif 6 </option>
                    	<option value="sportif7"> Sportif 7 </option>
                    	<option value="sportif8"> Sportif 8 </option>
                    	<option value="sportif9"> Sportif 9 </option>
                	</select>
            </div>

        <br/>
        <p> <span class="envoie"><input type="submit" value="Envoyer" /> </p> </span>

    	</form>
	</section>

<?php include("view/footer.php") ?>	

    </body>
</html>
