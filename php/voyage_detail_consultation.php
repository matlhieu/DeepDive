<?php

date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("voyagesv2.json");
$voyages = json_decode($voyages_json, true);

$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;
$voyage = ($id >= 0 && isset($voyages[$id])) ? $voyages[$id] : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du voyage</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/recapitulatif.css">
</head>
<body>
<?php include("navbar.php"); ?>

<?php if ($voyage): ?>
<section class="hero" style="background-image: url('<?= $voyage['image'] ?>');">
    <div class="overlay">
        <h1>Détail du voyage à <span><?= $voyage['titre'] ?></span></h1>
    </div>
</section>


<div class="form-section">
    <label>Hébergement :</label>
    <div class="ensemble-carré-info">
        <label class="un-carré-info inclus">
            <img src="<?= $voyage['hebergement_inclus']['image'] ?>" alt="">
            <span><?= $voyage['hebergement_inclus']['label'] ?></span>
        </label>
    </div>
</div>


<div class="form-section">
    <label>Restauration :</label>
    <div class="ensemble-carré-info">
        <label class="un-carré-info inclus">
            <img src="<?= $voyage['restauration_incluse']['image'] ?>" alt="">
            <span><?= $voyage['restauration_incluse']['label'] ?></span>
            <small><?= $voyage['restauration_incluse']['description'] ?></small>
            
        </label>
    </div>
</div>


<div class="form-section">
    <label>Activités incluses :</label>
    <div class="ensemble-carré-info">
        <?php foreach ($voyage['activites_incluses'] as $activite): ?>
            <label class="un-carré-info inclus">
                <img src="<?= $activite['image'] ?>" alt="">
                <span><?= $activite['label'] ?></span>
            </label>
        <?php endforeach; ?>
    </div>
</div>


<div class="form-section">
    <label>Transport :</label>
    <div class="ensemble-carré-info">
        <label class="un-carré-info inclus">
            <img src="<?= $voyage['transport_inclus']['image'] ?>" alt="">
            <span><?= $voyage['transport_inclus']['label'] ?></span>
        </label>
    </div>
</div>

    <label>Prix du voyage : <?= ($voyage['prix']) ?></label>
    <label>Date du voyage : Du <?= ($voyage['date_debut_incluses']) ? date('d/m/Y', strtotime($voyage['date_debut_incluses'])) : 'Non précisé' ?> au <?= ($voyage['date_fin_incluses']) ? date('d/m/Y', strtotime($voyage['date_fin_incluses'])) : 'Non précisé' ?></label>
    <br><br>
<?php else: ?>
    <p style="color:red; text-align:center;">Erreur : voyage introuvable.</p>
<?php endif; ?>

<?php include("footer.php"); ?>
</body>
</html>
