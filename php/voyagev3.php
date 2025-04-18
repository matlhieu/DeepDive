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
					<h2>🌊Plongez-vous dans le Parc National de Port-Cros !</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>
						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						            <button class="boutton-recherche">
           Réserver
            </button>
				</div>
		</div>


		<div class="un-carré-info">
				<img src="https://checkyeti.imgix.net/images/optimized/boat-trips-to-calanques-national-park.jpg" alt="Calanques de Marseille">
				<div class="info-texte">
					<h2>🌊Découvrez les profondeurs des Calanques de Marseille</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
              Réserver
            </button>
				</div>
		</div>

		<div class="un-carré-info">
				<img src="https://cdt66.media.tourinsoft.eu/upload/DSC-2352.jpg" alt="Réserve Cerbère-Banyuls">
				<div class="info-texte">
					<h2>🌊La Réserve de Cerbère-Banyuls vous appelle !</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
               Réserver
            </button>
				</div>
		</div>


		<div class="un-carré-info">
				<img src="https://bonifacio.fr/app/uploads/bonifacio/2023/11/thumbs/archipel-iles-lavezzi-vue-aerienne-bonifacio-1920x960.jpg" alt="Îles Lavezzi">
				<div class="info-texte">
					<h2>🌊Cap sur les Îles Lavezzi en Corse !</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
              Réserver
            </button>
				</div>
		</div>

		<div class="un-carré-info">
				<img src="https://www.voyageavecnous.fr/wp-content/uploads/2023/04/aller-a-comino.jpg" alt="Île de Gozo/Malte">
				<div class="info-texte">
					<h2>🌊Osez l'Île de Gozo/Malte !</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
                Réserver
            </button>
				</div>
		</div>

		<div class="un-carré-info">
				<img src="https://provence-alpes-cotedazur.com/app/uploads/crt-paca/2020/07/thumbs/plage-porquerolles-c-chillio-1920x960.jpg" alt="Porquerolles">
				<div class="info-texte">
					<h2>🌊Envolez-vous vers Porquerolles !</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
               Réserver
            </button>
				</div>
		</div>

		 <div class="un-carré-info">
				<img src="https://coelacantheplongee.fr/media/2024/11/IMG_3336_v2-scaled.jpg">
				<div class="info-texte">
					<h2>🌊Prenez le chemin des îles Medes à l’Estartit en Espagne !</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
               Réserver
            </button>
				</div>
		</div>

		<div class="un-carré-info">
				<img src="https://www.spain.info/export/sites/segtur/.content/imagenes/cabeceras-grandes/baleares/velero-mar-mallorca-i525635531.jpg">
				<div class="info-texte">
					<h2>🌊Réveillez le plongeur en vous : direction le Parc national de Cabrera aux îles Baléares en Espagne</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
               Réserver
            </button>
				</div>
		</div>


	<div class="un-carré-info">
				<img src="https://cruceroskontiki.com/wp-content/uploads/2022/03/0.jpg">
				<div class="info-texte">
					<h2>🌊Ouvrez les portes d'un monde envouteux : l'Île de Tabarca en Espagne vous attend</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
               Réserver
            </button>
				</div>
		</div>


	<div class="un-carré-info">
				<img src="https://ajaccio.media.tourinsoft.eu/upload/Copie-de-Plage-de-Capo-di-Feno-Phototheque-Office-de-Tourisme-d-Ajaccio--c--J.C.-Attard.jpg">
				<div class="info-texte">
					<h2>🌊Souvenirs inoubliables garanties à Capo di Feno à Ajaccio</h2>
					<p>📅Décollez dès le 10/05/2025 pour revenir le 18/05/2025
					</p>

					<y>👨‍👩‍👧‍👦Nombre de personnes : 4</y>
					<p>🕒Durée : 8 jours</p>

					<p>🏨Hébergement : Hotel Trivago</p>
					<p>🍝Restaurants : Jour 1 : Pasta,Jour 2 : Pasta, Jour 3 : Pasta, Jour 4 : Pasta, Jour 5 : Pasta, Jour 6 : Pasta, Jour 7 : Pasta </p>
					<p>🏖️Activité de plages: Plongée, jet skie, se dentendre sur la plage </p>
					<p>🚗Transport : Voiture déja loué Citroën 206 + carte de bus pour tout le monde </p>

						<p> 💶Prix : 300€ </p> 
						<k>Avis <o class="stars">★★★★⯨</o> (254 avis)</k>
						<button class="boutton-recherche">
                Réserver
            </button>
				</div>
		</div>


</div>

<?php include("footer.php") ?>

 </body>
</html>

 </body>
</html>
