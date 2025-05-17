<?php
session_start();
date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("../json/voyagesv2.json");
$voyages = json_decode($voyages_json, true);

$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;
$voyage = ($id >= 0 && isset($voyages[$id])) ? $voyages[$id] : null;
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
    
<?php if ($voyage): ?>
<section class="hero" style="background-image: url('<?= $voyage['image'] ?>');">
    <div class="overlay">
        <h1>Explorez <span><?= $voyage['titre'] ?></span> !</h1>
    </div>
</section>
    <br>
<label>Les carrés déjà cochés sont les options choisies par le voyage, mais vous pouvez modifier cela.</label>
<br><br>

<form action="recapitulatifv2.php" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="form-section">
        <label for="nb_personnes">Nombre de personnes pour le voyage :</label>
        <input type="number" name="nb_personnes" id="nb_personnes" min="1" max="20" value="<?= $voyage['nb_personnes'] ?>" step="1">
    </div>

    <div class="bloc-dates">
        <label for="date_debut">Date de début du voyage :</label>
        <input type="date" name="date_debut" id="date_debut" min="2025-04-28" max="2026-04-28" value="<?= $voyage['date_debut'] ?>" required>
    </div>

    <div class="bloc-dates">
        <label for="date_fin">Date de fin du voyage :</label>
        <input type="date" name="date_fin" id="date_fin" min="2025-04-28" max="2026-04-28" value="<?= $voyage['date_fin'] ?>" required>
    </div>
    <div class="ligne-separation"></div>

    <div class="form-section">
        <label>Choisissez un hébergement :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['hebergements'] as $option): ?>
                <label class="un-carré-info <?= $option['label'] == $voyage['hebergement_inclus']['label'] ? 'inclus' : '' ?>">
                    <input type="radio" name="hebergement" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['hebergement_inclus']['label'] ? 'checked' : '' ?> required>
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $option['prix'] . "€ par jour pour 2 " . $option['label'] ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-section">
        <label>Choisissez une restauration :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['restaurations'] as $option): ?>
                <label class="un-carré-info <?= $option['label'] == $voyage['restauration_incluse']['label'] ? 'inclus' : '' ?>">
                    <input type="radio" name="restauration" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['restauration_incluse']['label'] ? 'checked' : '' ?> required>
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $option['prix'] . "€ par jour pour 1 " . $option['label'] ?></span>
                    <small><?= $option['description'] ?></small>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-section">
        <label>Ajoutez ou modifiez les activités :</label>
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
        <label>Choisissez un mode de transport :</label>
        <div class="ensemble-carré-info">
            <?php foreach ($voyage['transports'] as $option): ?>
                <label class="un-carré-info <?= $option['label'] == $voyage['transport_inclus']['label'] ? 'inclus' : '' ?>">
                    <input type="radio" name="transport" value="<?= $option['label'] ?>" <?= $option['label'] == $voyage['transport_inclus']['label'] ? 'checked' : '' ?> required>
                    <img src="<?= $option['image'] ?>" alt="<?= $option['label'] ?>">
                    <span><?= $option['prix'] . "€ par personne pour 1 " . $option['label'] ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <button type="submit" class="boutton-recherche">Valider et voir le récapitulatif</button>
</form>

<div id="prix_total_dynamique" style="font-weight:bold; font-size:20px; margin:20px; text-align:center;"></div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const prixOptions = { hebergement: {}, restauration: {}, activites: {}, transport: {} };

        <?php foreach ($voyage['hebergements'] as $option): ?>
            prixOptions.hebergement["<?= $option['label'] ?>"] = <?= $option['prix'] ?>;
        <?php endforeach; ?>
        <?php foreach ($voyage['restaurations'] as $option): ?>
            prixOptions.restauration["<?= $option['label'] ?>"] = <?= $option['prix'] ?>;
        <?php endforeach; ?>
        <?php foreach ($voyage['activites'] as $option): ?>
            prixOptions.activites["<?= $option['label'] ?>"] = <?= $option['prix'] ?>;
        <?php endforeach; ?>
        <?php foreach ($voyage['transports'] as $option): ?>
            prixOptions.transport["<?= $option['label'] ?>"] = <?= $option['prix'] ?>;
        <?php endforeach; ?>
       
        function arrondiSuperieur(valeur, unite) {
            return Math.ceil(valeur / unite);
        }

        function calculerNombreJours() {
            const debut = document.getElementById("date_debut").value;
            const fin = document.getElementById("date_fin").value;
            if (!debut || !fin) return 1;
            const date1 = new Date(debut);
            const date2 = new Date(fin);
            const diff = (date2 - date1) / (1000 * 3600 * 24);
            return Math.max(1, diff);
        }

        function verifierDates() {
            const debut = document.getElementById("date_debut").value;
            const dateFinInput = document.getElementById("date_fin");
            if (debut) {
                const dateMinFin = new Date(debut);
                dateMinFin.setDate(dateMinFin.getDate() + 1);
                const minStr = dateMinFin.toISOString().split('T')[0];
                dateFinInput.min = minStr;
                if (new Date(dateFinInput.value) < dateMinFin) {
                    dateFinInput.value = minStr;
                }
            }
        }

        function calculerPrix() {
            const nbPersonnes = parseInt(document.getElementById("nb_personnes").value) || 1;
            const nbJours = calculerNombreJours();
            let total = 0;

            const hebergementChoisi = document.querySelector('input[name="hebergement"]:checked');
            if (hebergementChoisi) {
                const blocsHebergement = arrondiSuperieur(nbPersonnes, 2);
                total += prixOptions.hebergement[hebergementChoisi.value] * blocsHebergement * nbJours;
            }

            const restaurationChoisie = document.querySelector('input[name="restauration"]:checked');
            if (restaurationChoisie) {
                   nbJourss = nbJours + 1;
                total += prixOptions.restauration[restaurationChoisie.value] * nbPersonnes * nbJourss;
            }

            const activitesChoisies = document.querySelectorAll('input[name="activites[]"]:checked');
            activitesChoisies.forEach(act => {
                total += prixOptions.activites[act.value] * nbPersonnes;
            });

            const transportChoisi = document.querySelector('input[name="transport"]:checked');
            if (transportChoisi) {
                const label = transportChoisi.value.toLowerCase();
                if (label.includes("voiture")) {
                    const blocsVoiture = arrondiSuperieur(nbPersonnes, 5);
                       nbJourss = nbJours + 1;
                    total += prixOptions.transport[transportChoisi.value] * blocsVoiture * nbJourss;
                } else {
                       nbJourss = nbJours + 1;
                    total += prixOptions.transport[transportChoisi.value] * nbPersonnes * nbJourss;
                }
            }

            document.getElementById('prix_total_dynamique').textContent = "Prix total : " + total + " €";
        }

        document.getElementById('date_debut').addEventListener('change', function () {
            verifierDates();
            calculerPrix();
        });

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', calculerPrix);
        });
        document.querySelectorAll('input[type="date"]').forEach(input => {
            input.addEventListener('change', calculerPrix);
        });

        verifierDates();
        calculerPrix();
    });
    </script>



<?php else: ?>
    <p style="color:red; text-align:center;">Erreur : voyage introuvable.</p>
<?php endif; ?>
             </main>
<?php include("footer.php"); ?>
</body>
</html>
