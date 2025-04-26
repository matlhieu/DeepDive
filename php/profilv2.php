<?php
date_default_timezone_set('Europe/Paris');

// Simuler les voyages déjà payés
$voyages_json = file_get_contents("voyagesv2.json");
$voyages = json_decode($voyages_json, true);

// Simule des voyages déjà réservés
$voyages_payes_ids = [0, 1, 2];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/recherche.css"> 
</head>
<body>
<?php include("navbar.php"); ?>

<h2 class="meilleure-plans">Vos <span>voyages</span> déjà payés</h2>

<div class="ensemble-carré-info">
    <?php foreach ($voyages_payes_ids as $id): ?>
        <?php if (isset($voyages[$id])): ?>
            <?php $voyage = $voyages[$id]; ?>
            <div class="un-carré-info">
                <img src="<?= $voyage['image'] ?>" alt="<?= $voyage['titre'] ?>">
                <div class="info-texte">
                    <h3><?= ($voyage['titre']) ?></h3>
                    <b>
                        📅 Du <?= date('d/m/Y', strtotime($voyage['date_debut'])) ?> au <?= date('d/m/Y', strtotime($voyage['date_fin'])) ?><br>
                        💶 Prix du voyage : <?= ($voyage['prix']) ?> <br>
                        <o class="stars"><?= $voyage['etoiles'] ?? '★★★★' ?></o>
                        (<?= $voyage['avis'] ?? 0 ?> avis)
                    </b>
                    <br><br>
                                
                    <a href="voyage_detail_consultation.php?id=<?= $id ?>" class="boutton-recherche">Voir le détail</a>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php include("footer.php"); ?>
</body>
</html>
