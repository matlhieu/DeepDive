<?php
session_start();
date_default_timezone_set('Europe/Paris');

$panier = $_SESSION['panier'] ?? [];
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

<div class="ensemble-carré-info">
<?php if (empty($panier)): ?>
  <p style="margin: 20px;">Votre panier est vide.</p>
<?php else: ?>
  <?php foreach ($panier as $index => $voyage): ?>
    <div class="un-carré-info">
      <img src="<?= ($voyage['image']) ?>" alt="Image du voyage">
      <div class="info-texte">
        <h3>Étape 1 : <?= ($voyage['titre']) ?><br>Étape 2 : <?= ($voyage['titre2']) ?></h3>
        <b>
          📅 Du <?= date('d/m/Y', strtotime($voyage['date_debut'])) ?> au <?= date('d/m/Y', strtotime($voyage['date_fin2'])) ?><br>
          💶 <?= ($voyage['prix_total']) ?> € pour <?= ($voyage['nb_personnes']) ?> personne(s)
        </b>
        <form action="paiement.php" method="POST" style="margin-top: 1rem;">
          <?php foreach ($voyage as $key => $value): ?>
            <?php if (is_array($value)): ?>
              <?php foreach ($value as $val): ?>
                <input type="hidden" name="<?= $key ?>[]" value="<?= ($val) ?>">
              <?php endforeach; ?>
            <?php else: ?>
              <input type="hidden" name="<?= $key ?>" value="<?= ($value) ?>">
            <?php endif; ?>
          <?php endforeach; ?>
          <input type="submit" class="boutton-recherche" value="Payer">
        </form>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
</div>
  </div>
<?php include("footer.php"); ?>
</body>
</html>
