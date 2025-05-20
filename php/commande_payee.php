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
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
<?php include("navbar.php"); ?>



<section class="connexion">
  <div class="overlay">
    <h2>Récapitulatif de votre commande</h2>
    <div class="recapitulatif">

      <p><strong>Personnes :</strong> <?= ($commande['nb_personnes']) ?></p>
      
      <p><strong>Etape 1 :</strong> <?= ($commande['titre']) ?> &ndash; <?= date('d/m/Y',strtotime($commande['date_debut'])) ?> → <?= date('d/m/Y',strtotime($commande['date_fin'])) ?></p>
      <p><strong>Hébergements :</strong> <?= ($commande['hebergement']) ?></p>
      <p><strong>Restauration :</strong> <?= ($commande['restauration']) ?>
        <p><strong>Transports :</strong> <?= ($commande['transport']) ?>
      <p><strong>Activités :</strong>
        <?= empty($commande['activites'] ) ? 'aucune' : '<ul><li>' . implode('</li><li>', array_map('htmlspecialchars',$commande['activites'] )) . '</li></ul>' ?>
      </p>

      <p><strong>Transports vers la prochaine étape:</strong> <?= ($transport3) ?>
      
      <p><strong>Etape 2 :</strong> <?= ($commande['titre2']) ?> &ndash; <?= date('d/m/Y',strtotime($commande['date_debut2'])) ?> → <?= date('d/m/Y',strtotime($commande['date_fin2'])) ?></p>
      <p><strong>Hébergements :</strong> <?= ($commande['hebergement2']) ?></p>
      <p><strong>Restauration :</strong> <?= ($commande['restauration2']) ?>
        <p><strong>Transports :</strong> <?= ($commande['transport2']) ?>
      <p><strong>Activités :</strong>
        <?= empty($commande['activites2']) ? 'aucune' : '<ul><li>' . implode('</li><li>', array_map('htmlspecialchars',$commande['activites2'])) . '</li></ul>' ?>
      </p>

      <p><strong>Montant total :</strong> <?= $commande['montant'] ?> €</p>
              <p><strong>Transaction :</strong> <?= ($commande['transaction']) ?></p>
              
<div style="text-align:center; margin-bottom: 30px;">
    <a href="profilv2.php" class="boutton-recherche">🔙 Retour à mes réservations</a>
</div>
</div>
</section>


</div>
<?php include("footer.php"); ?>
</body>
</html>
