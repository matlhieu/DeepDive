<?php
session_start();
date_default_timezone_set('Europe/Paris');

// Fonction pour obtenir l'API Key
function getAPIKey($vendeur)
{
    $vendeurs = ['MI-2_H', 'MI-2_B', 'TEST'];
    if (in_array($vendeur, $vendeurs)) {
        return substr(md5($vendeur), 1, 15);
    }
    return "zzzz";
}

// Récupération des données
$session_id = $_GET['session'] ?? '';
$transaction = $_GET['transaction'] ?? '';
$montant = $_GET['montant'] ?? '';
$vendeur = $_GET['vendeur'] ?? '';
$statut = $_GET['status'] ?? '';
$control_recu = $_GET['control'] ?? '';

$erreur = '';
if (empty($transaction) || empty($montant) || empty($vendeur) || empty($statut) || empty($control_recu)) {
    $erreur = "Données de retour incomplètes.";
} else {
    $api_key = getAPIKey($vendeur);
    if ($api_key === "zzzz") {
        $erreur = "Vendeur non reconnu.";
    } else {
        $control_attendu = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $statut . "#");
        if ($control_attendu !== $control_recu) {
            $erreur = "Échec de vérification : données falsifiées.";
        }
    }
}

// Traitement si paiement accepté
if (empty($erreur) && $statut === "accepted") {
    if (!isset($_SESSION['voyage_en_cours'])) {
        $erreur = "Aucune commande en cours trouvée en session.";
    } else {
        $commande = $_SESSION['voyage_en_cours'];
        $commande['client_email'] = $_SESSION['mail'] ?? $_SESSION['user']['mail'] ?? "email_inconnu@deepdive.cy";
        $commande['statut_paiement'] = "accepté";
        $commande['transaction'] = $transaction;
        $commande['montant'] = $montant;

        $fichier_commandes = "../json/commandes.json";
        $commandes = file_exists($fichier_commandes) ? json_decode(file_get_contents($fichier_commandes), true) : [];
        $commandes[$transaction] = $commande;
        file_put_contents($fichier_commandes, json_encode($commandes, JSON_PRETTY_PRINT));
    }
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <title>Retour Paiement - DeepDive</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>

<header>
    <?php include("navbar.php"); ?>
</header>

<section class="connexion">
    <div class="overlay">
        <div class="confirmation" style="text-align: center; padding: 20px;">
            <?php if (!empty($erreur)): ?>
                <h1>❌ Paiement échoué</h1>
                <p><?= $erreur ?></p>
                <a href="recapitulatifv2.php">🔁 Retour au récapitulatif</a>
            <?php elseif ($statut === "accepted"): ?>
                <h1>✅ Paiement accepté !</h1>
                <p>Merci pour votre réservation, votre voyage a bien été enregistrée.</p>
                <a href="index.php">Retour à l'accueil</a>
            <?php else: ?>
                <h1>❌ Paiement refusé</h1>
                <p>Le paiement a été refusé. </p>
    <form action="paiement.php" method="POST">
        <input type="hidden" name="id"            value="<?= $_SESSION['voyage_en_cours']['id']           ?? '' ?>">
        <input type="hidden" name="titre"         value="<?= $_SESSION['voyage_en_cours']['titre']        ?? '' ?>">
        <input type="hidden" name="titre2"        value="<?= $_SESSION['voyage_en_cours']['titre2']       ?? '' ?>">
        <input type="hidden" name="nb_personnes"  value="<?= $_SESSION['voyage_en_cours']['nb_personnes'] ?? '' ?>">

        <input type="hidden" name="date_debut"    value="<?= $_SESSION['voyage_en_cours']['date_debut']  ?? '' ?>">
        <input type="hidden" name="date_fin"      value="<?= $_SESSION['voyage_en_cours']['date_fin']    ?? '' ?>">
        <input type="hidden" name="date_debut2"   value="<?= $_SESSION['voyage_en_cours']['date_debut2'] ?? '' ?>">
        <input type="hidden" name="date_fin2"     value="<?= $_SESSION['voyage_en_cours']['date_fin2']   ?? '' ?>">

        <input type="hidden" name="hebergement"   value="<?= $_SESSION['voyage_en_cours']['hebergement']  ?? '' ?>">
        <input type="hidden" name="hebergement2"  value="<?= $_SESSION['voyage_en_cours']['hebergement2'] ?? '' ?>">

        <input type="hidden" name="restauration"  value="<?= $_SESSION['voyage_en_cours']['restauration']  ?? '' ?>">
        <input type="hidden" name="restauration2" value="<?= $_SESSION['voyage_en_cours']['restauration2'] ?? '' ?>">

        <input type="hidden" name="transport"     value="<?= $_SESSION['voyage_en_cours']['transport']     ?? '' ?>">
        <input type="hidden" name="transport2"    value="<?= $_SESSION['voyage_en_cours']['transport2']    ?? '' ?>">
        <input type="hidden" name="transport3"    value="<?= $_SESSION['voyage_en_cours']['transport3']    ?? '' ?>">

        <?php if (!empty($_SESSION['voyage_en_cours']['activites'])): ?>
            <?php foreach ($_SESSION['voyage_en_cours']['activites'] as $act): ?>
                <input type="hidden" name="activites[]"  value="<?= ($act) ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['voyage_en_cours']['activites2'])): ?>
            <?php foreach ($_SESSION['voyage_en_cours']['activites2'] as $act): ?>
                <input type="hidden" name="activites2[]" value="<?= ($act) ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <input type="hidden" name="prix_total"    value="<?= $_SESSION['voyage_en_cours']['prix_total'] ?? '' ?>">
        <input type="submit" value="Revenir dans la page de paiement">
    </form>


            <?php endif; ?>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>
</body>
</html>
