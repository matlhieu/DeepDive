<?php
// recapitulatifv2.php

date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("voyagesv2.json");
$voyages = json_decode($voyages_json, true);

$id = isset($_POST['id']) ? (int)$_POST['id'] : -1;
$voyage = ($id >= 0 && isset($voyages[$id])) ? $voyages[$id] : null;

$hebergement = $_POST['hebergement'] ?? '';
$restauration = $_POST['restauration'] ?? '';
$transport = $_POST['transport'] ?? '';
$activites = $_POST['activites'] ?? [];
$nb_personnes = $_POST['nb_personnes'] ?? 'Non précisé';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récapitulatif du voyage personnalisé</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/recapitulatif.css">
</head>
<body>
<?php include("navbar.php"); ?>

<?php if ($voyage): ?>
<section class="hero" style="background-image: url('<?= $voyage['image'] ?>');">
    <div class="overlay">
        <h1>Récapitulatif de votre voyage à <span><?= $voyage['titre'] ?></span></h1>
    </div>
</section>

    
<label>Voici votre configuration de voyage : </label>
<br><br>

<!-- Hébergements -->
<div class="form-section">
    <label>Hébergement sélectionné :</label>
    <div class="ensemble-carré-info">
        <?php foreach ($voyage['hebergements'] as $option): ?>
            <?php if ($option['label'] === $hebergement): ?>
                <label class="un-carré-info inclus">
                    <input type="hidden">
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= ($option['label']) ?></span>
                </label>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- Restauration -->
<div class="form-section">
    <label>Restauration sélectionnée :</label>
    <div class="ensemble-carré-info">
        <?php foreach ($voyage['restaurations'] as $option): ?>
            <?php if ($option['label'] === $restauration): ?>
                <label class="un-carré-info inclus">
                    <input type="hidden">
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= ($option['label']) ?></span>
                    <?php if (isset($option['description'])): ?>
                        <small><?= ($option['description']) ?></small>
                    <?php endif; ?>
                </label>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

    <!-- Activités -->
    <div class="form-section">
        <label>Activité(s) sélectionnée(s) :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($activites as $act): ?>
                <?php foreach ($voyage['activites'] as $option): ?>
                    <?php if ($option['label'] === $act): ?>
                        <label class="un-carré-info inclus">
                            <input type="hidden">
                            <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                            <span><?= ($option['label']) ?></span>
                            <small>Nombre de personnes pour cette activité : <?= ($nb_personnes) ?></small>
                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>


<!-- Transport -->
<div class="form-section">
    <label>Transport sélectionné :</label>
    <div class="ensemble-carré-info">
        <?php foreach ($voyage['transports'] as $option): ?>
            <?php if ($option['label'] === $transport): ?>
                <label class="un-carré-info inclus">
                    <input type="hidden">
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= htmlspecialchars($option['label']) ?></span>
                </label>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

    <!-- Prix du voyage -->
        <label>Prix du voyage : <?= ($voyage['prix']) ?></label>
    
<!-- Boutons navigation -->
<form action="vuedetaillev2.php" method="GET" style="text-align:center; margin-top: 2rem;">
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit" class="boutton-recherche">Modifier le voyage</button>
</form>

<form action="paiement.php" method="POST" style="text-align:center; margin-top: 1.5rem;">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="hebergement" value="<?= ($hebergement) ?>">
    <input type="hidden" name="restauration" value="<?= ($restauration) ?>">
    <input type="hidden" name="transport" value="<?= ($transport) ?>">
    <?php foreach ($activites as $act): ?>
        <input type="hidden" name="activites[]" value="<?= ($act) ?>">
    <?php endforeach; ?>
    <button type="submit" class="boutton-recherche">Confirmer et passer au paiement</button>
</form>

<?php else: ?>
    <p style="color:red; text-align:center;">Erreur : voyage introuvable.</p>
<?php endif; ?>

<?php include("footer.php"); ?>
</body>
</html>
