document.addEventListener('DOMContentLoaded', function() {
   
    const form = document.querySelector('form');
    
    // Ajout de l'icône œil pour le champ mot de passe
    setupPasswordToggle();
    
    // Ajout des compteurs de caractères
    setupCharacterCounters();
    
    // Écouteur d'événement pour la soumission du formulaire
    form.addEventListener('submit', function(event) {
        // Empêcher l'envoi du formulaire par défaut
        event.preventDefault();
        
        // Validation du formulaire
        if (validateForm()) {
            // Si le formulaire est valide, on le soumet
            this.submit();
        }
    });
    
    // Écouteurs d'événements pour la validation en temps réel
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
    toggleIcon.title = 'Afficher/Masquer le mot de passe';
    
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
        { id: 'mail', maxLength: 100 },  // Limite pour l'email
        { id: 'mdp', maxLength: 50 }     // Limite pour le mot de passe
    ];
    
    fieldsWithCounters.forEach(field => {
        const inputElement = document.getElementById(field.id);
        const container = inputElement.parentElement;
        
        // Création du compteur
        const counter = document.createElement('div');
        counter.className = 'character-counter';
        counter.textContent = `0/${field.maxLength}`;
        
        // Ajout du compteur après l'input
        container.appendChild(counter);
        
        // Mise à jour du compteur lors de la saisie
        inputElement.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/${field.maxLength}`;
            
            // Mise en évidence si le nombre de caractères est trop élevé
            if (length > field.maxLength) {
                counter.style.color = 'red';
                inputElement.classList.add('too-long');
            } else {
                counter.style.color = '';
                inputElement.classList.remove('too-long');
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
        { 
            id: 'mail', 
            validate: validateEmail, 
            errorMsg: 'Veuillez entrer une adresse email valide.' 
        },
        { 
            id: 'mdp', 
            validate: validatePassword, 
            errorMsg: 'Le mot de passe doit contenir au moins 8 caractères avec au moins une lettre et un chiffre.' 
        }
    ];
    
    fields.forEach(field => {
        const element = document.getElementById(field.id);
        
        // Création d'un élément pour afficher l'erreur
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
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
    const email = document.getElementById('mail').value;
    const password = document.getElementById('mdp').value;
    
    let isValid = true;
    let errorMessages = [];
    
    // Validation de l'email
    const emailResult = validateEmail(email);
    if (!emailResult.isValid) {
        isValid = false;
        errorMessages.push(emailResult.message);
    }
    
    // Validation du mot de passe
    const passwordResult = validatePassword(password);
    if (!passwordResult.isValid) {
        isValid = false;
        errorMessages.push(passwordResult.message);
    }
    
    // Vérification des limites de caractères
    if (email.length > 100) {
        isValid = false;
        errorMessages.push('L\'email ne doit pas dépasser 100 caractères.');
    }
    
    if (password.length > 50) {
        isValid = false;
        errorMessages.push('Le mot de passe ne doit pas dépasser 50 caractères.');
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
