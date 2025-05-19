<?php
session_start();

// Fonction pour obtenir l'API Key
function getAPIKey($vendeur)
{
    $valids = [
      'MI-1_A','MI-1_B','MI-1_C','MI-1_D','MI-1_E','MI-1_F','MI-1_G','MI-1_H','MI-1_I','MI-1_J',
      'MI-2_A','MI-2_B','MI-2_C','MI-2_D','MI-2_E','MI-2_F','MI-2_G','MI-2_H','MI-2_I','MI-2_J',
      'MI-3_A','MI-3_B','MI-3_C','MI-3_D','MI-3_E','MI-3_F','MI-3_G','MI-3_H','MI-3_I','MI-3_J',
      'MI-4_A','MI-4_B','MI-4_C','MI-4_D','MI-4_E','MI-4_F','MI-4_G','MI-4_H','MI-4_I','MI-4_J',
      'MI-5_A','MI-5_B','MI-5_C','MI-5_D','MI-5_E','MI-5_F','MI-5_G','MI-5_H','MI-5_I','MI-5_J',
      'MEF-1_A','MEF-1_B','MEF-1_C','MEF-1_D','MEF-1_E','MEF-1_F','MEF-1_G','MEF-1_H','MEF-1_I','MEF-1_J',
      'MEF-2_A','MEF-2_B','MEF-2_C','MEF-2_D','MEF-2_E','MEF-2_F','MEF-2_G','MEF-2_H','MEF-2_I','MEF-2_J',
      'MIM_A','MIM_B','MIM_C','MIM_D','MIM_E','MIM_F','MIM_G','MIM_H','MIM_I','MIM_J',
      'SUPMECA_A','SUPMECA_B','SUPMECA_C','SUPMECA_D','SUPMECA_E','SUPMECA_F','SUPMECA_G','SUPMECA_H','SUPMECA_I','SUPMECA_J',
      'TEST'
    ];
    if (in_array($vendeur, $valids, true)) {
        return substr(md5($vendeur), 1, 15);
    }
    return "zzzz";
}

// Récupération des données POST (mêmes noms que dans votre récap)
$id            = $_POST['id']            ?? '';
$titre1        = $_POST['titre']         ?? '';
$titre2        = $_POST['titre2']        ?? '';
$nb_personnes  = $_POST['nb_personnes']  ?? '';
$date_debut1   = $_POST['date_debut']    ?? '';
$date_fin1     = $_POST['date_fin']      ?? '';
$date_debut2   = $_POST['date_debut2']   ?? '';
$date_fin2     = $_POST['date_fin2']     ?? '';
$hebergement1  = $_POST['hebergement']   ?? '';
$hebergement2  = $_POST['hebergement2']  ?? '';
$restauration1 = $_POST['restauration']  ?? '';
$restauration2 = $_POST['restauration2'] ?? '';
$transport1    = $_POST['transport']     ?? '';
$transport2    = $_POST['transport2']    ?? '';
$transport3    = $_POST['transport3']    ?? '';
$activites1    = $_POST['activites']     ?? [];
$activites2    = $_POST['activites2']    ?? [];
$prix_total    = $_POST['prix_total']    ?? '';

// On peut à présent stocker en session ou vérifier ce qu'il manque :

$_SESSION['voyage_en_cours'] = [
  'id'            => $id,
  'titre'         => $titre1,     // passe juste un seul titre si tu n’en as besoin que d’un
  'titre2'        => $titre2,
  'nb_personnes'  => $nb_personnes,
  'date_debut'    => $date_debut1,
  'date_fin'      => $date_fin1,
  'date_debut2'   => $date_debut2,
  'date_fin2'     => $date_fin2,
  'hebergement'   => $hebergement1,
  'hebergement2'  => $hebergement2,
  'restauration'  => $restauration1,
  'restauration2' => $restauration2,
  'transport'     => $transport1,
  'transport2'    => $transport2,
  'transport3'    => $transport3,
  'activites'     => $activites1,
  'activites2'    => $activites2,
  'prix_total'    => $prix_total
];


// Préparation de la payment request
$vendeur    = "MI-2_H";
$transaction = uniqid("TRX");
$session_id = session_id();
$retour = "http://localhost:8000/php/retour_paiement.php?session=$session_id"; // à adapter selon serveur réel
$api_key     = getAPIKey($vendeur);

if ($api_key === "zzzz") {
    die("<h1>Erreur : API Key invalide</h1>");
}

$montant = number_format((float)$prix_total, 2, '.', '');
$control = md5("{$api_key}#{$transaction}#{$montant}#{$vendeur}#{$retour}#");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Paiement</title>
  <link rel="stylesheet" href="../style/nav_footer.css">
  <link rel="stylesheet" href="../style/login.css">
</head>
<body>
<?php include("navbar.php"); ?>

<section class="connexion">
  <div class="overlay">
    <h2>Récapitulatif de votre commande</h2>
    <div class="recapitulatif">

      <p><strong>Personnes :</strong> <?= ($nb_personnes) ?></p>
      
      <p><strong>Etape 1 :</strong> <?= ($titre1) ?> &ndash; <?= date('d/m/Y',strtotime($date_debut1)) ?> → <?= date('d/m/Y',strtotime($date_fin1)) ?></p>
      <p><strong>Hébergements :</strong> <?= ($hebergement1) ?></p>
      <p><strong>Restauration :</strong> <?= ($restauration1) ?>
        <p><strong>Transports :</strong> <?= ($transport1) ?>
      <p><strong>Activités :</strong>
        <?= empty($activites1) ? 'aucune' : '<ul><li>' . implode('</li><li>', array_map('htmlspecialchars',$activites1)) . '</li></ul>' ?>
      </p>

      <p><strong>Transports vers la prochaine étape:</strong> <?= ($transport3) ?>
      
      <p><strong>Etape 2 :</strong> <?= ($titre2) ?> &ndash; <?= date('d/m/Y',strtotime($date_debut2)) ?> → <?= date('d/m/Y',strtotime($date_fin2)) ?></p>
      <p><strong>Hébergements :</strong> <?= ($hebergement2) ?></p>
      <p><strong>Restauration :</strong> <?= ($restauration2) ?>
        <p><strong>Transports :</strong> <?= ($transport2) ?>
      <p><strong>Activités :</strong>
        <?= empty($activites2) ? 'aucune' : '<ul><li>' . implode('</li><li>', array_map('htmlspecialchars',$activites1)) . '</li></ul>' ?>
      </p>

      <p><strong>Montant total :</strong> <?= $montant ?> €</p>
    </div>

    <h2>Procéder au paiement</h2>
    <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
      <input type="hidden" name="transaction" value="<?= $transaction ?>">
      <input type="hidden" name="montant"     value="<?= $montant ?>">
      <input type="hidden" name="vendeur"     value="<?= $vendeur ?>">
      <input type="hidden" name="retour"      value="<?= $retour ?>">
      <input type="hidden" name="control"     value="<?= $control ?>">
      <input type="submit" value="Payer maintenant">
    </form>
  </div>
</section>

<?php include("footer.php"); ?>
</body>
</html>
