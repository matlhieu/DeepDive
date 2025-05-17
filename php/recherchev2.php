<?php
// Charger le fichier JSON
session_start();
date_default_timezone_set('Europe/Paris');
$contenuJson = file_get_contents("../json/voyagesv2.json");
$listeVoyages = json_decode($contenuJson, true);


$dateDepartChaine  = $_POST['date_depart']         ?? '';
$dateFinChaine     = $_POST['date_fin']            ?? '';
$nbPersonnes       = intval($_POST['nombre_personnes'] ?? 1);

// Conversion des dates en timestamps pour faciliter la comparaison
$timestampDepart = strtotime($dateDepartChaine);
$timestampFin    = strtotime($dateFinChaine);

// Récupération de la chaîne CSV des destinations et découpage en tableau
$chaineDestinations = $_POST['destination'] ?? '';
$destinations       = array_filter(
    array_map('trim', explode(',', $chaineDestinations))
);

function validerVoyage(
    array $voyage,
    int   $timestampDepart,
    int   $timestampFin,
    int   $nbPersonnes,
    array $destinations
): bool {
    if (! isset(
        $voyage['date_debut'],
        $voyage['date_fin'],
        $voyage['nb_personnes'],
        $voyage['destination']
    )) {
        return false;
    }

    // Conversion des dates du voyage en timestamps
    $debutVoyage = strtotime($voyage['date_debut']);
    $finVoyage   = strtotime($voyage['date_fin']);

    // Le voyage doit couvrir entièrement la période demandée
    $datesOk  = ($debutVoyage <= $timestampDepart)
             && ($finVoyage   >= $timestampFin);

    // La capacité doit être suffisante
    $placesOk = ($voyage['nb_personnes'] >= $nbPersonnes);

    // La destination du voyage doit figurer dans le tableau choisi
    $destOk   = in_array($voyage['destination'], $destinations, true);

    return $datesOk && $placesOk && $destOk;
}

$resultats = [];

if (is_array($listeVoyages)) {
    foreach ($listeVoyages as $indice => $voyage) {
        if (validerVoyage(
            $voyage,
            $timestampDepart,
            $timestampFin,
            $nbPersonnes,
            $destinations
        )) {
            $resultats[$indice] = $voyage;
        }
    }
}
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

    <h2 class="meilleure-plans">Les <span>meilleurs</span> plans !</h2>
    <div class="ensemble-carré-info">

    <?php if (! is_array($listeVoyages)): ?>
        <p style="text-align:center;color:red;">
            Erreur de lecture du fichier de voyages.
        </p>

    <?php elseif (empty($resultats)): ?>
        <p style="text-align:center;color:red;">
            Aucun voyage ne correspond à vos critères de séléction.
        </p>

    <?php else: ?>
        <?php foreach ($resultats as $indice => $voyage): ?>
            <div class="un-carré-info">
                <img
                  src="<?= ($voyage['image']) ?>"
                  alt="<?= ($voyage['titre']) ?>"
                >
                <div class="info-texte">
                    <h3><?= ($voyage['titre']) ?></h3>
                    <b> Voici les options du voyage : 
                        <br>
                        📅 Du
                        <?= date('d/m/Y', strtotime($voyage['date_debut'])) ?>
                        au
                        <?= date('d/m/Y', strtotime($voyage['date_fin'])) ?>
                        <br>
                        💶 <?= ($voyage['prix']) ?>
                        pour <?= ($voyage['nb_personnes']) ?>
                        personne(s)
                        <br>
                        <span class="stars">
                            <?= ($voyage['etoiles']) ?>
                        </span>
                        (<?= ($voyage['avis']) ?> avis)
                        <br> <br>
                        Vous pouvez modifier les options en cliquant sur Vue détaillee du voyage
                    </b>
                    <br><br>
                    <a
                      href="vuedetaillev2.php?id=<?= $indice ?>"
                      class="boutton-recherche"
                    >
                        Vue détaillée du voyage
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </div>

    <?php include("footer.php"); ?>
</body>
</html>


