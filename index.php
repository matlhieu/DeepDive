<!DOCTYPE html>
<html lang="fr-FR">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="style/style.css"> <!--lien css--> 
 <link rel="stylesheet" href="style/nav_footer.css">
 <title>Accueil - DeepDive</title>
</head>

  <body>
	<nav class="navibar">
	  <div class="logo-container">
		<div class="logo"> 
			<a href="admin.php"><img src="style/Image/logo4.png" alt="logo"></a>
		</div>
			<p class="nav-titre">Deep<span>Dive</span></p>
	  </div>
		<div class="menu">
			<ul class="navi-liens">
            <li><a href="index.php" class="navi-lien">ACCUEIL</a></li>
            <li><a href="php/destinations.php" class="navi-lien">DESTINATIONS</a></li>
            <li><a href="php/search.php" class="navi-lien">RECHERCHE</a></li>
            <li><a href="php/about.php" class="navi-lien">QUI SOMMES NOUS ?</a></li>          
			</ul>
			<a href="php/login.php">
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAA3lJREFUaEPtWQtuU0EM3D0J9CTQk0BPQnsSykkIJ4GbmA7yRo6fv3kvQpH6pKhtutn1jMefdea482feuf3jHcD/9uBhHiCij2OMLwzo8xgDf+P1h9/DT7x+zTlfjwK+GwARfRtjwGC8Og/AvM45Xzof0muvBsCGf2WW99iwC0gbAEvl5wGGa9AA8jjnXJIrkdICQESQCYz3nn9sQufQO4xhwFiPePiUyK3tjTIAlsyzYXn7UBHw1n444rkaGyUAgfHlgyyXJUBKe6cAAtlAr6eSUJNFRIRk8N1YloIIATjGQzJPnvGC1ZWhVlAC7I/kczo5hGcBcAbgt5FtXOaJCCzC8OhB7n8KJIUz5YNk8OBt6AJw3BoZD/aqxcw1yjkXHjerdwRAsx8x1zF+kRntpz3pAjYBOCw8WEUmiJMXsMYxgRoAo/BTPqZH+TNaSqYXPACaUTcbGLo32WKjAELK7DTnfHTiQWcmc60HgNSmJvtYQ0RaalGc6EoexQK8deGFt+K2sXfzhiEfV6sMoANWGxVmGCLSStiQYwHQAeRmgC4Aa73F6vK+0QFsyLQApKilvCosCYO0rjMPaMlt4sACoDXt6p8Z1YAjXeu1mTxTyVkALjQduZgBWC32uQUQ7bR1hwj7KSOdbsjZDYBBVFoInS1D9oXsQkJ3xwADWIVqdyuh4ktLqBQDrSAWTK2phHdJWUvd4qVdZFT5UhbClEEakfbkBmvYA4CWR85Xzc4dolKTKoWszJjX8l77vpGiNzXJAlAq4Ya7l4TWQEs3bvgILjXwBi426fThrZClVf6IZg6GQjLZRebiksJg0LGaQCpVGBt6ADZNlzWzKYxZMvW4Ew2D/VY7vZERjwHPV8HgIp4Zrf+/AWFdTb2C2rlS4qB1SfEGXBeDLWXpig0MgHW9kJXb2rt/pfT6HEwkWPPaiLBrVanWGqMgwLG3vomFWTCbSlhSsiTSnhE1JBg2k5XBljd0WkBKPY2F2sjzellaRFMALCVdneVBbfaD+4HcNzXeTaMOWx6IFbil4iSaPwSz1zeV46nkAcFY5AksW6N1/I7e/STuAwj6D9wjRUWv5dEWAMHerb7gcGeuXnFpAyhKoFPM2t8vyM2vAiAktRq4a74r22X4smEXAFWcVv+Pr5F0RypH7OVutOLGwwBUDrvFmncAt2C1s+fde+Av7bAgT5sAPH8AAAAASUVORK5CYII="/>
			</a>
			<a href="php/profil.php">  
			<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAcFJREFUaEPtmetxwyAMgKVJ2lGaSdpMknSSZpNkk3YTJerhO8cPJGQkkzv4k/zA8H0SDxsQXrzgi/NDF9g7g01mgIi+AOANEb+lADUnkOB/EvhZksgKENE7AJwAgCNSoxwQ8bbW0AR+qJaVWBVI8L81qFMbFnhRIifAaYyKPGdaCtZiJnIC3CA3vLVkI8+Np2x/Pv6fhc5mEjkBGjf2mEyuE14pcUHE4xNXZkK5CvCERcTLuH9BYgbPz+6SASIa5tcMakViEX4XgRH8EHxJYhU+XGABXpL4mA6z6ZAPG0IZ+FUJzfIXIqCAN0u4CxTADxLivhG2jBrgj9KYD5sDEfBuq1AUvIuABzwRXRHxsLQqVZ3EXvAAwPvBIms1AU/4/6HiKeAN7yrgAZ++EVRvw5uHEBE9dSRs/+p1ftqu2xAqEFDDt5iBIvjWBIrhWxIwwbciYIYPFdB8dFjqhK1CFjjNM11AGwFNNC11tP1v3oktcJpnugAR1Trc1QRcrGN5F7ryh4TYckwF09Gi5sw+Av8PAPiohX9nRXPFxOf2fNFR466gRJiBb9PjdPWxSklPe9Z1vbSIEOsCEVHO9dEzsHcG7o9dekBKnPSGAAAAAElFTkSuQmCC"/>
			</a>
		</div>
	</nav>

 <section class="home"> 
	<div class="section-titre">
	 <h1 class="slogan">
	  <p>Plongée au coeur des<br>océans avec Deep<span>Dive</span> !</p>
	 </h1>
	 <a href="php/search.php" class="btn-plongez">Plongez dès Maintenant</a>
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
					<a href="php/destinations.php">En Savoir Plus</a>
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
					<a href="php/destinations.php">En Savoir Plus</a>
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
					<a href="php/destinations.php">En Savoir Plus</a>
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
					<a href="php/destinations.php">En Savoir Plus</a>
					</button>
				</div>
			</div>
	</section>

 <footer>
 	<div class="footer-main">
	 <img src="style/Image/logoD.png" alt="logo">
		<div class="footer-container">
			<h3>Liens Utiles</h3>
			  <p><a href="index.php">Accueil</a></p>
			  <p><a href="destinations.php">Destinations</a></p>
			  <p><a href="search.php">Recherche</a></p>
			  <p><a href="signup.php">Inscription</a></p>
			  <p><a href="login.php">Connexion</a></p>
		</div>
	
		<div class="footer-container">
			<h3>Nous contacter</h3>
			<p><a href="php/about.php">En savoir plus sur nous</a><p>
			<p>Téléphone : +33 6 45 15 25</p>
			<p>Adresse : 75421, Varay, 22 Place d'Elden</p>
			<p>deepdive05@gmail.com</p>
		</div>
	</div>
	<p> © 2025 DeepDive | All rights reserved </p>
 </footer>
	
 </body>
</html>
