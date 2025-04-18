<?php
// voyage.php

// Récupération de l'ID depuis l'URL (ex: voyage.php?id=3)
if (!isset($_GET['id'])) {
    echo "<p>Erreur : aucun ID de voyage fourni.</p>";
    exit;
}

$id = $_GET['id'];

// Chargement du fichier JSON des voyages
$data = json_decode(file_get_contents("voyages.json"), true);

if (!isset($data['voyages'][$id])) {
    echo "<p>Erreur : voyage introuvable.</p>";
    exit;
}

$voyage = $data['voyages'][$id];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du voyage : <?php echo htmlspecialchars($voyage['titre']); ?></title>
    <link rel="stylesheet" href="../style/nav_footer.css"> 
    <link rel="stylesheet" href="../style/search.css">
</head>
<body>
<nav class="navibar">
    <!-- Barre de navigation -->
    <div class="logo-container">
		<div class="logo"> 
			<a href="admin.php"><img src="../style/Image/logo4.png" alt="logo"></a>
		</div>
			<p class="nav-titre">Deep<span>Dive</span></p>
	  </div>
		<div class="menu">
			<ul class="navi-liens">
            <li><a href="index.php" class="navi-lien">ACCUEIL</a></li>
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


    <h1><?php echo htmlspecialchars($voyage['titre']); ?></h1>
    <p><strong>Dates :</strong> du <?php echo $voyage['date_debut']; ?> au <?php echo $voyage['date_fin']; ?> (<?php echo $voyage['duree']; ?> jours)</p>
    <p><strong>Prix total :</strong> <?php echo $voyage['prix_total']; ?> €</p>

    <form method="post" action="recapitulatif.php">
        <input type="hidden" name="voyage_id" value="<?php echo $voyage['id']; ?>">

        <?php foreach ($voyage['etapes'] as $index => $etape): ?>
        <?php echo htmlspecialchars($etape['titre']); ?> (<?php echo $etape['lieu']; ?>)</legend>
                <p><strong>Du <?php echo $etape['date_arrivee']; ?> au <?php echo $etape['date_depart']; ?></strong></p>

                <?php foreach ($etape['options'] as $categorie => $options): ?>
                    <label for="<?php echo $categorie . $index; ?>">
                        <?php echo ucfirst($categorie); ?> :
                    </label>
                    <select name="etapes[<?php echo $index; ?>][<?php echo $categorie; ?>]" id="<?php echo $categorie . $index; ?>">
                        <?php foreach ($options as $option): ?>
                            <option value="<?php echo htmlspecialchars($option); ?>">
                                <?php echo htmlspecialchars($option); ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br><br>
                <?php endforeach; ?>

                <label>Nombre de personnes :</label>
                <input type="number" name="etapes[<?php echo $index; ?>][personnes]" min="1" value="1"><br>
            </fieldset>
        <?php endforeach; ?>

        <button type="submit">Valider ce voyage</button>
    </form>
    <footer>
    <!-- Pied de page -->
    <div class="footer-main">
	 <img src="../style/Image/logoD.png" alt="logo">
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