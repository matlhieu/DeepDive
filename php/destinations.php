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
					<p>Plongez au cœur du premier parc national marin d’Europe, un véritable trésor naturel où 
					la faune et la flore prospèrent dans des eaux protégées. Situé au large de la Côte d’Azur, 
					le Parc National de Port-Cros offre des plongées inoubliables dans un cadre préservé.
					Admirez une biodiversité exceptionnelle : mérous imposants, bancs de barracudas, raies, 
					langoustes et gorgones colorées évoluent dans un écosystème riche et intact. Que vous soyez 
					novice ou plongeur expérimenté, vous pourrez explorer des sites mythiques comme la Gabinière, 
					les Dalles de Bagaud ou l’épave du Donator, l’une des plus belles de Méditerranée.
					Nos guides passionnés vous emmènent à la découverte de ce joyau marin, où chaque immersion est une aventure fascinante.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>
					</div>
				 </div>
				</section>
				<!-- box -->
				<section id="parc">
				 <div class="box">
					<img src="https://www.lebaillidesuffren.com/wp-content/uploads/sites/174/2020/06/port-cros.jpg" alt="Port-Cros">
					<div class="content">
					<h2>Parc National de Port-Cros</h2>
					<p>Plongez dans un véritable sanctuaire marin, protégé depuis 1963 et reconnu comme 
					le premier parc national marin d’Europe. Situé au large de la Côte d’Azur, le Parc 
					National de Port-Cros offre des eaux cristallines et une biodiversité exceptionnelle, 
					faisant de chaque plongée une expérience inoubliable.Admirez une faune riche et 
					variée : mérous majestueux, bancs de barracudas, dentis, langoustes et gorgones 
					flamboyantes évoluent dans un décor préservé. Parmi les sites emblématiques, 
					la Gabinière vous émerveillera par ses mérous curieux, tandis que l’épave du Donator 
					ravira les plongeurs expérimentés en quête d’aventure. Encadré par nos 
					moniteurs passionnés, partez à la découverte de ces paysages sous-marins 
					spectaculaires et laissez-vous séduire par la beauté sauvage de Port-Cros.
					</p>
					<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				 </div>
				</section>
				<!-- box -->
				<section id="calanques">
				 <div class="box">
					<img src="https://checkyeti.imgix.net/images/optimized/boat-trips-to-calanques-national-park.jpg" alt="Calanques de Marseille">
					<div class="content">
						<h2>Calanques de Marseille</h2>
						<p>Entre falaises majestueuses et eaux cristallines, le Parc National des Calanques abrite 
						certains des plus beaux sites de plongée de France. Des fonds rocheux sculptés par le temps 
						aux épaves mythiques, chaque plongée est une aventure au cœur d’une biodiversité exceptionnelle.
						Explorez des paysages sous-marins spectaculaires où se mêlent gorgones rouges, coraux, mérous, 
						dentis, barracudas et nudibranches. Que vous soyez plongeur débutant ou expérimenté, 
						vous découvrirez des sites emblématiques comme l’Île de Riou, la Grotte à Corail ou l’épave du Liban.
						Accompagné par nos moniteurs passionnés, partez pour une exploration inoubliable dans un cadre préservé, 
						où la nature dévoile toute sa splendeur.
						</p>
							<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				 </div>
				</section>
				<!-- box -->
				<section id="réserve">
				<div class="box">
					<img src="https://cdt66.media.tourinsoft.eu/upload/DSC-2352.jpg" alt="Réserve Cerbère-Banyuls">
					<div class="content">
						<h2>Réserve de Cerbère-Banyuls</h2>
						<p>Découvrez un véritable sanctuaire marin au cœur de la Côte Vermeille ! 
						Première réserve marine de France, la Réserve Naturelle de Cerbère-Banyuls 
						s’étend sur plus de 6 km de côtes et protège une biodiversité exceptionnelle.
						Plongez dans un monde fascinant où gorgones flamboyantes, coralligène, mérous curieux,
						bancs de dorades et hippocampes évoluent dans des eaux d’une clarté remarquable. 
						Que vous soyez débutant ou plongeur confirmé, vous pourrez explorer des sites variés 
						allant des fonds rocheux aux tombants spectaculaires, sans oublier le célèbre sentier sous-marin 
						accessible en snorkeling. Nos moniteurs passionnés vous guideront pour une immersion 
						inoubliable dans cet écosystème unique, classé pour sa richesse et sa beauté.
						</p>
							<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				 </div>
				</section>
				<!-- box -->
				<div class="box">
					<img src="https://bonifacio.fr/app/uploads/bonifacio/2023/11/thumbs/archipel-iles-lavezzi-vue-aerienne-bonifacio-1920x960.jpg" alt="Îles Lavezzi">
					<div class="content">
					<h2>Îles Lavezzi - Corse</h2>
					<p>Plongez au cœur d’un paradis aquatique ! Situées entre la Corse et la Sardaigne, 
					les Îles Lavezzi offrent des eaux cristallines, 
					une faune et une flore exceptionnelles, ainsi que des paysages sous-marins spectaculaires.
					Que vous soyez plongeur débutant ou expérimenté, partez à la découverte des fonds marins riches 
					en gorgones colorées, mérous majestueux, barracudas et épaves mystérieuses. Avec une visibilité 
					impressionnante et des sites adaptés à tous les niveaux, chaque plongée aux Lavezzi est une aventure unique.
					Nos guides professionnels vous accompagnent en toute sécurité pour vous faire vivre une expérience 
					inoubliable dans l’un des plus beaux spots de plongée de la Méditerranée.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://www.voyageavecnous.fr/wp-content/uploads/2023/04/aller-a-comino.jpg" alt="Île de Gozo/Malte">
					<div class="content">
					<h2>Île de Gozo/Malte</h2>
					<p>L’île de Gozo, joyau caché de l’archipel maltais, est une destination 
					incontournable pour les amateurs de plongée. Avec ses eaux cristallines, 
					ses grottes spectaculaires et ses impressionnants tombants, Gozo offre une 
					diversité de sites sous-marins exceptionnels adaptés à tous les niveaux.
					Partez à la découverte de paysages marins uniques, où évoluent mérous, barracudas, 
					raies, hippocampes et nudibranches colorés. Explorez des sites emblématiques comme :
					Le Blue Hole, une formation rocheuse fascinante menant à un vaste réseau de tunnels sous-marins.
					L’épave du MV Karwela, un ferry coulé devenu un véritable récif artificiel regorgeant de vie.
					Les grottes de Santa Maria, où la lumière crée des jeux d’ombres magiques sur les parois rocheuses.
					Accompagné de nos guides expérimentés, plongez dans un monde sous-marin captivant où chaque immersion révèle une nouvelle merveille.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://coelacantheplongee.fr/media/2024/11/IMG_3336_v2-scaled.jpg">
					<div class="content">
					<h2>Les îles Medes à l’Estartit en Espagne</h2>
					<p>Situées en Catalogne, face à l’Estartit, les Îles Medes sont l’un 
					des meilleurs sites de plongée de la Méditerranée. Classé réserve marine 
					depuis 1990, cet archipel protégé offre des fonds sous-marins d’une 
					richesse exceptionnelle, parfaits pour les plongeurs de tous niveaux.
					Découvrez un écosystème unique où évoluent mérous imposants, bancs de 
					barracudas, raies, langoustes et coraux colorés. Parmi les sites incontournables :
					La Vaca, célèbre pour ses impressionnantes grottes illuminées par la lumière naturelle.
					Le Dofi Sud, un tunnel fascinant où l’on croise souvent des bancs de daurades 
					et de barracudas.
					Les Ferranelles, un spot idéal pour observer la faune dans une eau cristalline.
					Accompagné de nos guides passionnés, plongez dans ce sanctuaire marin protégé et 
					laissez-vous émerveiller par la beauté sauvage des Îles Medes.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://www.spain.info/export/sites/segtur/.content/imagenes/cabeceras-grandes/baleares/velero-mar-mallorca-i525635531.jpg">
					<div class="content">
					<h2>Parc national de Cabrera aux îles Baléares en Espagne</h2>
					<p>Situé dans l'archipel de Cabrera, au large de Majorque, le Parc National 
					Maritime-Terrestre de Cabrera est un véritable sanctuaire marin, protégé depuis 1991. 
					Ce paradis sous-marin abrite une biodiversité spectaculaire, idéale pour 
					les passionnés de plongée.
					Les eaux cristallines du parc cachent une richesse marine inégalée : mérous, raies, barracudas, 
					bancs de poissons multicolores et des prairies de posidonie parmi les plus préservées de la Méditerranée. 
					Les sites de plongée sont variés et captivants :
					La Cova Blava, une grotte sous-marine où la lumière filtre et crée des jeux d'ombres bleutées incroyables.
					Les falaises de Ses Bledes, où la faune marine est particulièrement abondante.
					Les fonds autour de Na Foradada, avec ses paysages sous-marins fascinants.
					Accompagné par nos guides experts, plongez dans l’un des plus beaux et des 
					mieux préservés spots de plongée des Baléares, où chaque immersion vous réserve 
					des découvertes uniques.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://cruceroskontiki.com/wp-content/uploads/2022/03/0.jpg">
					<div class="content">
					<h2>Île de Tabarca en Espagne</h2>
					<p>L'île de Tabarca, située au large de la côte d'Alicante, est un véritable trésor de la Méditerranée, connue pour ses eaux limpides et sa faune marine exceptionnelle. Classée réserve marine, Tabarca offre un cadre idéal pour les plongeurs en quête d'aventure et de découverte.
					Explorez des fonds marins d'une grande richesse où vous croiserez mérous, dorades, raies, gorgones colorées et étoiles de mer. Parmi les sites les plus réputés, ne manquez pas :
					La Cova de les Llagostes, un site parfait pour observer les langoustes et autres espèces locales.
					Les fonds autour de l'île, avec des zones rocheuses abritant une faune dense.
					Les épaves submergées, idéales pour les plongeurs plus expérimentés.
					Accompagné de nos guides passionnés, plongez au cœur de cet écosystème protégé et vivez une expérience sous-marine inoubliable sur l'une des plus belles îles espagnoles.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://ajaccio.media.tourinsoft.eu/upload/Copie-de-Plage-de-Capo-di-Feno-Phototheque-Office-de-Tourisme-d-Ajaccio--c--J.C.-Attard.jpg" alt="Porquerolles">
					<div class="content">
					<h2>Capo di Feno à Ajaccio</h2>
					<p>Le site de Capo di Feno, situé à quelques kilomètres d'Ajaccio, est un véritable joyau sous-marin de la Corse. Avec ses eaux cristallines, ses falaises spectaculaires et sa biodiversité marine, c’est un endroit incontournable pour les passionnés de plongée.
					Explorez un monde fascinant où se mêlent mérous, poissons de roche, gorgones colorées, langoustes et étoiles de mer. Les sites de plongée autour de Capo di Feno offrent une grande variété de paysages sous-marins :
					Les tombants rocheux, où la vie marine est abondante et où vous pouvez observer des bancs de poissons.
					Les grottes sous-marines, idéales pour les explorations en toute sécurité.
					Les fonds sablonneux et les herbiers de posidonie, habitats importants pour la faune locale.
					Guidé par nos moniteurs expérimentés, vivez une immersion unique dans cet écosystème préservé et profitez de la beauté sauvage de la mer Méditerranée.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://media-cdn.tripadvisor.com/media/photo-m/1280/23/55/5a/ec/caption.jpg" alt="Iles Canaries">
					<div class="content">
					<h2>Iles Canaries</h2>
					<p>Le site de Capo di Feno, situé à quelques kilomètres d'Ajaccio, est un véritable joyau sous-marin de la Corse. Avec ses eaux cristallines, ses falaises spectaculaires et sa biodiversité marine, c’est un endroit incontournable pour les passionnés de plongée.
					Explorez un monde fascinant où se mêlent mérous, poissons de roche, gorgones colorées, langoustes et étoiles de mer. Les sites de plongée autour de Capo di Feno offrent une grande variété de paysages sous-marins :
					Les tombants rocheux, où la vie marine est abondante et où vous pouvez observer des bancs de poissons.
					Les grottes sous-marines, idéales pour les explorations en toute sécurité.
					Les fonds sablonneux et les herbiers de posidonie, habitats importants pour la faune locale.
					Guidé par nos moniteurs expérimentés, vivez une immersion unique dans cet écosystème préservé et profitez de la beauté sauvage de la mer Méditerranée.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (120 avis)</p>

					</div>
					<div class="box">
					<img src="https://content.tui.co.uk/adamtui/2023_3/9_15/fbd89920-eea4-4291-bae7-afc001006ccb/LOC_003184_shutterstock_2034226538WebOriginalCompressed.jpg?i10c=img.resize(width:1080);img.crop(width:1080%2Cheight:608)" alt="?=Almyrida">
					<div class="content">
					<h2>Almyrida en Grèce</h2>
					<p>Le site de Capo di Feno, situé à quelques kilomètres d'Ajaccio, est un véritable joyau sous-marin de la Corse. Avec ses eaux cristallines, ses falaises spectaculaires et sa biodiversité marine, c’est un endroit incontournable pour les passionnés de plongée.
					Explorez un monde fascinant où se mêlent mérous, poissons de roche, gorgones colorées, langoustes et étoiles de mer. Les sites de plongée autour de Capo di Feno offrent une grande variété de paysages sous-marins :
					Les tombants rocheux, où la vie marine est abondante et où vous pouvez observer des bancs de poissons.
					Les grottes sous-marines, idéales pour les explorations en toute sécurité.
					Les fonds sablonneux et les herbiers de posidonie, habitats importants pour la faune locale.
					Guidé par nos moniteurs expérimentés, vivez une immersion unique dans cet écosystème préservé et profitez de la beauté sauvage de la mer Méditerranée.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (88 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://www.lepetitmaltais.com/wp-content/uploads/2022/10/blue-hole.jpeg" alt="Comino">
					<div class="content">
					<h2>Comino à Malte</h2>
					<p>Le site de Capo di Feno, situé à quelques kilomètres d'Ajaccio, est un véritable joyau sous-marin de la Corse. Avec ses eaux cristallines, ses falaises spectaculaires et sa biodiversité marine, c’est un endroit incontournable pour les passionnés de plongée.
					Explorez un monde fascinant où se mêlent mérous, poissons de roche, gorgones colorées, langoustes et étoiles de mer. Les sites de plongée autour de Capo di Feno offrent une grande variété de paysages sous-marins :
					Les tombants rocheux, où la vie marine est abondante et où vous pouvez observer des bancs de poissons.
					Les grottes sous-marines, idéales pour les explorations en toute sécurité.
					Les fonds sablonneux et les herbiers de posidonie, habitats importants pour la faune locale.
					Guidé par nos moniteurs expérimentés, vivez une immersion unique dans cet écosystème préservé et profitez de la beauté sauvage de la mer Méditerranée.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (67 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://www.lustricadiving.it/wp-content/uploads/photo-gallery/httplocalhostlustricadivingwp-contentuploads/Ustica_Torre-Spalmatore.jpg" alt="Ile Ustica">
					<div class="content">
					<h2>Ile Ustica en Italie</h2>
					<p>Le site de Capo di Feno, situé à quelques kilomètres d'Ajaccio, est un véritable joyau sous-marin de la Corse. Avec ses eaux cristallines, ses falaises spectaculaires et sa biodiversité marine, c’est un endroit incontournable pour les passionnés de plongée.
					Explorez un monde fascinant où se mêlent mérous, poissons de roche, gorgones colorées, langoustes et étoiles de mer. Les sites de plongée autour de Capo di Feno offrent une grande variété de paysages sous-marins :
					Les tombants rocheux, où la vie marine est abondante et où vous pouvez observer des bancs de poissons.
					Les grottes sous-marines, idéales pour les explorations en toute sécurité.
					Les fonds sablonneux et les herbiers de posidonie, habitats importants pour la faune locale.
					Guidé par nos moniteurs expérimentés, vivez une immersion unique dans cet écosystème préservé et profitez de la beauté sauvage de la mer Méditerranée.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (28 avis)</p>

					</div>
				</div>
				<div class="box">
					<img src="https://cdn.futura-sciences.com/sources/images/diaporama/1592-les-plus-belles-plages-du-monde/fs-535258615.jpg" alt="Oludeniz">
					<div class="content">
					<h2>Oludenize en Turquie</h2>
					<p>Le site de Capo di Feno, situé à quelques kilomètres d'Ajaccio, est un véritable joyau sous-marin de la Corse. Avec ses eaux cristallines, ses falaises spectaculaires et sa biodiversité marine, c’est un endroit incontournable pour les passionnés de plongée.
					Explorez un monde fascinant où se mêlent mérous, poissons de roche, gorgones colorées, langoustes et étoiles de mer. Les sites de plongée autour de Capo di Feno offrent une grande variété de paysages sous-marins :
					Les tombants rocheux, où la vie marine est abondante et où vous pouvez observer des bancs de poissons.
					Les grottes sous-marines, idéales pour les explorations en toute sécurité.
					Les fonds sablonneux et les herbiers de posidonie, habitats importants pour la faune locale.
					Guidé par nos moniteurs expérimentés, vivez une immersion unique dans cet écosystème préservé et profitez de la beauté sauvage de la mer Méditerranée.
					</p>
						<p> 💶Prix : 300€ - Avis <o class="stars">★★★★⯨</o> (254 avis)</p>

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
