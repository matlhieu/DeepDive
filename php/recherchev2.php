<?php

session_start();

date_default_timezone_set('Europe/Paris');

$contenuJson   = file_get_contents("../json/voyagesv2.json");
$listeVoyages  = json_decode($contenuJson, true);

$dateDepartChaine  = $_POST['date_depart'] ?? '';
$dateFinChaine     = $_POST['date_fin']    ?? '';

$timestampDepart = strtotime($dateDepartChaine);
$timestampFin    = strtotime($dateFinChaine);

$chaineDestinations = $_POST['destination'] ?? '';
$destinations       = array_filter(array_map('trim', explode(',', $chaineDestinations)));

function validerVoyage(array $voyage, int $timestampDepart, int $timestampFin, array $destinations): bool {
    if (!isset($voyage['date_debut'], $voyage['date_fin'], $voyage['destination'])) return false;
    $debutVoyage = strtotime($voyage['date_debut']);
    $finVoyage   = strtotime($voyage['date_fin']);
    $datesChevauchent = ($debutVoyage <= $timestampFin) && ($finVoyage >= $timestampDepart);
    $destOk = in_array($voyage['destination'], $destinations, true);
    return $datesChevauchent && $destOk;
}

$resultats = [];
if (is_array($listeVoyages)) {
    foreach ($listeVoyages as $indice => $voyage) {
        if (validerVoyage($voyage, $timestampDepart, $timestampFin, $destinations)) {
            $voyage['timestamp_debut'] = strtotime($voyage['date_debut']);
            $voyage['timestamp_fin']   = strtotime($voyage['date_fin']);
            $voyage['timestamp_fin2']   = strtotime($voyage['date_fin2']);
            $voyage['prix_num']        = floatval(str_replace(['€',' '], '', $voyage['prix']));
            $resultats[$indice]        = $voyage;
        }
    }
}

// Identifier destinations sans correspondance
destinations:
$destTrouvees  = array_unique(array_map(fn($v) => $v['destination'], $resultats));
$destRefusees = array_diff($destinations, $destTrouvees);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche – DeepDive</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/recherche.css">
</head>
<body>
       <?php include("navbar.php"); ?>
    <div class="main-container">
    <h2 class="meilleure-plans">Les <span>meilleurs</span> plans !</h2>

    <?php if (!is_array($listeVoyages)): ?>
        <p class="erreur">Erreur de lecture du fichier de voyages.</p>
    <?php else: ?>

        <?php if (!empty($destRefusees)): ?>
            <?php foreach ($destRefusees as $dest): ?>
                <p class="erreur">Les dates saisies ne correspondent pas aux disponibilités pour la destination « <?=($dest)?> ».</p>
            <?php endforeach; ?>
        <?php endif; ?>

    <?php if (empty($resultats)): ?>
        <p class="erreur">Aucun voyage ne correspond à vos autres critères de sélection.</p>
    <?php else: ?>
    
            <div class="tri-bar">
                <label for="triage-selection">Triage du voyage :</label>
                <select id="triage-selection">
        <option value="debut_asc" selected>Commence le plus tôt</option>
                    <option value="debut_desc">Commence le plus tard</option>
                    <option value="fin_asc">Fini le plus tôt</option>
                    <option value="fin_desc">Fini le plus tard</option>
                    <option value="prix_asc">Moins cher</option>
                    <option value="prix_desc">Plus cher</option>
                    <option value="duree_asc">Durée la plus courte</option>
                    <option value="duree_desc">Durée la plus longue</option>
                </select>
            </div>

    <div id="resultats-box" class="ensemble-carré-info">
        <?php foreach ($resultats as $indice => $voyage): ?>
            <?php
              $duree = $voyage['timestamp_fin2'] - $voyage['timestamp_debut'];
            ?>
            <div class="un-carré-info" 
                 data-debut="<?= $voyage['timestamp_debut'] ?>"
                 data-fin="<?= $voyage['timestamp_fin2'] ?>"
                 data-prix="<?= $voyage['prix_num'] ?>"
                 data-duree="<?= $duree ?>">
                <img src="<?= ($voyage['image']) ?>" alt="<?= ($voyage['titre']) ?>">
                <div class="info-texte">
                    <h3> Étape 1 : <?= ($voyage['titre']) ?> <br>Étape 2 : <?= ($voyage['titre2']) ?> </h3>
                    <b>
                      📅 Du <?= date('d/m/Y', $voyage['timestamp_debut']) ?> au <?= date('d/m/Y', $voyage['timestamp_fin2']) ?><br>
                      💶 <?= ($voyage['prix']) ?> pour <?= $voyage['nb_personnes'] ?> personne(s)<br>
                      <span class="stars"><?= ($voyage['etoiles']) ?></span> (<?= $voyage['avis'] ?> avis)
                        <br> <br>
                        Vous pourrez modifier les options du voyages tels que le nombre de personnes, les activités, les hébergements... et donc le prix en cliquant sur Vue détaillée du voyage
                    </b>
                    <br><br>
                    <a href="vuedetaillev2.php?id=<?= $indice ?>" class="boutton-recherche">Vue détaillée du voyage</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

        <?php endif; ?>

    <?php endif; ?>
         </div>
    <?php include("footer.php"); ?>
      <script src="../js/recherchev2.js"></script>
</body>
</html>
