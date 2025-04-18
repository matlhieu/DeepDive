<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <title>Recherche - DeepDive</title>
	<link rel="stylesheet" href="../style/nav_footer.css"> 
    <link rel="stylesheet" href="../style/search.css">

</head>
<header>
	<?php include("navbar.php") ?>
</header>
<body>
  
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
<?php include("footer.php") ?>
	
 </body>
</html>
	
 </body>
</html>

