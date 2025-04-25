<?php


date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("voyagesv2.json");
$voyages = json_decode($voyages_json, true);

$id = isset($_POST['id']) ? (int)$_POST['id'] : -1;
$voyage = ($id >= 0 && isset($voyages[$id])) ? $voyages[$id] : null;

$titre = $_POST['titre'] ?? '';
$hebergement = $_POST['hebergement'] ?? '';
$restauration = $_POST['restauration'] ?? '';
$transport = $_POST['transport'] ?? '';
$activites = $_POST['activites'] ?? [];
$nb_personnes = $_POST['nb_personnes'] ?? 'Non précisé';
$date_debut = $_POST['date_debut'] ?? '';
$date_fin = $_POST['date_fin'] ?? '';

$prix_hebergement = 0;
$prix_act = 0;
$prix_restauration = 0;
$prix_trans = 0;
$prix_total = 0;

// Calcul du nombre de nuits
$nb_nuits = 1;
if (!empty($date_debut) && !empty($date_fin)) {
    $ts_debut = strtotime($date_debut);
    $ts_fin = strtotime($date_fin);
    if ($ts_debut && $ts_fin && $ts_fin > $ts_debut) {
        $nb_nuits = max(1, round(($ts_fin - $ts_debut) / (60 * 60 * 24)));
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récapitulatif du voyage personnalisé</title>
    <link rel="stylesheet" href="../style/nav_footer.css">
    <link rel="stylesheet" href="../style/recapitulatif.css">
</head>
<body>
<?php include("navbar.php"); ?>

<?php if ($voyage): ?>
<section class="hero" style="background-image: url('<?= $voyage['image'] ?>');">
    <div class="overlay">
        <h1>Récapitulatif de votre voyage à <span><?= $voyage['titre'] ?></span></h1>
    </div>
</section>

<label>Voici votre configuration de voyage : </label>
<br><br>

<div class="form-section">
    <label>Hébergement sélectionné :</label>
    <div class="ensemble-carré-info">
        <?php foreach ($voyage['hebergements'] as $option): ?>
            <?php if ($option['label'] === $hebergement): ?>
    <?php 
    $personnes = (int)$nb_personnes;
    $transport_prix = $option['prix'];
    $multiplicateur = ceil($personnes / 2);
    $prix_hebergement += $transport_prix * $multiplicateur * $nb_nuits
    ?>
                <label class="un-carré-info inclus">
                    <input type="hidden">
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span>
                        <?= $multiplicateur ?> chambre(s) pour <?= $nb_nuits ?> nuit(s)
                        - <?= $prix_hebergement ?> € au total
                    </span>
                </label>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
    
    <div class="form-section">
        <label>Restauration sélectionnée :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['restaurations'] as $option): ?>
                <?php if ($option['label'] === $restauration): ?>
    <?php 
        $personnes = is_numeric($nb_personnes) ? (int)$nb_personnes : 1;
        $prix_unitaire = $option['prix'];
        $prix_restauration += $prix_unitaire * $personnes * $nb_nuits;
    ?>
                    <label class="un-carré-info inclus">
                        <input type="hidden">
                        <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                        <span><?= $nb_personnes . $option['label'] . " pour " . $nb_nuits . " jours " . " - " . $prix_restauration ?>€ au total</span>
                        <?php if (isset($option['description'])): ?>
                            <small><?= $option['description'] ?></small>
                        <?php endif; ?>
                    </label>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>



    
    <div class="form-section">
        <label>Activité(s) sélectionnée(s) :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($activites as $act): ?>
                <?php foreach ($voyage['activites'] as $option): ?>
                    <?php if ($option['label'] === $act): ?>
                        <?php $prix_act += $option['prix'] * (is_numeric($nb_personnes) ? (int)$nb_personnes : 1); ?>
                        <label class="un-carré-info inclus">
                            <input type="hidden">
                            <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                            <span><?= $option['label'] ?> - <?= $option['prix'] ?>€</span>
                            <small>Nombre de personnes pour cette activité : <?= $nb_personnes ?></small>
                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <br>
        <label><?= $prix_act ?>€ au total pour l'ensemble des activités</label>
    </div>

<div class="form-section">
    <label>Transport sélectionné :</label>
    <div class="ensemble-carré-info">
        <?php foreach ($voyage['transports'] as $option): ?>
            <?php if ($option['label'] === $transport): ?>
      <?php 
                if ($option['label'] === "voiture de location Citroën" && is_numeric($nb_personnes)) {
                    $personnes = (int)$nb_personnes;
                    $transport_prix = $option['prix'];
                    $multiplicateur = ceil($personnes / 5);
                    $prix_trans += $transport_prix * $multiplicateur;
                } else {
                    $prix_trans += $option['prix'] * (is_numeric($nb_personnes) ? (int)$nb_personnes : 1);
                }
            ?>
                <label class="un-carré-info inclus">
                    <input type="hidden">
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $nb_personnes . " " . $option['label'] . " - " . $prix_trans ?>€ au total</span>
                </label>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

    <label>Prix total du voyage : <?= $prix_hebergement + $prix_restauration + $prix_act + $prix_trans ?> €</label>
    <label>Date du voyage : 
        Du <?= $date_debut ? date('d/m/Y', strtotime($date_debut)) : 'Non précisé' ?> 
        au <?= $date_fin ? date('d/m/Y', strtotime($date_fin)) : 'Non précisé' ?> 
    </label>


<br><br>

<form action="vuedetaillev2.php" method="GET">
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit" class="boutton-recherche">Modifier le voyage</button>
</form>
<br>
    <form action="paiement.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="hebergement" value="<?= $hebergement ?>">
        <input type="hidden" name="restauration" value="<?= $restauration ?>">
        <input type="hidden" name="transport" value="<?= $transport ?>">
        <input type="hidden" name="nb_personnes" value="<?= $nb_personnes ?>">

        <input type="hidden" name="date_debut" value="<?= $voyage['date_debut'] ?>">
        <input type="hidden" name="date_fin" value="<?= $voyage['date_fin'] ?>">
        <input type="hidden" name="titre" value="<?= htmlspecialchars($voyage['titre']) ?>">


        <?php foreach ($activites as $act): ?>
            <input type="hidden" name="activites[]" value="<?= $act ?>">
        <?php endforeach; ?>
        <button type="submit" class="boutton-recherche">Confirmer et passer au paiement</button>
    </form>


<?php else: ?>
    <p style="color:red; text-align:center;">Erreur : voyage introuvable.</p>
<?php endif; ?>

<?php include("footer.php"); ?>
</body>
</html>


