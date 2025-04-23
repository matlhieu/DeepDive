<?php

sessions_start();
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
    <title>Vue détaillée du voyage</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/vuedetaille.css">
</head>
<body>
<?php include("navbar.php"); ?>

<?php if ($voyage): ?>
<section class="hero" style="background-image: url('<?= $voyage['image'] ?>');">
    <div class="overlay">
        <h1>Explorez <span><?= $voyage['titre'] ?></span> !</h1>
    </div>
</section>

<label>Les carrés déjà cochés sont les options choisies par le voyage, mais vous pouvez modifier cela.</label>
<br><br>

<form action="recapitulatifv2.php" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">

    <!-- Hébergements -->
    <div class="form-section">
        <label>Choisissez un hébergement :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['hebergements'] as $option): ?>
                <label class="un-carré-info <?= $option['label'] == $voyage['hebergement_inclus']['label'] ? 'inclus' : '' ?>">
                    <input type="radio" name="hebergement" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['hebergement_inclus']['label'] ? 'checked' : '' ?> required>
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $option['label'] ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Restauration -->
    <div class="form-section">
        <label>Choisissez une restauration :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['restaurations'] as $option): ?>
                <label class="un-carré-info <?= $option['label'] == $voyage['restauration_incluse']['label'] ? 'inclus' : '' ?>">
                    <input type="radio" name="restauration" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['restauration_incluse']['label'] ? 'checked' : '' ?> required>
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $option['label'] ?></span>
                    <small><?= $option['description'] ?></small>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Activités -->
    <div class="form-section">
        <label>Ajoutez ou modifiez les activités :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['activites'] as $option): ?>
                <label class="un-carré-info <?= in_array($option['label'], array_column($voyage['activites_incluses'], 'label')) ? 'inclus' : '' ?>">
                    <input type="checkbox" name="activites[]" value="<?= $option['label'] ?>" <?= in_array($option['label'], array_column($voyage['activites_incluses'], 'label')) ? 'checked' : '' ?>>
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $option['label'] ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Nombre de personnes -->
    <div class="form-section">
        <label for="nb_personnes">Nombre de personnes par activité :</label>
        <input type="number" name="nb_personnes" id="nb_personnes" min="1" max="20" value="1">
    </div>
    
    <!-- Transport -->
    <div class="form-section">
        <label>Choisissez un mode de transport :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['transports'] as $option): ?>
                <label class="un-carré-info <?= $option['label'] == $voyage['transport_inclus']['label'] ? 'inclus' : '' ?>">
                    <input type="radio" name="transport" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['transport_inclus']['label'] ? 'checked' : '' ?> required>
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $option['label'] ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <button type="submit" class="boutton-recherche">Valider et voir le récapitulatif</button>
</form>

<?php else: ?>
    <p style="color:red; text-align:center;">Erreur : voyage introuvable.</p>
<?php endif; ?>

<?php include("footer.php"); ?>
</body>
</html>
