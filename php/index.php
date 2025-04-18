<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="../style/style.css"> <!--lien css--> 
 <link rel="stylesheet" href="../style/nav_footer.css">
 <title>Accueil - DeepDive</title>
</head>
<header>
	<?php include("navbar.php") ?>
</header>
  <body>
	
 <section class="home"> 
	<div class="section-titre">
	 <h1 class="slogan">
	  <p>Plongée au coeur des<br>océans avec Deep<span>Dive</span> !</p>
	 </h1>
	 <a href="search.php" class="btn-plongez">Plongez dès Maintenant</a>
	</div>
 </section>
 
 <section class="hero">
	<h2>Bienvenue sur Deep<span>Dive</span></h2>
	<h4>Plongez au cœur des plus <span><u>beaux sites sous-marins de Méditerranée</u></span>. 
	Que vous soyez débutant ou plongeur expérimenté, nous proposons 
	des séjours adaptés à tous !</h4>
 </section>
 
	<section class="destinations">
		<h2>Nos Destinations les plus <span>Populaires</span></h2>
			<div class="box-content">
				<!-- box -->
				<div class="box">
					<img src="https://www.bateliersdelacotedazur.com/decouvrir/wp-content/uploads/2021/02/ACCESSIBILITE-PMR-PORQUEROLLES.jpg" alt="Grand Trou Belize">
					<div class="content">
					<h3>Porquerolles</h3>
					<p>La douceur de l’eau et la luminosité de Porquerolles font le bonheur des plongeurs, prolongé par des épaves attendant d’être visitées...
					</p>
					</div>
					<button>
					<a href="destinations.php#porquerolles">En Savoir Plus</a>
					</button>
				</div>
				<!-- box -->
				<div class="box">
					<img src="https://www.lebaillidesuffren.com/wp-content/uploads/sites/174/2020/06/port-cros.jpg" alt="Port-Cros">
					<div class="content">
					<h3>Parc National de Port-Cros</h3>
					<p>Située entre Banyuls et Cerbère, cette réserve marine 
					protégée abrite une biodiversité remarquable et des eaux limpides, 
					idéales pour une plongée inoubliable.
					</p>
					</div>
					<button>
					<a href="destinations.php#parc">En Savoir Plus</a>
					</button>
				</div>
				<!-- box -->
				<div class="box">
					<img src="https://checkyeti.imgix.net/images/optimized/boat-trips-to-calanques-national-park.jpg" alt="Calanques de Marseille">
					<div class="content">
					<h3>Calanques de Marseille</h3>
					<p>Les Calanques de Marseille offrent un cadre unique. Un site de plongée exceptionnel 
					entre falaises, eaux cristallines et une riche biodiversité sous-marine.
					</p>
					</div>
					<button>
					<a href="destinations.php#calanques">En Savoir Plus</a>
					</button>
				</div>
				<!-- box -->
				<div class="box">
					<img src="https://cdt66.media.tourinsoft.eu/upload/DSC-2352.jpg" alt="Réserve Cerbère-Banyuls">
					<div class="content">
					<h3>Réserve de Cerbère-Banyuls</h3>
					<p>Premier parc marin de France, cette réserve offre des eaux cristallines 
					et une biodiversité exceptionnelle pour une plongée inoubliable.
					</p>
					</div>
					<button>
					<a href="php/destinations.php#réserve">En Savoir Plus</a>
					</button>
				</div>
			</div>
	</section>

<?php include("footer.php") ?>
	
 </body>
</html>
