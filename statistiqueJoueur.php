<?php
session_start();
include("model/config.php") 
?>



<!DOCTYPE HTML>
<html>
	<head> 
	 	<meta charset="utf-8">
	 	<title> Statistiques </title>
        <link rel="stylesheet" type="text/css" href="style/joueur.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"> </script>
        
	</head>

    
<body>

<?php include("view/header_joueur.php") ?>

<?php include("view/menuJoueur.php") ?>

		 

		<div class='appellation'>
			<h1><?php echo $_SESSION['prenom'] ; echo ' ' ; echo $_SESSION['nom']?> </h1> </br>
			<h2>Paris Saint Germain</h2>
		</div>

		<div class='trait'></div>

		<div class ="bandeau">
			<aside> 
				<div class="joueur">
                        <img src="images/mbappe.jpg" alt="Joueur">
				</div>
			</aside>

			<div class="attribut">
				<article>
					
                        
					<div class ='tableau'>
						<?php include('model/tableau.php');?>
						<canvas id='chart'> </canvas>
					</div>

				</article>
			</div>
		</div>
	<section class = 'grille'>
		<?php include('model/tableau.php');?>
		<?php include('model/tableau.php');?>
		<?php include('model/tableau.php');?>
		<?php include('model/tableau.php');?>
	
    </section>
    

<?php include("view/footer.php") ?>

</body>
</html>
 
<script>
    var ctx = document.getElementById('chart').getContext('2d');
     var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [25, 32, 40, 20, 60]
        }]
    },

    // Configuration options go here
    options: {
        legend : false,
        title: {
                display : true,
                text : "synthèse de la semaine",
                fontColor: 'black'
            },
        
    }
});
</script>