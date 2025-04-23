<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche - DeepDive</title>
    <link rel="stylesheet" href="../style/nav_footer.css"> 
    <link rel="stylesheet" href="../style/search.css">
</head>
<body>
    <?php include("navbar.php") ?>

    <section class="titre">
        <h1>Explorez les <span>Abysses</span></h1>
        <form method="POST" action="recherchev2.php">
            <div class="recherche-tout">
                <div class="bulle">
                    <label>📍 Destination</label>
                    <select name="destination">
                        <option>Port-Cros</option>
                        <option>Porquerolles</option>
                        <option>Calanques</option>
                        <option>Îles Lavezzi</option>
                        <option>Gozo</option>
                        <option>Cerbère-Banyuls</option>
                        <option>îles Medes</option>
                        <option>Cabrera aux îles Baléares</option>
                        <option>Île de Tabarca</option>
                        <option>Capo di Feno à Ajaccio</option>
                    </select>
                </div>

                <div class="bulle">
                    <label>🤿 Nombre de personnes</label>
                    <input type="number" name="nombre_personnes" min="1" max="20" value="1" step="1">  
                </div>

                <div class="bulle">
                    <label>📅 Date de départ</label>
                    <input type="date" name="date_depart" min="2025-02-16" value="2025-02-16">
                </div>

                <div class="bulle">
                    <label>⏳ Durée</label>
                    <select name="duree">
                        <option>1 jour</option>
                        <option>3 jours</option>
                        <option>5 jours</option>
                        <option>1 semaine</option>
                    </select>
                </div>

                <button type="submit" class="boutton-recherche">Rechercher</button>
            </div>
        </form>
    </section>

    <?php include("footer.php") ?>
</body>
</html>
