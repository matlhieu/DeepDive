<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] === 'ban') {
    header('Location: login.php');
    exit;
}
date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("../json/voyagesv2.json");
$voyages = json_decode($voyages_json, true);
$id      = isset($_POST['id']) ? (int)$_POST['id'] : -1;
$voyage  = ($id >= 0 && isset($voyages[$id])) ? $voyages[$id] : null;
if (!$voyage) {
    echo "<p style='color:red;text-align:center;margin:2rem;'>Voyage introuvable.</p>";
    exit;
}
// Récupération des choix utilisateur
$nb_personnes  = max(1, (int)($_POST['nb_personnes'] ?? 1));

$titre = $_POST['titre'] ?? '';
$titre2 = $_POST['titre2'] ?? '';

// Colonne 1 dates
$date_debut1   = $_POST['date_debut']  ?? $voyage['date_debut'];
$date_fin1     = $_POST['date_fin']    ?? $voyage['date_fin'];
// Colonne 2 dates (commence à la fin de la colonne 1)
$date_debut2   = $_POST['date_debut2'] ?? $date_fin1;
$date_fin2     = $_POST['date_fin2']   ?? $voyage['date_fin'];

// Choix Colonne 1
$heberg1  = $_POST['hebergement']  ?? '';
$restau1  = $_POST['restauration'] ?? '';
$activ1   = $_POST['activites']    ?? [];
$transp1  = $_POST['transport']    ?? '';

// Choix Colonne 2
$heberg2  = $_POST['hebergement2']  ?? '';
$restau2  = $_POST['restauration2'] ?? '';
$activ2   = $_POST['activites2']   ?? [];
$transp2  = $_POST['transport2']   ?? '';

$transp3  = $_POST['transport3']   ?? '';

// Fonction de calcul de nuits
function calc_nuits($d1, $d2) {
    $t1 = strtotime($d1);
    $t2 = strtotime($d2);
    if (!$t1 || !$t2 || $t2 <= $t1) return 1;
    return max(1, ceil(($t2 - $t1) / 86400));
}

// Nuits et jours
$nuits1 = calc_nuits($date_debut1, $date_fin1);
$jours1 = $nuits1 + 1;
$nuits2 = calc_nuits($date_debut2, $date_fin2);
$jours2 = $nuits2 + 1;

// Calcul des prix par section
$prix_heberg1 = 0;
foreach ($voyage['hebergements'] as $o) {
    if ($o['label'] === $heberg1) {
        $prix_heberg1 = $o['prix'] * ceil($nb_personnes/2) * $nuits1;
    }
}
$prix_restau1 = 0;
foreach ($voyage['restaurations'] as $o) {
    if ($o['label'] === $restau1) {
        $prix_restau1 = $o['prix'] * $nb_personnes * $jours1;
    }
}
$prix_activ1 = 0;
foreach ($activ1 as $a) {
    foreach ($voyage['activites'] as $o) {
        if ($o['label'] === $a) {
            $prix_activ1 += $o['prix'] * $nb_personnes;
        }
    }
}
$prix_transp1 = 0;
foreach ($voyage['transports'] as $o) {
    if ($o['label'] === $transp1) {
        if (stripos($transp1, 'voiture') !== false) {
            $prix_transp1 = $o['prix'] * ceil($nb_personnes/5) * $jours1;
        } else {
            $prix_transp1 = $o['prix'] * $nb_personnes * $jours1;
        }
    }
}

// Colonne 2
$prix_heberg2 = 0;
foreach ($voyage['hebergements2'] as $o) {
    if ($o['label2'] === $heberg2) {
        $prix_heberg2 = $o['prix2'] * ceil($nb_personnes/2) * $nuits2;
    }
}
$prix_restau2 = 0;
foreach ($voyage['restaurations2'] as $o) {
    if ($o['label2'] === $restau2) {
        $prix_restau2 = $o['prix2'] * $nb_personnes * $jours2;
    }
}
$prix_activ2 = 0;
foreach ($activ2 as $a) {
    foreach ($voyage['activites2'] as $o) {
        if ($o['label2'] === $a) {
            $prix_activ2 += $o['prix2'] * $nb_personnes;
        }
    }
}
$prix_transp2 = 0;
foreach ($voyage['transports2'] as $o) {
    if ($o['label2'] === $transp2) {
        if (stripos($transp2, 'voiture') !== false) {
            $prix_transp2 = $o['prix2'] * ceil($nb_personnes/5) * $jours2;
        } else {
            $prix_transp2 = $o['prix2'] * $nb_personnes * $jours2;
        }
    }
}

$prix_transp3 = 0;
foreach ($voyage['transports3'] as $o) {
    if ($o['label3'] === $transp3) {
            $prix_transp3 = $o['prix3'] * $nb_personnes;
        }
    }

$prix_total = $prix_heberg1 + $prix_restau1 + $prix_activ1 + $prix_transp1
            + $prix_heberg2 + $prix_restau2 + $prix_activ2 + $prix_transp2 + $prix_transp3;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Récapitulatif Voyage</title>
  <link rel="stylesheet" href="../style/nav_footer.css">
  <link rel="stylesheet" href="../style/vuedetaille.css">
</head>
<body>
<?php include("navbar.php"); ?>
<main class="meilleure-plans-wrapper">

          <!-- Bannière -->
          <section class="hero" style="    background-image: url('<?= $voyage['image'] ?>'),
                                url('<?= $voyage['image2'] ?>');
              background-position: left top, right top;
              background-size: 50% 100%, 50% 100%;
              background-repeat: no-repeat, no-repeat;">

            <div class="overlay">
              <h1>Récapitulatif du voyage de <span><?= htmlspecialchars($voyage['titre']) ?></span> et <span><?= htmlspecialchars($voyage['titre2']) ?></span> !</h1>
            </div>
          </section>

    <div class="form-section">
        <label for="nb_personnes">Nombre de personnes pour le voyage :</label>
        <input type="number" name="nb_personnes" id="nb_personnes"                          readonly
             class="input-date-texte" value="<?= $nb_personnes ?>" step="1">
    </div>

    
  <div class="dual-step-container">

    <div class="dual-step">

                <div class="form-section">

                    <div class="bloc-dates">
                      <label>Date de début du voyage :</label>
                      <input type="date"
                             readonly
                             class="input-date-texte"
                             value="<?= htmlspecialchars(date('Y-m-d', strtotime($date_debut1))) ?>">
                    </div>

                    <div class="bloc-dates">
                      <label>Date de fin du voyage :</label>
                      <input type="date"
                             readonly
                             class="input-date-texte"
                             value="<?= htmlspecialchars(date('Y-m-d', strtotime($date_fin1))) ?>">
                    </div>

        </div>

        
      <div class="form-section">
        <h2>Hébergement (1)</h2>
        <label class="un-carré-info inclus">
          <img src="<?php foreach($voyage['hebergements'] as $o) if($o['label']===$heberg1) echo $o['image']; ?>" alt>
          <span><?= htmlspecialchars($heberg1) ?> — <?= $prix_heberg1 ?> €</span>
        </label>
      </div>
      <div class="form-section">
        <h2>Restauration (1)</h2>
        <label class="un-carré-info inclus">
          <img src="<?php foreach($voyage['restaurations'] as $o) if($o['label']===$restau1) echo $o['image']; ?>" alt>
          <span><?= htmlspecialchars($restau1) ?> — <?= $prix_restau1 ?> €</span>
        </label>
      </div>
      <div class="form-section">
        <h2>Activités (1)</h2>
        <?php foreach($activ1 as $a): ?>
          <?php foreach($voyage['activites'] as $o) if($o['label']===$a): ?>
            <label class="un-carré-info inclus">
              <img src="<?= htmlspecialchars($o['image']) ?>" alt>
              <span><?= htmlspecialchars($a) ?> — <?= $o['prix']*$nb_personnes ?> €</span>
            </label>
          <?php endif; endforeach; ?>
      </div>
      <div class="form-section">
        <h2>Transport (1)</h2>
        <label class="un-carré-info inclus">
          <img src="<?php foreach($voyage['transports'] as $o) if($o['label']===$transp1) echo $o['image']; ?>" alt>
          <span><?= htmlspecialchars($transp1) ?> — <?= $prix_transp1 ?> €</span>
        </label>
      </div>
    </div>
    <!-- Colonne 2 -->
    <div class="dual-step">

        <div class="form-section">

            <div class="bloc-dates">
              <label>Date de début du voyage :</label>
              <input type="date"
                     readonly
                     class="input-date-texte"
                     value="<?= htmlspecialchars(date('Y-m-d', strtotime($date_debut2))) ?>">
            </div>

            <div class="bloc-dates">
              <label>Date de fin du voyage :</label>
              <input type="date"
                     readonly
                     class="input-date-texte"
                     value="<?= htmlspecialchars(date('Y-m-d', strtotime($date_fin2))) ?>">
            </div>

</div>
        
      <div class="form-section">
        <h2>Hébergement (2)</h2>
        <label class="un-carré-info inclus">
          <img src="<?php foreach($voyage['hebergements2'] as $o) if($o['label2']===$heberg2) echo $o['image2']; ?>" alt>
          <span><?= htmlspecialchars($heberg2) ?> — <?= $prix_heberg2 ?> €</span>
        </label>
      </div>
      <div class="form-section">
        <h2>Restauration (2)</h2>
        <label class="un-carré-info inclus">
          <img src="<?php foreach($voyage['restaurations2'] as $o) if($o['label2']===$restau2) echo $o['image2']; ?>" alt>
          <span><?= htmlspecialchars($restau2) ?> — <?= $prix_restau2 ?> €</span>
        </label>
      </div>
      <div class="form-section">
        <h2>Activités (2)</h2>
        <?php foreach($activ2 as $a): ?>
          <?php foreach($voyage['activites2'] as $o) if($o['label2']===$a): ?>
            <label class="un-carré-info inclus">
              <img src="<?= htmlspecialchars($o['image2']) ?>" alt>
              <span><?= htmlspecialchars($a) ?> — <?= $o['prix2']*$nb_personnes ?> €</span>
            </label>
          <?php endif; endforeach; ?>
      </div>
      <div class="form-section">
        <h2>Transport (2)</h2>
        <label class="un-carré-info inclus">
          <img src="<?php foreach($voyage['transports2'] as $o) if($o['label2']===$transp2) echo $o['image2']; ?>" alt>
          <span><?= htmlspecialchars($transp2) ?> — <?= $prix_transp2 ?> €</span>
        </label>
      </div>
    </div>
  </div>

        <div class="form-section">
          <h2>Mode de transport pour la prochaine étape</h2>
          <label class="un-carré-info inclus">
            <img src="<?php foreach($voyage['transports3'] as $o) if($o['label3']===$transp3) echo $o['image3']; ?>" alt>
            <span><?= htmlspecialchars($transp3) ?> — <?= $prix_transp3 ?> €</span>
          </label>
        </div>
      </div>
      </div>
      
      
    <h2 style="text-align:center;">Prix total : <?= $prix_total ?> €</p></h2>

  <div style="text-align:center;margin:2rem;">
    <form action="vuedetaillev2.php" method="GET" style="display:inline-block;margin-right:1rem;">
      <input type="hidden" name="id" value="<?= $id ?>">
      <button class="boutton-recherche">Modifier</button>
    </form>
    <form action="paiement.php" method="POST" style="display:inline-block;">
      <input type="hidden" name="id"            value="<?= $id ?>">
          <input type="hidden" name="titre"            value="<?= $voyage['titre'] ?>">
          <input type="hidden" name="titre2"            value="<?= $voyage['titre2'] ?>">
      <input type="hidden" name="nb_personnes"   value="<?= $nb_personnes ?>">
      <input type="hidden" name="date_debut"     value="<?= $date_debut1 ?>">
      <input type="hidden" name="date_fin"       value="<?= $date_fin1 ?>">
      <input type="hidden" name="date_debut2"    value="<?= $date_debut2 ?>">
      <input type="hidden" name="date_fin2"      value="<?= $date_fin2 ?>">
      <input type="hidden" name="hebergement"    value="<?= ($heberg1) ?>">
      <input type="hidden" name="restauration"   value="<?= ($restau1) ?>">
      <input type="hidden" name="transport"      value="<?= ($transp1) ?>">
      <input type="hidden" name="hebergement2"   value="<?= ($heberg2) ?>">
      <input type="hidden" name="restauration2"  value="<?= ($restau2) ?>">
      <input type="hidden" name="transport2"     value="<?= ($transp2) ?>">
      <input type="hidden" name="transport3"     value="<?= ($transp3) ?>">
      <?php foreach($activ1 as $a): ?><input type="hidden" name="activites[]"  value="<?=($a) ?>"><?php endforeach; ?>
      <?php foreach($activ2 as $a): ?><input type="hidden" name="activites2[]" value="<?=($a) ?>"><?php endforeach; ?>
      <input type="hidden" name="prix_total"     value="<?= $prix_total ?>">
      <button class="boutton-recherche">Confirmer &amp; Payer</button>
    </form>
  </div>

</main>
<?php include("footer.php"); ?>
</body>
</html>

