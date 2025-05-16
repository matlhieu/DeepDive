<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche - DeepDive</title>
    <link rel="stylesheet" href="../style/nav_footer.css"> 
    <link rel="stylesheet" href="../style/search.css">
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const champDepart = document.querySelector('input[name="date_depart"]');
          const champFin    = document.querySelector('input[name="date_fin"]');

          // À l'init, on règle le min de date_fin à date_depart + 1 jour
          function majMinDateFin() {
            if (!champDepart.value) return;
            const depart   = new Date(champDepart.value);
            depart.setDate(depart.getDate() + 1);

            const yyyy = depart.getFullYear();
            const mm   = String(depart.getMonth() + 1).padStart(2, '0');
            const dd   = String(depart.getDate()).padStart(2, '0');
            const nouvelleMin = `${yyyy}-${mm}-${dd}`;

            champFin.min = nouvelleMin;
            // si la valeur actuelle est inférieure, on corrige automatiquement
            if (champFin.value && champFin.value < nouvelleMin) {
              champFin.value = nouvelleMin;
            }
          }

          // Dès qu'on choisit une date de départ, on met à jour min de date_fin
          champDepart.addEventListener('change', majMinDateFin);

          // Initialisation au chargement de la page
          majMinDateFin();
        });
      </script>
</head>
<body>
    <?php include("navbar.php") ?>

    <section class="titre">
        <h1>Explorez les <span>Abysses</span></h1>
        <form method="POST" action="recherchev2.php" onsubmit="return validateDates()">
            <div class="recherche-tout">
                <div class="bulle">
                    <label>📍 Destination</label>
                    <div class="bulle-destinations">
                        <input type="hidden" name="destination" id="destination-input" value="">

                        <button type="button" class="destination" value="Parc National de Port-Cros">
                            Parc National de Port-Cros</button>
                        <button type="button" class="destination" value="Porquerolles">
                    Porquerolles</button>
                        <button type="button" class="destination" value="Calanques de Marseille">
                            Calanques de Marseille</button>
                        <button type="button" class="destination" value="Îles Lavezzi">
                    Îles Lavezzi</button>
                        <button type="button" class="destination" value="Île de Gozo">Île de Gozo</button>
                        <button type="button" class="destination" value="Réserve de Cerbère-Banyuls">
                            Réserve de Cerbère-Banyuls</button>
                        <button type="button" class="destination" value="Îles Medes">
                            Îles Medes</button>
                        <button type="button" class="destination" value="Parc national de Cabrera aux Îles Baléares">
                        Parc national de Cabrera aux Îles Baléares</button>
                        <button type="button" class="destination" value="Île de Tabarca">
                    Île de Tabarca</button>
                        <button type="button" class="destination" value="Capo di Feno à Ajaccio">
                    Capo di Feno à Ajaccio</button>
                        <button type="button" class="destination" value="Îles Canaries">
                            Îles Canaries</button>
                        
                        <button type="button" class="destination" value="Zakynthos/Zante">
                            Zakynthos/Zante</button>
                        <button type="button" class="destination" value="Comino">
                            Comino</button>
                        <button type="button" class="destination" value="Sicile">
                            Sicile</button>
                        <button type="button" class="destination" value="Oludenize">
                            Oludenize</button>
                    </div>
                </div>

                        
                <div class="bulle">
                    <label>🤿 Nombre de personnes</label>
                    <input type="number" name="nombre_personnes" min="1" max="20" value="1" step="1">  
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
</body>
    <script>
      const boutons = document.querySelectorAll('.destination');
      function updateDestinations() {
        const vals = Array.from(boutons)
                          .filter(b => b.classList.contains('active'))
                          .map(b => b.value.trim());
        document.getElementById('destination-input').value = vals.join(',');
      }

      boutons.forEach(btn => {
        btn.addEventListener('click', () => {
          btn.classList.toggle('active');
          updateDestinations();
        });
      });
    </script>
</html>

