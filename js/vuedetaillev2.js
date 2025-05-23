document.addEventListener('DOMContentLoaded', function () {
    const dualForm = document.getElementById("dualForm");
    const tarifs1 = dualForm.dataset.tarifs1 ? JSON.parse(dualForm.dataset.tarifs1) : { hebergement: {}, restauration: {}, activites: {}, transport: {} };
    const tarifs2 = dualForm.dataset.tarifs2 ? JSON.parse(dualForm.dataset.tarifs2) : { hebergement: {}, restauration: {}, activites: {}, transport: {} };
    const tarifs3 = dualForm.dataset.tarifs3 ? JSON.parse(dualForm.dataset.tarifs3) : { transport: {} };

    const ceilDiv = (a, b) => Math.ceil(a / b);

    function getNuits(startEl, endEl) {
        if (!startEl.value || !endEl.value) return 1;
        const d1 = new Date(startEl.value),
              d2 = new Date(endEl.value),
              diff = (d2 - d1) / (1000 * 3600 * 24);
        return Math.max(1, Math.ceil(diff));
    }

    function syncDates() {
        if (date_debut1.value) {
            const min1 = new Date(date_debut1.value);
            min1.setDate(min1.getDate() + 1);
            const s1 = min1.toISOString().split('T')[0];
            date_fin1.min = s1;
            if (date_fin1.value < s1) date_fin1.value = s1;
        }
        date_debut2.value = date_fin1.value;
        date_debut2.min = date_fin1.value;

        if (date_debut2.value) {
            const min2 = new Date(date_debut2.value);
            min2.setDate(min2.getDate() + 1);
            const s2 = min2.toISOString().split('T')[0];
            date_fin2.min = s2;
            if (date_fin2.value < s2) date_fin2.value = s2;
        }
    }

    function calculeColonne(suffix, tarifs, pers, nuits) {
        const jours = nuits + 1;
        let sum = 0;
        const h = document.querySelector(`input[name="hebergement${suffix}"]:checked`);
        if (h) sum += tarifs.hebergement[h.value] * ceilDiv(pers, 2) * nuits;
        const r = document.querySelector(`input[name="restauration${suffix}"]:checked`);
        if (r) sum += tarifs.restauration[r.value] * pers * jours;
        document.querySelectorAll(`input[name="activites${suffix}[]"]:checked`)
            .forEach(a => sum += tarifs.activites[a.value] * pers);
        const t = document.querySelector(`input[name="transport${suffix}"]:checked`);
        if (t) {
            const p = tarifs.transport[t.value];
            if (t.value.toLowerCase().includes("voiture")) {
                sum += p * ceilDiv(pers, 5) * jours;
            } else {
                sum += p * pers * jours;
            }
        }
        return sum;
    }

    function calculeTransport3(pers) {
        const sel = document.querySelector('input[name="transport3"]:checked');
        return sel ? tarifs3.transport[sel.value] * pers : 0;
    }

    function majPrix() {
        syncDates();
        const pers = parseInt(nb_personnes.value) || 1;
        const nuits1 = getNuits(date_debut1, date_fin1);
        const nuits2 = getNuits(date_debut2, date_fin2);
        let total = 0;
        total += calculeColonne("", tarifs1, pers, nuits1);
        total += calculeColonne("2", tarifs2, pers, nuits2);
        total += calculeTransport3(pers);
        prix_total_dynamique.textContent = "Prix total : " + total + " €";
    }

    const date_debut1 = document.getElementById("date_debut"),
          date_fin1 = document.getElementById("date_fin"),
          date_debut2 = document.getElementById("date_debut2"),
          date_fin2 = document.getElementById("date_fin2"),
          nb_personnes = document.getElementById("nb_personnes"),
          prix_total_dynamique = document.getElementById("prix_total_dynamique");

    [date_debut1, date_fin1, date_debut2, date_fin2, nb_personnes]
        .forEach(el => el.addEventListener("change", majPrix));
    document.querySelectorAll('input[type="radio"], input[type="checkbox"]')
        .forEach(i => i.addEventListener("change", majPrix));

    majPrix();
});
