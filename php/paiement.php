<?php
session_start();


// Fonction pour obtenir l'API Key
function getAPIKey($vendeur)
{
	if(in_array($vendeur, array('MI-1_A', 'MI-1_B', 'MI-1_C', 'MI-1_D', 'MI-1_E', 'MI-1_F', 'MI-1_G', 'MI-1_H', 'MI-1_I', 'MI-1_J', 'MI-2_A', 'MI-2_B', 'MI-2_C', 'MI-2_D', 'MI-2_E', 'MI-2_F', 'MI-2_G', 'MI-2_H', 'MI-2_I', 'MI-2_J', 'MI-3_A', 'MI-3_B', 'MI-3_C', 'MI-3_D', 'MI-3_E', 'MI-3_F', 'MI-3_G', 'MI-3_H', 'MI-3_I', 'MI-3_J', 'MI-4_A', 'MI-4_B', 'MI-4_C', 'MI-4_D', 'MI-4_E', 'MI-4_F', 'MI-4_G', 'MI-4_H', 'MI-4_I', 'MI-4_J', 'MI-5_A', 'MI-5_B', 'MI-5_C', 'MI-5_D', 'MI-5_E', 'MI-5_F', 'MI-5_G', 'MI-5_H', 'MI-5_I', 'MI-5_J', 'MEF-1_A', 'MEF-1_B', 'MEF-1_C', 'MEF-1_D', 'MEF-1_E', 'MEF-1_F', 'MEF-1_G', 'MEF-1_H', 'MEF-1_I', 'MEF-1_J', 'MEF-2_A', 'MEF-2_B', 'MEF-2_C', 'MEF-2_D', 'MEF-2_E', 'MEF-2_F', 'MEF-2_G', 'MEF-2_H', 'MEF-2_I', 'MEF-2_J', 'MIM_A', 'MIM_B', 'MIM_C', 'MIM_D', 'MIM_E', 'MIM_F', 'MIM_G', 'MIM_H', 'MIM_I', 'MIM_J', 'SUPMECA_A', 'SUPMECA_B', 'SUPMECA_C', 'SUPMECA_D', 'SUPMECA_E', 'SUPMECA_F', 'SUPMECA_G', 'SUPMECA_H', 'SUPMECA_I', 'SUPMECA_J', 'TEST'))) {
		return substr(md5($vendeur), 1, 15);
	}
	return "zzzz";
}
// Récupération des données POST
$id = $_POST['id'];
$hebergement = $_POST['hebergement'] ?? '';
$restauration = $_POST['restauration'] ?? '';
$transport = $_POST['transport'] ?? '';
$activites = $_POST['activites'] ?? [];
$titre = $_POST['titre'] ?? '';
$nb_personnes = $_POST['nb_personnes'] ?? 'Non précisé';
$date_debut = $_POST['date_debut'] ?? '';
$date_fin = $_POST['date_fin'] ?? '';
$prix_total = $_POST['prix_total'] ?? '';

// Chargement des voyages
$voyages_json = file_get_contents("../json/voyagesv2.json");
$voyages = json_decode($voyages_json, true);

if (!isset($voyages[$id])) {
    die("<h1>Erreur : Voyage non trouvé.</h1>");
}
$voyage = $voyages[$id];
$montant = number_format($prix_total, 2, '.', '');

// Stockage en session
$_SESSION['voyage_en_cours'] = [
    'id' => $id,
    'titre' => $voyage['titre'],
    'hebergement' => $hebergement,
    'restauration' => $restauration,
    'transport' => $transport,
    'activites' => $activites,
    'prix' => $prix_total,
    'nb_personnes' => $nb_personnes ,
    'date_debut' => $date_debut,
    'date_fin' => $date_fin 
];

// Préparation paiement
$vendeur = "MI-2_H";
$transaction = uniqid("TRX");
$session_id = session_id();
$retour = "http://localhost:8000/php/retour_paiement.php?session=$session_id"; // à adapter selon serveur réel

$api_key = getAPIKey($vendeur);
if ($api_key == "zzzz") {
    die("<h1>Erreur API Key.</h1>");
}
$control = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");

?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <title>Paiement - DeepDive</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>

<header>
    <?php include("navbar.php"); ?>
</header>

<section class="connexion">
    <div class="overlay">
        <h2>Récapitulatif de votre commande</h2>
        <div class="recapitulatif">
            <p><strong>Date du voyage :</strong> Du <?= date('d/m/Y', strtotime($date_debut)) ?> au <?= date('d/m/Y', strtotime($date_fin)) ?></p>
            <p><strong>Voyage :</strong> <?= $voyage['titre'] ?></p>
            <p><strong>Nombre de personnes :</strong> <?= $nb_personnes ?></p>
            <p><strong>Hébergement :</strong> <?= $hebergement ?></p>
            <p><strong>Restauration :</strong> <?= $restauration ?></p>
            <p><strong>Transport :</strong> <?= $transport ?></p>
            <p><strong>Activités :</strong></p>
            <ul>
                <?php foreach ($activites as $act): ?>
                    <li><?= $act ?></li>
                <?php endforeach; ?>
            </ul>
            <p><strong>Montant à payer :</strong> <?= $montant ?> €</p>
        </div>

        <h2>Procéder au paiement</h2>
        <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
            <input type="hidden" name="transaction" value="<?= $transaction ?>">
            <input type="hidden" name="montant" value="<?= $montant ?>">
            <input type="hidden" name="vendeur" value="<?= $vendeur ?>">
            <input type="hidden" name="retour" value="<?= $retour ?>">
            <input type="hidden" name="control" value="<?= $control ?>">
            <input type="submit" value="Payer maintenant">
        </form>
    </div>
</section>

<?php include("footer.php"); ?>
</body>
</html>



