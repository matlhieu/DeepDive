<?php
session_start();
date_default_timezone_set('Europe/Paris');

$transaction_id = $_GET['transaction'] ?? '';
$commande = null;

// Vérifie que le fichier des commandes existe
if (file_exists("../json/commandes.json")) {
    $commandes = json_decode(file_get_contents("../json/commandes.json"), true);
    if (isset($commandes[$transaction_id])) {
        $commande = $commandes[$transaction_id];
    }
}

if (!$commande) {
    echo "<h1 style='color:red; text-align:center;'>Commande introuvable.</h1>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de la réservation</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/recherche.css">
</head>
<body>
<?php include("navbar.php"); ?>

<section class="hero" style="background-image: url('<?= htmlspecialchars($commande['image'] ?? "https://via.placeholder.com/1200x300") ?>');">
    <div class="overlay">
        <h1>Votre réservation : <span><?= htmlspecialchars($commande['titre']) ?></span></h1>
    </div>
</section>

<div class="ensemble-carré-info" style="margin: 30px auto;">
    <div class="un-carré-info">
        <h3>Résumé du voyage</h3>
        <p><strong>Dates :</strong> du <?= date('d/m/Y', strtotime($commande['date_debut'])) ?> au <?= date('d/m/Y', strtotime($commande['date_fin'])) ?></p>
        <p><strong>Nombre de personnes :</strong> <?= htmlspecialchars($commande['nb_personnes']) ?></p>
        <p><strong>Hébergement :</strong> <?= htmlspecialchars($commande['hebergement']) ?></p>
        <p><strong>Restauration :</strong> <?= htmlspecialchars($commande['restauration']) ?></p>
        <p><strong>Transport :</strong> <?= htmlspecialchars($commande['transport']) ?></p>

        <?php if (!empty($commande['activites'])): ?>
            <p><strong>Activités :</strong></p>
            <ul>
                <?php foreach ($commande['activites'] as $act): ?>
                    <li><?= htmlspecialchars($act) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <p><strong>Montant payé :</strong> <?= htmlspecialchars($commande['montant']) ?> €</p>
        <p><strong>Transaction :</strong> <?= htmlspecialchars($commande['transaction']) ?></p>
    </div>
</div>

<div style="text-align:center; margin-bottom: 30px;">
    <a href="profilv2.php" class="boutton-recherche">🔙 Retour à mes réservations</a>
</div>

<?php include("footer.php"); ?>
</body>
</html>
