<?php
session_start();

date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("../json/voyagesv2.json");
$voyages = json_decode($voyages_json, true);
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="../style/style.css"> 
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
	 <a href="recherchev1.php" class="btn-plongez">Plongez dès Maintenant</a>
	</div>
 </section>
 
 <section class="hero">
	<h2>Bienvenue sur Deep<span>Dive</span></h2>
	<h4>Plongez au cœur des plus <span><u>beaux sites sous-marins de Méditerranée</u></span>. 
	Que vous soyez débutant ou plongeur expérimenté, nous proposons 
	des séjours adaptés à tous !</h4>
 </section>
 
	<section class="destinations">
		<h2>Nos voyages les plus <span>Populaires</span></h2>

				<div class="box-content">
						<?php if (is_array($voyages)): ?>
	<?php
	$voyages = array_slice($voyages, -4);
	?>
								<?php foreach ($voyages as $index => $voyage): ?>
										<div class="box">
												<img src="<?= ($voyage['image']) ?>" alt="<?= ($voyage['titre']) ?>">
												<div class="content">
														<h3><?= ($voyage['titre']) ?></h3>
														<p>
																📅 Du <?= date('d/m/Y', strtotime($voyage['date_debut'])) ?> au <?= date('d/m/Y', strtotime($voyage['date_fin2'])) ?><br>
																💶 <?= ($voyage['prix']) ?> pour <?= $voyage['nb_personnes'] ?> personne(s)<br>
																<span class="stars"><?= ($voyage['etoiles']) ?></span> (<?= ($voyage['avis']) ?> avis)
															<br>
															Vous pourrez modifier les options du voyages tels que le nombre de personnes, les activités, les hébergements... et donc le prix en cliquant sur Réserver
														</p>
												</div>
												<button class="btn">
													<a href="vuedetaillev2.php?id=<?= $index ?>">Réserver</a>
												</button>
										</div>
								<?php endforeach; ?>
						<?php else: ?>
								<p style="color: red; text-align: center;">Erreur : impossible de lire les données. Vérifie le fichier <code>voyagesv2.json</code>.</p>
						<?php endif; ?>
				</div>
		</section>

<?php include("footer.php") ?>
	
 </body>
</html>
