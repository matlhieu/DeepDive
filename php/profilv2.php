<?php
session_start();
date_default_timezone_set('Europe/Paris');

if (!isset($_SESSION['mail'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['mail'];
$commandes = [];

if (file_exists("../json/commandes.json")) {
    $data = json_decode(file_get_contents("../json/commandes.json"), true);
    foreach ($data as $commande) {
        if (
            isset($commande['client_email']) &&
            $commande['client_email'] === $email &&
            $commande['statut_paiement'] === 'accepté'
        ) {
            $commandes[] = $commande;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil - Voyages payés</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/recherche.css"> <!-- style utilisé pour les cartes -->
</head>
<body>

<?php include("navbar.php"); ?>

<h2 class="meilleure-plans">Vos <span>voyages</span> déjà payés</h2>

<div class="side">
    <button onclick="window.location.href='profil.php'">Mes infos</button>
    <button onclick="window.location.href='profilv2.php'">Mes réservations</button>
</div>

<?php if (empty($commandes)): ?>
    <p style="margin: 20px;">Vous n'avez encore réservé aucun voyage.</p>
<?php else: ?>
    <?php foreach ($commandes as $commande): ?>
        <div class="un-carré-info">
            <img src="<?= ($commande['image']) ?>" alt="<?= ($commande['titre']) ?>">
            <div class="info-texte">
                <h3> Étape 1 : <?= ($commande['titre']) ?> <br> Étape 2 : <?= ($commande['titre2']) ?> </h3>
                <b>
                    <b>Voici les options du voyage :
                        <br>
                        <br>
                        <?php 
                         $commande['timestamp_debut'] = strtotime($commande['date_debut']);
                            $commande['timestamp_fin']   = strtotime($commande['date_fin']);
                            $commande['timestamp_fin2']  = strtotime($commande['date_fin2']);
                        ?>
                      📅 Du <?= date('d/m/Y', $commande['timestamp_debut']) ?> au <?= date('d/m/Y', $commande['timestamp_fin2']) ?><br>
                      💶 <?= ($commande['montant']) ?> € payés pour <?= $commande['nb_personnes'] ?> personne(s)<br>
                        <br> <br>
                    🧾 Transaction : <?= ($commande['transaction']) ?>
                </b>
                <br><br>
                <a href="commande_payee.php?transaction=<?=$commande['transaction'] ?>" class="boutton-recherche">Voir les détails</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<?php include("footer.php"); ?>
</body>
</html>
