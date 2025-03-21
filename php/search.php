<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <title>Recherche - DeepDive</title>
	<link rel="stylesheet" href="../style/nav_footer.css"> 
    <link rel="stylesheet" href="../style/search.css">

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
            <li><a href="../index.html" class="navi-lien">ACCUEIL</a></li>
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
  
    <section class="titre">
        <h1>Explorez les <span>Abysses</span></h1>
        <div class="recherche-tout">
	<div class="bulle">
		<label>📍 Destination</label>
		<div class="bulle-destinations">
			<button class="destination" value="Port-Cros">
		Port-Cros</button>
			<button class="destination" value="Porquerolles">
		Porquerolles</button>
			<button class="destination" value="Calanques">
		Calanques</button>
			<button class="destination" value="Lavezzi">
		Îles Lavezzi</button>
			<button class="destination" value="Gozo">Gozo</button>
			<button class="destination" value="Cerbere">
		Cerbère-Banyuls</button>
			<button class="destination" value="îles Medes">
		îles Medes</button>
			<button class="destination" value="Cabrera aux îles Baléares">
		Cabrera aux îles Baléares</button>
			<button class="destination" value="Île de Tabarca">
		Île de Tabarca</button>
			<button class="destination" value="Capo di Feno à Ajaccio">
		Capo di Feno a Ajaccio</button>
		</div>
	</div>

		
		<div class="bulle">
		<label>🤿Nombre de personnes</label>
			<input type="number" name="nombre de personnes"
			min="1" max="15" value="1"step="1">	
		</div>
                <div class="bulle">
                    <label>📅 Date de départ</label>
                    <input type="date" name date min="2025-02-16" value="2025-02-16">
                    
                </div>
		
                <div class="bulle">
                    <label>⏳ Durée</label>
                    <select>
                        <option>1 jour</option>
                        <option>3 jours</option>
                        <option>5 jours</option>
			<option>1 semaine</option>
                    </select>
                </div>
            </div>
            <button class="boutton-recherche">
                Rechercher
            </button>
        </div>
    </section>


    <h2 class="meilleure-plans">Les <span>meilleurs</span> plans !</h2>

   <div class="ensemble-carré-info">

    <div class="un-carré-info">
        <img src="https://www.lebaillidesuffren.com/wp-content/uploads/sites/174/2020/06/port-cros.jpg" alt="Port-Cros">
        <div class="info-texte">
            <h3>Parc National de Port-Cros</h3>
            <p>📅 18-25 Février 2025<br>
            💶 À partir de 35€ par personne</br></p>
        </div>
    </div>


    <div class="un-carré-info">
        <img src="https://checkyeti.imgix.net/images/optimized/boat-trips-to-calanques-national-park.jpg" alt="Calanques de Marseille">
        <div class="info-texte">
            <h3>Calanques de Marseille</h3>
            <p>📅 1-8 Mars 2025<br>
            💶 À partir de 40€ par personne</br></p>
        </div>
    </div>

    <div class="un-carré-info">
        <img src="https://cdt66.media.tourinsoft.eu/upload/DSC-2352.jpg" alt="Réserve Cerbère-Banyuls">
        <div class="info-texte">
            <h3>Réserve de Cerbère-Banyuls</h3>
            <p>📅 10-17 Avril 2025<br>
            💶 À partir de 45€ par personne</br></p>
        </div>
    </div>


    <div class="un-carré-info">
        <img src="https://bonifacio.fr/app/uploads/bonifacio/2023/11/thumbs/archipel-iles-lavezzi-vue-aerienne-bonifacio-1920x960.jpg" alt="Îles Lavezzi">
        <div class="info-texte">
            <h3>Îles Lavezzi - Corse</h3>
            <p>📅 5-12 Mai 2025<br>
            💶 À partir de 50€ par personne</br></p>
        </div>
    </div>

    <div class="un-carré-info">
        <img src="https://www.voyageavecnous.fr/wp-content/uploads/2023/04/aller-a-comino.jpg" alt="Île de Gozo/Malte">
        <div class="info-texte">
            <h3>Île de Gozo/Malte</h3>
            <p>📅 15-22 Mai 2025<br>
            💶 À partir de 55€ par personne</br></p>
        </div>
    </div>

    <div class="un-carré-info">
        <img src="https://provence-alpes-cotedazur.com/app/uploads/crt-paca/2020/07/thumbs/plage-porquerolles-c-chillio-1920x960.jpg" alt="Porquerolles">
        <div class="info-texte">
            <h3>Porquerolles</h3>
            <p>📅 22-25 Mai 2025<br>
            💶 À partir de 60€ par personne</br></p>
        </div>
    </div>
  
     <div class="un-carré-info">
        <img src="https://coelacantheplongee.fr/media/2024/11/IMG_3336_v2-scaled.jpg">
        <div class="info-texte">
            <h3>Les îles Medes à l’Estartit en Espagne</h3>
            <p>📅 1-8 Juin 2025<br>
            💶 À partir de 80€ par personne</br></p>
        </div>
    </div>

    <div class="un-carré-info">
        <img src="https://www.spain.info/export/sites/segtur/.content/imagenes/cabeceras-grandes/baleares/velero-mar-mallorca-i525635531.jpg">
        <div class="info-texte">
            <h3>Le parc national de Cabrera aux îles Baléares en Espagne</h3>
            <p>📅 8-11 Juin 2025 2025<br>
            💶 À partir de 72€ par personne</br></p>
        </div>
    </div>
    
	
	<div class="un-carré-info">
        <img src="https://cruceroskontiki.com/wp-content/uploads/2022/03/0.jpg">
        <div class="info-texte">
            <h3>Île de Tabarca en Espagne</h3>
            <p>📅 30-6 Juin 2025<br>
            💶 À partir de 79€ par personne</br></p>
        </div>
    </div>


	<div class="un-carré-info">
        <img src="https://ajaccio.media.tourinsoft.eu/upload/Copie-de-Plage-de-Capo-di-Feno-Phototheque-Office-de-Tourisme-d-Ajaccio--c--J.C.-Attard.jpg">
        <div class="info-texte">
            <h3>Capo di Feno à Ajaccio</h3>
            <p>📅 6-11 Juillet 2025<br>
            💶 À partir de 61€ par personne</br></p>
        </div>
    </div>

	
</div>

<footer>
 	<div class="footer-main">
	 <img src="../style/Image/logoD.png" alt="logo">
		<div class="footer-container">
			<h3>Liens Utiles</h3>
			  <p><a href="../index.html">Accueil</a></p>
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
		</div>
	</div>
	<p> © 2025 DeepDive | All rights reserved </p>
 </footer>
	
 </body>
</html>
	
 </body>
</html>
