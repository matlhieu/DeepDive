document.addEventListener('DOMContentLoaded', () => {

  const champDepart = document.querySelector('input[name="date_depart"]');
  const champFin    = document.querySelector('input[name="date_fin"]');
  const boutons     = document.querySelectorAll('.destination');
  const destInput   = document.getElementById('destination-input');
  const form        = document.getElementById('formRecherche');

  // 1) Mise à jour du min de date_fin à date_depart + 1 jour
  function majMinDateFin() {
    if (!champDepart.value) return;
    const depart = new Date(champDepart.value);
    depart.setDate(depart.getDate() + 1);
    const yyyy = depart.getFullYear();
    const mm   = String(depart.getMonth() + 1).padStart(2, '0');
    const dd   = String(depart.getDate()).padStart(2, '0');
    const nouvelleMin = `${yyyy}-${mm}-${dd}`;

    champFin.min = nouvelleMin;
    if (champFin.value && champFin.value < nouvelleMin) {
      champFin.value = nouvelleMin;
    }
  }

  // 2) Validation des dates avant envoi du formulaire
  function validateDates() {
    if (!champDepart.value || !champFin.value || champFin.value <= champDepart.value) {
      alert("La date de retour doit être strictement après la date de départ.");
      return false;
    }
    return true;
  }
  form.addEventListener('submit', e => {
    if (!validateDates()) e.preventDefault();
  });

  // 3) Sélection multiple de destinations
  function updateDestinations() {
    const vals = Array.from(boutons)
                      .filter(b => b.classList.contains('active'))
                      .map(b => b.value.trim());
    destInput.value = vals.join(',');
  }
  boutons.forEach(btn => {
    btn.addEventListener('click', () => {
      btn.classList.toggle('active');
      updateDestinations();
    });
  });

  // 4) Initialisation
  champDepart.addEventListener('change', majMinDateFin);
  majMinDateFin();
});
