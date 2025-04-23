<?php
// Charger le fichier JSON
session_start();
date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("voyagesv2.json");
$voyages = json_decode($voyages_json, true);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche/vue synthetique</title> 
    <link rel="stylesheet" href="../style/nav_footer.css"> 
    <link rel="stylesheet" href="../style/recherche.css">
</head>
<body>
<?php include("navbar.php"); ?>

<h2 class="meilleure-plans">Les <span>meilleurs</span> plans !</h2>
<div class="ensemble-carré-info">
    <?php if (is_array($voyages)): ?>
        <?php foreach ($voyages as $index => $voyage): ?>
        <div class="un-carré-info">
            <img src="<?= $voyage['image'] ?>" alt="<?= $voyage['titre'] ?>">
            <div class="info-texte">
                <h3><?= $voyage['titre'] ?></h3>
                <b>
                    📅 <?= $voyage['dates'] ?><br>
                    💶 À partir de <?= $voyage['prix'] ?> par personne<br>
                    <o class="stars"><?= $voyage['etoiles'] ?></o> (<?= $voyage['avis'] ?> avis)
                </b>
                <br><br>

                    <a href="vuedetaillev2.php?id=<?= $index ?>"class="boutton-recherche">Vue détaillée du voyage</a>
            
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="color: red; text-align: center;">Erreur : impossible de lire les données. Vérifie le fichier <code>voyagesv2.json</code>.</p>
    <?php endif; ?>
</div>

<?php include("footer.php"); ?>
</body>
</html>

