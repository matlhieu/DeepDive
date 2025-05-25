document.addEventListener("DOMContentLoaded", () => {
    const fields = ["nom", "prenom", "email", "naissance"];
    const initialData = {};
    const modifiedData = {};

    fields.forEach(id => {
        const span = document.getElementById(id);
        initialData[id] = span.textContent;
    });

    fields.forEach(id => {
        const btn = document.querySelector(`#${id} ~ .edit-btn`);
        btn.addEventListener("click", () => makeEditable(id, btn));
    });

    function makeEditable(id, btn) {
        const span = document.getElementById(id);
        const currentValue = span.textContent;

        const input = document.createElement("input");
        input.className = "edit-input";
        input.id = id;

        if (id === "naissance") {
            input.type = "date";
            input.max = new Date().toISOString().split("T")[0]; // max: aujourd'hui
            input.value = currentValue;
        } else {
            input.type = "text";
            input.value = currentValue;
        }

        const parent = span.parentNode;
        parent.replaceChild(input, span);

        const validateBtn = document.createElement("button");
        validateBtn.textContent = "Valider";
        validateBtn.className = "edit-btn";

        validateBtn.onclick = () => {
            const newValue = input.value;

            if (id === "naissance") {
                const today = new Date();
                const birthDate = new Date(newValue);
                const age = today.getFullYear() - birthDate.getFullYear();
                const m = today.getMonth() - birthDate.getMonth();
                const isTooYoung = age < 18 || (age === 18 && m < 0) || (age === 18 && m === 0 && today.getDate() < birthDate.getDate());

                if (birthDate > today) {
                    alert("La date de naissance ne peut pas être dans le futur.");
                    return;
                }

                if (isTooYoung) {
                    alert("Vous devez avoir au moins 18 ans.");
                    return;
                }
            }

            const newSpan = document.createElement("span");
            newSpan.id = id;
            newSpan.textContent = newValue;
            parent.replaceChild(newSpan, input);
            validateBtn.remove();
            cancelBtn.remove();
            btn.style.display = "inline-block";

            if (newValue !== initialData[id]) {
                modifiedData[id] = newValue;
                showSubmitButton();
            }
        };

        const cancelBtn = document.createElement("button");
        cancelBtn.textContent = "Annuler";
        cancelBtn.className = "edit-btn";
        cancelBtn.onclick = () => {
            parent.replaceChild(span, input);
            validateBtn.remove();
            cancelBtn.remove();
            btn.style.display = "inline-block";
        };

        parent.appendChild(validateBtn);
        parent.appendChild(cancelBtn);
        btn.style.display = "none";
    }

    function showSubmitButton() {
        if (!document.getElementById("submit-changes")) {
            const submitBtn = document.createElement("button");
            submitBtn.id = "submit-changes";
            submitBtn.textContent = "Soumettre les modifications";
            submitBtn.className = "edit-btn";
            submitBtn.style.marginTop = "20px";
            submitBtn.onclick = () => submitChanges();

            document.querySelector(".box-container").appendChild(submitBtn);
        }
    }

    function submitChanges() {
        fetch("update_profil.php", {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify(modifiedData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Modifications enregistrées !");
                location.reload();
            } else {
                alert("Erreur : " + data.message);
            }
        })
        .catch(err => {
            console.error("Erreur requête :", err);
            alert("Une erreur est survenue.");
        });
    }
});
