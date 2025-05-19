<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Recherche de voyage</title>
  <link rel="stylesheet" href="../style/nav_footer.css">
  <link rel="stylesheet" href="../style/search.css">
</head>
<body>
  <?php include("navbar.php") ?>

  <section class="titre">
    <h1>Explorez les <span>Abysses</span></h1>
    <form method="POST" action="recherchev2.php" id="formRecherche">
      <div class="recherche-tout">
        <div class="bulle">
          <label>📍 Destination</label>
          <div class="bulle-destinations">
            <input type="hidden" name="destination" id="destination-input" value="">
              <button type="button" class="destination" value="Tulum">
                          Tulum</button>
                      <button type="button" class="destination" value="Porquerolles">
                  Porquerolles</button>
                      <button type="button" class="destination" value="Whitsunday island">
                          Whitsunday island</button>
                      <button type="button" class="destination" value="Palawan">
                          Palawan</button>
                      <button type="button" class="destination" value="Bahamas">Bahamas</button>
                      <button type="button" class="destination" value="Bali">
                      Bali</button>
                      <button type="button" class="destination" value="Malé Atoll">
                          Malé Atoll</button>
                      <button type="button" class="destination" value="Phuket">
                          Phuket</button>
                      <button type="button" class="destination" value="Boracay">
                          Boracay</button>
                      <button type="button" class="destination" value="Cancùn">
                          Cancùn</button>
                      <button type="button" class="destination" value="Îles Canaries">
                          Îles Canaries</button>

                      <button type="button" class="destination" value="Zakynthos/Zante">
                          Zakynthos/Zante</button>
                      <button type="button" class="destination" value="Paihia">
                          Paihia</button>
                      <button type="button" class="destination" value="Sicile">
                          Sicile</button>
                      <button type="button" class="destination" value="Manuel Antonio">
                          Manuel Antonio</button>
                  </div>
              </div>

        <div class="bulle">
          <label>📅 Date de départ</label>
          <input type="date" name="date_depart" min="2025-07-06" value="2025-07-06" required>
        </div>

        <div class="bulle">
          <label>📅 Date de retour</label>
          <input type="date" name="date_fin" min="2025-07-07" value="2025-07-07" required>
        </div>

        <button type="submit" class="boutton-recherche">Rechercher</button>
      </div>
    </form>
  </section>

  <?php include("footer.php") ?>

  <script src="../js/recherchev1.js"></script>
</body>
</html>






