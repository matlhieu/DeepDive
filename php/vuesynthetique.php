<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="../style/destinations.css"> <!--lien css-->
 <link rel="stylesheet" href="../style/nav_footer.css">
 <title>Destinations - DeepDive</title>
</head>

  <body>
	<nav class="navibar">
	  <div class="logo-container">
		<div class="logo"> 
			<a href="admin.php"><img src="../style/Image/logo4.png" alt="logo"></a>
		</div>
			<p class="nav-titre">Deep<span>Dive</span></p>
	  </div>
		<div class="menu">
			<ul class="navi-liens">
            <li><a href="../index.php" class="navi-lien">ACCUEIL</a></li>
            <li><a href="destinations.php" class="navi-lien">DESTINATIONS</a></li>
            <li><a href="search.php" class="navi-lien">RECHERCHE</a></li>
            <li><a href="about.php" class="navi-lien">QUI SOMMES NOUS ?</a></li>          
			</ul>
			<a href="login.php">
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAA3lJREFUaEPtWQtuU0EM3D0J9CTQk0BPQnsSykkIJ4GbmA7yRo6fv3kvQpH6pKhtutn1jMefdea482feuf3jHcD/9uBhHiCij2OMLwzo8xgDf+P1h9/DT7x+zTlfjwK+GwARfRtjwGC8Og/AvM45Xzof0muvBsCGf2WW99iwC0gbAEvl5wGGa9AA8jjnXJIrkdICQESQCYz3nn9sQufQO4xhwFiPePiUyK3tjTIAlsyzYXn7UBHw1n444rkaGyUAgfHlgyyXJUBKe6cAAtlAr6eSUJNFRIRk8N1YloIIATjGQzJPnvGC1ZWhVlAC7I/kczo5hGcBcAbgt5FtXOaJCCzC8OhB7n8KJIUz5YNk8OBt6AJw3BoZD/aqxcw1yjkXHjerdwRAsx8x1zF+kRntpz3pAjYBOCw8WEUmiJMXsMYxgRoAo/BTPqZH+TNaSqYXPACaUTcbGLo32WKjAELK7DTnfHTiQWcmc60HgNSmJvtYQ0RaalGc6EoexQK8deGFt+K2sXfzhiEfV6sMoANWGxVmGCLSStiQYwHQAeRmgC4Aa73F6vK+0QFsyLQApKilvCosCYO0rjMPaMlt4sACoDXt6p8Z1YAjXeu1mTxTyVkALjQduZgBWC32uQUQ7bR1hwj7KSOdbsjZDYBBVFoInS1D9oXsQkJ3xwADWIVqdyuh4ktLqBQDrSAWTK2phHdJWUvd4qVdZFT5UhbClEEakfbkBmvYA4CWR85Xzc4dolKTKoWszJjX8l77vpGiNzXJAlAq4Ya7l4TWQEs3bvgILjXwBi426fThrZClVf6IZg6GQjLZRebiksJg0LGaQCpVGBt6ADZNlzWzKYxZMvW4Ew2D/VY7vZERjwHPV8HgIp4Zrf+/AWFdTb2C2rlS4qB1SfEGXBeDLWXpig0MgHW9kJXb2rt/pfT6HEwkWPPaiLBrVanWGqMgwLG3vomFWTCbSlhSsiTSnhE1JBg2k5XBljd0WkBKPY2F2sjzellaRFMALCVdneVBbfaD+4HcNzXeTaMOWx6IFbil4iSaPwSz1zeV46nkAcFY5AksW6N1/I7e/STuAwj6D9wjRUWv5dEWAMHerb7gcGeuXnFpAyhKoFPM2t8vyM2vAiAktRq4a74r22X4smEXAFWcVv+Pr5F0RypH7OVutOLGwwBUDrvFmncAt2C1s+fde+Av7bAgT5sAPH8AAAAASUVORK5CYII="/>
			</a>
			<a href="profil.php">  
			<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAcFJREFUaEPtmetxwyAMgKVJ2lGaSdpMknSSZpNkk3YTJerhO8cPJGQkkzv4k/zA8H0SDxsQXrzgi/NDF9g7g01mgIi+AOANEb+lADUnkOB/EvhZksgKENE7AJwAgCNSoxwQ8bbW0AR+qJaVWBVI8L81qFMbFnhRIifAaYyKPGdaCtZiJnIC3CA3vLVkI8+Np2x/Pv6fhc5mEjkBGjf2mEyuE14pcUHE4xNXZkK5CvCERcTLuH9BYgbPz+6SASIa5tcMakViEX4XgRH8EHxJYhU+XGABXpL4mA6z6ZAPG0IZ+FUJzfIXIqCAN0u4CxTADxLivhG2jBrgj9KYD5sDEfBuq1AUvIuABzwRXRHxsLQqVZ3EXvAAwPvBIms1AU/4/6HiKeAN7yrgAZ++EVRvw5uHEBE9dSRs/+p1ftqu2xAqEFDDt5iBIvjWBIrhWxIwwbciYIYPFdB8dFjqhK1CFjjNM11AGwFNNC11tP1v3oktcJpnugAR1Trc1QRcrGN5F7ryh4TYckwF09Gi5sw+Av8PAPiohX9nRXPFxOf2fNFR466gRJiBb9PjdPWxSklPe9Z1vbSIEOsCEVHO9dEzsHcG7o9dekBKnPSGAAAAAElFTkSuQmCC"/>
			</a>
		</div>
	</nav>

 <section class="home"> 
	<div class="section-titre">
	 <h1 class="slogan">
	  <p>Découvrez nos <span>magnifiques</span> destinations !</p>
	 </h1>
	</div>
 </section>
 
 
 
	<section class="destinations">
		<h2>Nos <span>Destinations</span></h2>
			<div class="box-content">
				<!-- box -->
				<section id="porquerolles">
				<div class="box">
					<img src="https://www.bateliersdelacotedazur.com/decouvrir/wp-content/uploads/2021/02/ACCESSIBILITE-PMR-PORQUEROLLES.jpg" alt="Grand Trou Belize">
					<div class="content">
					<h2>Porquerolles</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						 <button class="boutton-recherche"> Vue détaillée </button>
					</div>
				 </div>
				</section>
				<!-- box -->
				<section id="parc">
				 <div class="box">
					<img src="https://www.lebaillidesuffren.com/wp-content/uploads/sites/174/2020/06/port-cros.jpg" alt="Port-Cros">
					<div class="content">
					<h2>Parc National de Port-Cros</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
				<button class="boutton-recherche"> Vue détaillée </button>


					</div>
				 </div>
				</section>
				<!-- box -->
				<section id="calanques">
				 <div class="box">
					<img src="https://checkyeti.imgix.net/images/optimized/boat-trips-to-calanques-national-park.jpg" alt="Calanques de Marseille">
					<div class="content">
						<h2>Calanques de Marseille</h2>
											<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>
					</div>
				 </div>
				</section>
				<!-- box -->
				<section id="réserve">
				<div class="box">
					<img src="https://cdt66.media.tourinsoft.eu/upload/DSC-2352.jpg" alt="Réserve Cerbère-Banyuls">
					<div class="content">
						<h2>Réserve de Cerbère-Banyuls</h2>
											<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
				<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				 </div>
				</section>
				<!-- box -->
				<div class="box">
					<img src="https://bonifacio.fr/app/uploads/bonifacio/2023/11/thumbs/archipel-iles-lavezzi-vue-aerienne-bonifacio-1920x960.jpg" alt="Îles Lavezzi">
					<div class="content">
					<h2>Îles Lavezzi - Corse</h2>
									<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src="https://www.voyageavecnous.fr/wp-content/uploads/2023/04/aller-a-comino.jpg" alt="Île de Gozo/Malte">
					<div class="content">
					<h2>Île de Gozo/Malte</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src="https://coelacantheplongee.fr/media/2024/11/IMG_3336_v2-scaled.jpg">
					<div class="content">
					<h2>Les îles Medes à l’Estartit en Espagne</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src="https://www.spain.info/export/sites/segtur/.content/imagenes/cabeceras-grandes/baleares/velero-mar-mallorca-i525635531.jpg">
					<div class="content">
					<h2>Parc national de Cabrera aux îles Baléares en Espagne</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src="https://cruceroskontiki.com/wp-content/uploads/2022/03/0.jpg">
					<div class="content">
					<h2>Île de Tabarca en Espagne</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src="https://ajaccio.media.tourinsoft.eu/upload/Copie-de-Plage-de-Capo-di-Feno-Phototheque-Office-de-Tourisme-d-Ajaccio--c--J.C.-Attard.jpg" alt="Porquerolles">
					<div class="content">
					<h2>Capo di Feno à Ajaccio</h2>
									<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src="https://media-cdn.tripadvisor.com/media/photo-m/1280/23/55/5a/ec/caption.jpg" alt="Iles Canaries">
					<div class="content">
					<h2>Iles Canaries</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>
					</div>
					</div>
					<div class="box">
					<img src="https://content.tui.co.uk/adamtui/2023_3/9_15/fbd89920-eea4-4291-bae7-afc001006ccb/LOC_003184_shutterstock_2034226538WebOriginalCompressed.jpg?i10c=img.resize(width:1080);img.crop(width:1080%2Cheight:608)" alt="?=Almyrida">
					<div class="content">
					<h2>Almyrida en Grèce</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src=https://www.les-covoyageurs.com/ressources/images-lieux/photo-lieu-2045-2.jpg alt="?=Almyrida">
					<div class="content">
					<h2>Comino à Malte</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>

					</div>
				</div>
				<div class="box">
					<img src="https://www.lustricadiving.it/wp-content/uploads/photo-gallery/httplocalhostlustricadivingwp-contentuploads/Ustica_Torre-Spalmatore.jpg" alt="Ile Ustica">
					<div class="content">
					<h2>Ile Ustica en Italie</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>
					</div>
				</div>
				<div class="box">
					<img src="https://cdn.futura-sciences.com/sources/images/diaporama/1592-les-plus-belles-plages-du-monde/fs-535258615.jpg" alt="Oludeniz">
					<div class="content">
					<h2>Oludenize en Turquie</h2>
										<p>📅 10-17 avril 2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>

					<p>🏨 Hébergement : Hotel Trivago</p>
					<p>🍝 Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️ Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗 Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶 Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
					<button class="boutton-recherche"> Vue détaillée </button>
					</div>
				</div>

				</div>
		
			</div>
	</section>

 <footer>
 	<div class="footer-main">
	 <img src="../style/Image/logoD.png" alt="logo">
		<div class="footer-container">
			<h3>Liens Utiles</h3>
			  <p><a href="../index.php">Accueil</a></p>
			  <p><a href="destinations.php">Destinations</a></p>
			  <p><a href="search.php">Recherche</a></p>
			  <p><a href="signup.php">Inscription</a></p>
			  <p><a href="login.php">Connexion</a></p>
		</div>
	
		<div class="footer-container">
			<h3>Nous contacter</h3>
			<p><a href="about.php">En savoir plus sur nous</a><p>
			<p>Téléphone : +33 6 45 15 25</p>
			<p>Adresse : 75421, Varay, 22 Place d'Elden</p>
			<p>deepdive05@gmail.com</p>
		</div>
	</div>
	<p> © 2025 DeepDive | All rights reserved </p>
 </footer>
	
 </body>
</html>
