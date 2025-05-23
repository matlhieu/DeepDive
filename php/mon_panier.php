<?php
session_start();
date_default_timezone_set('Europe/Paris');

$panier = $_SESSION['panier'] ?? [];

// Supprimer les doublons à l'affichage et dans la session
$doublons = [];
$voyages_uniques = [];
foreach ($panier as $voyage) {
    $doublon = $voyage['poubelle'] ?? md5(json_encode($voyage));
    if (!in_array($doublon, $doublons)) {
        $doublons[] = $doublon;
        $voyage['poubelle'] = $doublon;
        $voyages_uniques[] = $voyage;
    }
}
$_SESSION['panier'] = $voyages_uniques;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon Panier</title>
  <link rel="stylesheet" href="../style/nav_footer.css">
  <link rel="stylesheet" href="../style/recherche.css">
</head>
<body>

<?php include("navbar.php"); ?>
<div class="main-container">
  <h2 class="meilleure-plans">Vos <span>voyages</span> non encore payés</h2>

  <?php if (empty($panier)): ?>
    <p style="margin: 20px;">Votre panier est vide.</p>
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
      <?php foreach ($panier as $index => $voyage): ?>
        <?php
          $timestamp_debut = strtotime($voyage['date_debut']);
          $timestamp_fin   = strtotime($voyage['date_fin2']);
          $prix_num        = floatval(str_replace(['€',' '], '', $voyage['prix_total']));
          $duree           = $timestamp_fin - $timestamp_debut;
        ?>
        <div class="un-carré-info"
             data-debut="<?= $timestamp_debut ?>"
             data-fin="<?= $timestamp_fin ?>"
             data-prix="<?= $prix_num ?>"
             data-duree="<?= $duree ?>">
          <img src="<?= ($voyage['image']) ?>" alt="Image du voyage">
          <div class="info-texte">
            <h3>Étape 1 : <?= ($voyage['titre']) ?><br>Étape 2 : <?= ($voyage['titre2']) ?></h3>
            <b>
              📅 Du <?= date('d/m/Y', $timestamp_debut) ?> au <?= date('d/m/Y', $timestamp_fin) ?><br>
              💶 <?= ($voyage['prix_total']) ?> € pour <?= ($voyage['nb_personnes']) ?> personne(s)
            </b>

            <form action="paiement.php" method="POST" style="margin-top: 1rem;">
              <?php foreach ($voyage as $key => $value): ?>
                <?php if (is_array($value)): ?>
                  <?php foreach ($value as $val): ?>
                    <input type="hidden" name="<?= ($key) ?>[]" value="<?= ($val) ?>">
                  <?php endforeach; ?>
                <?php else: ?>
                  <input type="hidden" name="<?= ($key) ?>" value="<?= ($value) ?>">
                <?php endif; ?>
              <?php endforeach; ?>
              <input type="submit" class="boutton-recherche" value="Payer">
            </form>

            <form action="supprimer_panier.php" method="GET">
              <input type="hidden" name="index" value="<?= $index ?>">
              <input type="submit" class="boutton-recherche" value="Supprimer ce voyage">
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  <?php endif; ?>
</div>

<?php include("footer.php"); ?>
<script src="../js/recherchev2.js"></script>
</body>
</html>
