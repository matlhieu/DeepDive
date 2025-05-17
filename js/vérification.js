document.addEventListener('DOMContentLoaded', function() {
    // Récupération du formulaire
    const form = document.querySelector('form');
    
    // Ajout de l'icône œil pour le champ mot de passe
    setupPasswordToggle();
    
    // Ajout des compteurs de caractères
    setupCharacterCounters();
    
    
    form.addEventListener('submit', function(event) {
       
        event.preventDefault();
        
        // Validation du formulaire
        if (validateForm()) {
            // Si le formulaire est valide, on le soumet
            form.submit();
        }
    });
    
   
    setupLiveValidation();
});

/**
 * Ajoute la fonctionnalité d'affichage/masquage du mot de passe
 */
function setupPasswordToggle() {
    const passwordField = document.getElementById('mdp');
    const passwordContainer = passwordField.parentElement;
    
    // Création de l'icône de l'œil
    const toggleIcon = document.createElement('span');
    toggleIcon.innerHTML = '👁️';
    toggleIcon.className = 'password-toggle';
    toggleIcon.style.cursor = 'pointer';
    toggleIcon.style.position = 'absolute';
    toggleIcon.style.right = '10px';
    toggleIcon.style.top = '50%';
    toggleIcon.style.transform = 'translateY(-50%)';
    
    // Positionnement relatif du conteneur
    passwordContainer.style.position = 'relative';
    
    // Ajout de l'icône au conteneur
    passwordContainer.appendChild(toggleIcon);
    
    // Écouteur d'événement pour le clic sur l'icône
    toggleIcon.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.innerHTML = '👁️‍🗨️';
        } else {
            passwordField.type = 'password';
            toggleIcon.innerHTML = '👁️';
        }
    });
}

/**
 * Ajoute des compteurs de caractères aux champs nécessaires
 */
function setupCharacterCounters() {
    // Liste des champs qui nécessitent un compteur avec leurs limites
    const fieldsWithCounters = [
        { id: 'mail', maxLength: 100 },  // Exemple de limite pour l'email
        { id: 'mdp', maxLength: 50 },    // Exemple de limite pour le mot de passe
        { id: 'nom', maxLength: 50 },    // Exemple de limite pour le nom
        { id: 'prenom', maxLength: 50 }  // Exemple de limite pour le prénom
    ];
    
    fieldsWithCounters.forEach(field => {
        const inputElement = document.getElementById(field.id);
        const container = inputElement.parentElement;
        
        // Création du compteur
        const counter = document.createElement('div');
        counter.className = 'character-counter';
        counter.textContent = `0/${field.maxLength}`;
        counter.style.fontSize = '0.8em';
        counter.style.textAlign = 'right';
        counter.style.marginTop = '5px';
        
        // Ajout du compteur après l'input
        container.appendChild(counter);
        
        // Mise à jour du compteur lors de la saisie
        inputElement.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/${field.maxLength}`;
            
            // Mise en évidence si le nombre de caractères est trop élevé
            if (length > field.maxLength) {
                counter.style.color = 'red';
            } else {
                counter.style.color = '';
            }
        });
        
        // Mise à jour initiale du compteur
        const initialLength = inputElement.value.length;
        counter.textContent = `${initialLength}/${field.maxLength}`;
    });
}

/**
 * Configure la validation en temps réel des champs
 */
function setupLiveValidation() {
    const fields = [
        { id: 'nom', validate: validateName, errorMsg: 'Le nom de famille est requis.' },
        { id: 'prenom', validate: validateName, errorMsg: 'Le prénom est requis.' },
        { id: 'naissance', validate: validateBirthdate, errorMsg: 'La date doit être valide et vous devez avoir au moins 18 ans.' },
        { id: 'mail', validate: validateEmail, errorMsg: 'Veuillez entrer une adresse email valide.' },
        { id: 'mdp', validate: validatePassword, errorMsg: 'Le mot de passe doit contenir au moins 8 caractères avec au moins une lettre et un chiffre.' }
    ];
    
    fields.forEach(field => {
        const element = document.getElementById(field.id);
        
        // Création d'un élément pour afficher l'erreur
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        errorElement.style.color = 'red';
        errorElement.style.fontSize = '0.8em';
        errorElement.style.marginTop = '5px';
        errorElement.style.display = 'none';
        
        // Ajout de l'élément d'erreur après l'input
        element.parentElement.appendChild(errorElement);
        
        // Validation lors de la saisie (après un délai)
        let timeout = null;
        element.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                const result = field.validate(this.value);
                if (!result.isValid) {
                    errorElement.textContent = result.message || field.errorMsg;
                    errorElement.style.display = 'block';
                    this.classList.add('invalid');
                } else {
                    errorElement.style.display = 'none';
                    this.classList.remove('invalid');
                }
            }, 500);
        });
        
        // Validation lors de la perte de focus
        element.addEventListener('blur', function() {
            const result = field.validate(this.value);
            if (!result.isValid) {
                errorElement.textContent = result.message || field.errorMsg;
                errorElement.style.display = 'block';
                this.classList.add('invalid');
            } else {
                errorElement.style.display = 'none';
                this.classList.remove('invalid');
            }
        });
    });
}

/**
 * Valide l'ensemble du formulaire
 * @returns {boolean} True si le formulaire est valide, sinon False
 */
function validateForm() {
    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const naissance = document.getElementById('naissance').value;
    const email = document.getElementById('mail').value;
    const password = document.getElementById('mdp').value;
    
    let isValid = true;
    let errorMessages = [];
    
    // Validation du nom
    const nomResult = validateName(nom);
    if (!nomResult.isValid) {
        isValid = false;
        errorMessages.push('Nom: ' + nomResult.message);
    }
    
    // Validation du prénom
    const prenomResult = validateName(prenom);
    if (!prenomResult.isValid) {
        isValid = false;
        errorMessages.push('Prénom: ' + prenomResult.message);
    }
    
    // Validation de la date de naissance
    const naissanceResult = validateBirthdate(naissance);
    if (!naissanceResult.isValid) {
        isValid = false;
        errorMessages.push('Date de naissance: ' + naissanceResult.message);
    }
    
    // Validation de l'email
    const emailResult = validateEmail(email);
    if (!emailResult.isValid) {
        isValid = false;
        errorMessages.push('Email: ' + emailResult.message);
    }
    
    // Validation du mot de passe
    const passwordResult = validatePassword(password);
    if (!passwordResult.isValid) {
        isValid = false;
        errorMessages.push('Mot de passe: ' + passwordResult.message);
    }
    
    // Affichage des erreurs
    if (!isValid) {
        showErrorSummary(errorMessages);
    }
    
    return isValid;
}

/**
 * Affiche un résumé des erreurs en haut du formulaire
 * @param {Array} messages - Liste des messages d'erreur
 */
function showErrorSummary(messages) {
    // Suppression de l'ancien résumé d'erreur s'il existe
    const oldSummary = document.getElementById('error-summary');
    if (oldSummary) {
        oldSummary.remove();
    }
    
    // Création du résumé d'erreur
    const errorSummary = document.createElement('div');
    errorSummary.id = 'error-summary';
    errorSummary.className = 'error-summary';
    errorSummary.style.color = 'white';
    errorSummary.style.backgroundColor = 'rgba(255, 0, 0, 0.7)';
    errorSummary.style.padding = '10px';
    errorSummary.style.marginBottom = '20px';
    errorSummary.style.borderRadius = '5px';
    
    // Titre du résumé
    const title = document.createElement('h3');
    title.textContent = 'Veuillez corriger les erreurs suivantes:';
    errorSummary.appendChild(title);
    
    // Liste des erreurs
    const errorList = document.createElement('ul');
    messages.forEach(message => {
        const listItem = document.createElement('li');
        listItem.textContent = message;
        errorList.appendChild(listItem);
    });
    errorSummary.appendChild(errorList);
    
    // Ajout du résumé au début du formulaire
    const form = document.querySelector('form');
    form.insertBefore(errorSummary, form.firstChild);
    
    // Scroll vers le haut du formulaire pour voir les erreurs
    errorSummary.scrollIntoView({ behavior: 'smooth' });
}

/**
 * Valide un nom ou prénom
 * @param {string} value - Valeur à valider
 * @returns {Object} Résultat de la validation
 */
function validateName(value) {
    if (!value || value.trim() === '') {
        return { isValid: false, message: 'Ce champ est requis.' };
    }
    
    if (value.length > 50) {
        return { isValid: false, message: 'Ne doit pas dépasser 50 caractères.' };
    }
    
    // Vérification des caractères valides (lettres, espaces, tirets, apostrophes)
    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s\-']+$/;
    if (!regex.test(value)) {
        return { isValid: false, message: 'Ne doit contenir que des lettres, espaces, tirets ou apostrophes.' };
    }
    
    return { isValid: true };
}

/**
 * Valide une date de naissance
 * @param {string} value - Valeur à valider
 * @returns {Object} Résultat de la validation
 */
function validateBirthdate(value) {
    if (!value) {
        return { isValid: false, message: 'La date de naissance est requise.' };
    }
    
    const birthDate = new Date(value);
    const today = new Date();
    
    // Vérification que la date est valide
    if (isNaN(birthDate.getTime())) {
        return { isValid: false, message: 'La date de naissance est invalide.' };
    }
    
    // Vérification que la date n'est pas dans le futur
    if (birthDate > today) {
        return { isValid: false, message: 'La date de naissance ne peut pas être dans le futur.' };
    }
    
    // Vérification de l'âge minimum (18 ans)
    const ageDifMs = today - birthDate;
    const ageDate = new Date(ageDifMs);
    const age = Math.abs(ageDate.getUTCFullYear() - 1970);
    
    if (age < 18) {
        return { isValid: false, message: 'Vous devez avoir au moins 18 ans pour vous inscrire.' };
    }
    
    return { isValid: true };
}

/**
 * Valide une adresse email
 * @param {string} value - Valeur à valider
 * @returns {Object} Résultat de la validation
 */
function validateEmail(value) {
    if (!value) {
        return { isValid: false, message: 'L\'email est requis.' };
    }
    
    if (value.length > 100) {
        return { isValid: false, message: 'L\'email ne doit pas dépasser 100 caractères.' };
    }
    
    // Expression régulière pour valider un email
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!regex.test(value)) {
        return { isValid: false, message: 'Veuillez entrer une adresse email valide.' };
    }
    
    return { isValid: true };
}

/**
 * Valide un mot de passe
 
 */
function validatePassword(value) {
    if (!value) {
        return { isValid: false, message: 'Le mot de passe est requis.' };
    }
    
    if (value.length < 8) {
        return { isValid: false, message: 'Le mot de passe doit contenir au moins 8 caractères.' };
    }
    
    if (value.length > 50) {
        return { isValid: false, message: 'Le mot de passe ne doit pas dépasser 50 caractères.' };
    }
    
    // Vérification qu'il contient au moins une lettre et un chiffre
    const hasLetter = /[A-Za-z]/.test(value);
    const hasDigit = /\d/.test(value);
    
    if (!hasLetter || !hasDigit) {
        return { isValid: false, message: 'Le mot de passe doit contenir au moins une lettre et un chiffre.' };
    }
    
    return { isValid: true };
}
