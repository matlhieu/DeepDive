<?php
session_start();
date_default_timezone_set('Europe/Paris');
$voyages = json_decode(file_get_contents("../json/voyagesv2.json"), true);
$id      = isset($_GET['id']) ? (int)$_GET['id'] : -1;
$voyage  = ($id >= 0 && isset($voyages[$id])) ? $voyages[$id] : null;
// Préparer les tarifs
$tarifs1 = ['hebergement'=>[], 'restauration'=>[], 'activites'=>[], 'transport'=>[]];
foreach($voyage['hebergements']   as $o) $tarifs1['hebergement'][$o['label']] = $o['prix'];
foreach($voyage['restaurations']  as $o) $tarifs1['restauration'][$o['label']] = $o['prix'];
foreach($voyage['activites']      as $o) $tarifs1['activites'][$o['label']]    = $o['prix'];
foreach($voyage['transports']     as $o) $tarifs1['transport'][$o['label']]     = $o['prix'];

$tarifs2 = ['hebergement'=>[], 'restauration'=>[], 'activites'=>[], 'transport'=>[]];
foreach($voyage['hebergements2']  as $o) $tarifs2['hebergement'][$o['label2']] = $o['prix2'];
foreach($voyage['restaurations2'] as $o) $tarifs2['restauration'][$o['label2']] = $o['prix2'];
foreach($voyage['activites2']     as $o) $tarifs2['activites'][$o['label2']]    = $o['prix2'];
foreach($voyage['transports2']    as $o) $tarifs2['transport'][$o['label2']]     = $o['prix2'];

$tarifs3 = ['transport'=>[]];
foreach($voyage['transports3']    as $o) $tarifs3['transport'][$o['label3']]     = $o['prix3'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Vue détaillée du voyage</title>
  <link rel="stylesheet" href="../style/nav_footer.css">
  <link rel="stylesheet" href="../style/vuedetaille.css">
</head>
<body>
<?php include("navbar.php"); ?>

<main class="meilleure-plans-wrapper">
<?php if (!$voyage): ?>
  <p style="color:red; text-align:center; margin:2rem;">Erreur : voyage introuvable.</p>
  <?php exit; ?>
<?php endif; ?>

<!-- Bannière -->
<section class="hero" style="    background-image: url('<?= $voyage['image'] ?>'),
                      url('<?= $voyage['image2'] ?>');
    background-position: left top, right top;
    background-size: 50% 100%, 50% 100%;
    background-repeat: no-repeat, no-repeat;">
    
  <div class="overlay">
    <h1>Explorez <span><?= ($voyage['titre']) ?></span> et <span><?= ($voyage['titre2']) ?></span> !</h1>
  </div>
</section>
<br>
    <lo>Les options, déjà prédéfinis sont les options choisies par le voyage, mais vous pouvez modifier cela.</lo>
    <br><br>

<!-- Formulaire deux colonnes pour les choix -->
<form id="dualForm" action="recapitulatifv2.php" method="POST"
          data-tarifs1='<?= json_encode($tarifs1, JSON_HEX_APOS|JSON_HEX_QUOT) ?>'
          data-tarifs2='<?= json_encode($tarifs2, JSON_HEX_APOS|JSON_HEX_QUOT) ?>'
          data-tarifs3='<?= json_encode($tarifs3, JSON_HEX_APOS|JSON_HEX_QUOT) ?>'>
      <input type="hidden" name="id" value="<?= $id ?>">

    <div class="form-section">
        <lo for="nb_personnes">Nombre de personnes pour le voyage :</lo>
        <input type="number" name="nb_personnes" id="nb_personnes" min="1" max="20" value="<?= $voyage['nb_personnes'] ?>" step="1">
    </div>
    
  <div class="dual-step-container">

    <!-- Colonne de gauche -->
    <div class="dual-step">

        <div class="form-section">
        
        <div class="bloc-dates">
            <lo for="date_debut">Date de début de l'étape 1 du voyage :</lo>
            <input type="date" name="date_debut" id="date_debut" min="2025-04-28" max="2026-04-28" value="<?= $voyage['date_debut'] ?>" required>
        </div>

        <div class="bloc-dates">
            <lo for="date_fin">Date de fin de l'étape 1 du voyage :</lo>
            <input type="date" name="date_fin" id="date_fin" min="2025-04-28" max="2026-04-28" value="<?= $voyage['date_fin'] ?>" required>
        </div>
        </div>
        
        <div class="form-section">
            <lo>Choisissez un hébergement pour <?= ($voyage['titre']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['hebergements'] as $option): ?>
                    <label class="un-carré-info <?= $option['label'] == $voyage['hebergement_inclus']['label'] ? 'inclus' : '' ?>">
                        <input type="radio" name="hebergement" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['hebergement_inclus']['label'] ? 'checked' : '' ?> required>
                        <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                        <span><?= $option['prix'] . "€ par nuit pour 2 " . $option['label'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-section">
            <lo>Choisissez une restauration pour <?= ($voyage['titre']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['restaurations'] as $option): ?>
                    <label class="un-carré-info <?= $option['label'] == $voyage['restauration_incluse']['label'] ? 'inclus' : '' ?>">
                        <input type="radio" name="restauration" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['restauration_incluse']['label'] ? 'checked' : '' ?> required>
                        <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                        <span><?= $option['prix'] . "€ par jour et par personne : "?></span><span><?=$option['label'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-section">
            <lo>Ajoutez ou modifiez les activités pour <?= ($voyage['titre']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['activites'] as $option): ?>
                    <label class="un-carré-info <?= in_array($option['label'], array_column($voyage['activites_incluses'], 'label')) ? 'inclus' : '' ?>">
                        <input type="checkbox" name="activites[]" value="<?= $option['label'] ?>" <?= in_array($option['label'], array_column($voyage['activites_incluses'], 'label')) ? 'checked' : '' ?>>
                        <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                        <span><?= $option['prix'] . "€ par personne pour " . $option['label'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-section">
            <lo>Choisissez un mode de transport pour <?= ($voyage['titre']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['transports'] as $option): ?>
                    <label class="un-carré-info <?= $option['label'] == $voyage['transport_inclus']['label'] ? 'inclus' : '' ?>">
                        <input type="radio" name="transport" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['transport_inclus']['label'] ? 'checked' : '' ?> required>
                        <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                        <?php if ($option['label'] === 'voiture de location Citroën'): ?>
                            <span>
                                <?= ($option['prix']) ?> € par jour et
                                pour 1 <?= ($option['label']) ?> 
                                de 5 places
                            </span>
                        <?php else: ?>
                            <span>
                                <?= ($option['prix']) ?> € par jour et par personne 
                                pour 1 <?= ($option['label']) ?>
                            </span>
                        <?php endif; ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Colonne de droite -->
    <div class="dual-step">

        <div class="form-section">
        
        <div class="bloc-dates">
            <lo for="date_debut">Date de début de l'étape 2 du voyage :</lo>
            <input type="date" name="date_debut2" id="date_debut2" min="2025-04-28" max="2026-04-28" value="<?= $voyage['date_debut2'] ?>" required>
        </div>

        <div class="bloc-dates">
            <lo for="date_fin">Date de fin du voyage :</lo>
            <input type="date" name="date_fin2" id="date_fin2" min="2025-04-28" max="2026-04-28" value="<?= $voyage['date_fin2'] ?>" required>
        </div>
        </div>
        
        <div class="form-section">
            <lo>Choisissez un hébergement pour <?= ($voyage['titre2']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['hebergements2'] as $option): ?>
                    <label class="un-carré-info <?= $option['label2'] == $voyage['hebergement_inclus2']['label2'] ? 'inclus2' : '' ?>">
                        <input type="radio" name="hebergement2" value="<?= $option['label2'] ?>" <?= $option['label2'] == $voyage['hebergement_inclus2']['label2'] ? 'checked' : '' ?> required>
                        <img src="<?= $option['image2'] ?>" alt="<?= $option['label2'] ?>">
                        <span><?= $option['prix2'] . "€ par nuit pour 2 " . $option['label2'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-section">
            <lo>Choisissez une restauration pour <?= ($voyage['titre2']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['restaurations2'] as $option): ?>
                    <label class="un-carré-info <?= $option['label2'] == $voyage['restauration_incluse2']['label2'] ? 'inclus2' : '' ?>">
                        <input type="radio" name="restauration2" value="<?= $option['label2'] ?>" <?= $option['label2'] == $voyage['restauration_incluse2']['label2'] ? 'checked' : '' ?> required>
                        <img src="<?= $option['image2'] ?>" alt="<?= $option['label2'] ?>">
                        <span><?= $option['prix2'] . "€ par jour et par personne : "?></span><span><?=$option['label2'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-section">
            <lo>Ajoutez ou modifiez les activités pour <?= ($voyage['titre2']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['activites2'] as $option): ?>
                    <label class="un-carré-info <?= in_array($option['label2'], array_column($voyage['activites_incluses2'], 'label2')) ? 'inclus2' : '' ?>">
                        <input type="checkbox" name="activites2[]" value="<?= $option['label2'] ?>" <?= in_array($option['label2'], array_column($voyage['activites_incluses2'], 'label2')) ? 'checked' : '' ?>>
                        <img src="<?= $option['image2'] ?>" alt="<?= $option['label2'] ?>">
                        <span><?= $option['prix2'] . "€ par personne pour " . $option['label2'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-section">
            <lo>Choisissez un mode de transport pour <?= ($voyage['titre2']) ?></lo>
            <div class="ensemble-carré-info">
                <?php foreach ($voyage['transports2'] as $option): ?>
                    <label class="un-carré-info <?= $option['label2'] == $voyage['transport_inclus2']['label2'] ? 'inclus2' : '' ?>">
                        <input type="radio" name="transport2" value="<?= $option['label2'] ?>" <?= $option['label2'] == $voyage['transport_inclus2']['label2'] ? 'checked' : '' ?> required>
                        <img src="<?= $option['image2'] ?>" alt="<?= $option['label2'] ?>">
                        <?php if ($option['label2'] === 'voiture de location Citroën'): ?>
                            <span>
                                <?= ($option['prix2']) ?> € par jour
                                pour 1 <?= ($option['label2']) ?> 
                                de 5 places
                            </span>
                        <?php else: ?>
                            <span>
                                <?= ($option['prix2']) ?> € par jour et par personne 
                                pour 1 <?= ($option['label2']) ?>
                            </span>
                        <?php endif; ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
          </div>
          </div>
      
  </div><!-- /.dual-step-container -->

      <div class="form-section">
          <lo>Choisissez un mode de transport pour passer à la prochaine etape : <?= ($voyage['titre2']) ?></lo>
          <div class="ensemble-carré-info">
              <?php foreach ($voyage['transports3'] as $option): ?>
                  <label class="un-carré-info <?= $option['label3'] == $voyage['transport_inclus3']['label3'] ? 'inclus3' : '' ?>">
                      <input type="radio" name="transport3" value="<?= $option['label3'] ?>" <?= $option['label3'] == $voyage['transport_inclus3']['label3'] ? 'checked' : '' ?> required>
                      <img src="<?= $option['image3'] ?>" alt="<?= $option['label3'] ?>">
                      <span><?= $option['prix3'] . "€ par personne pour 1 " . $option['label3'] ?></span>
                  </label>
              <?php endforeach; ?>
          </div>
      </div>
      </div>

    <button type="submit" class="boutton-recherche">Valider et voir le récapitulatif</button>
</form>

        <div id="prix_total_dynamique" style="font-weight:bold; font-size:20px; margin:20px; text-align:center;"></div>

             </main>
 <script src="../js/vuedetaillev2.js"></script>
<?php include("footer.php"); ?>
</body>
</html>
