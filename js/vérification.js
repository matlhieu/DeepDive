document.addEventListener('DOMContentLoaded', function() {
    
    const form = document.querySelector('form');
    
   
    setupPasswordToggle();
    
    
    setupCharacterCounters();
    
    
    form.addEventListener('submit', function(event) {
       
        event.preventDefault();
        
        
        if (validateForm()) {
            
            form.submit();
        }
    });
    
   
    setupLiveValidation();
});


function setupPasswordToggle() {
    const passwordField = document.getElementById('mdp');
    const passwordContainer = passwordField.parentElement;
    
   
    const toggleIcon = document.createElement('span');
    toggleIcon.innerHTML = '👁️';
    toggleIcon.className = 'password-toggle';
    toggleIcon.style.cursor = 'pointer';
    toggleIcon.style.position = 'absolute';
    toggleIcon.style.right = '10px';
    toggleIcon.style.top = '50%';
    toggleIcon.style.transform = 'translateY(-50%)';
    
  
    passwordContainer.style.position = 'relative';
    
  
    passwordContainer.appendChild(toggleIcon);
    
   
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


function setupCharacterCounters() {
  
    const fieldsWithCounters = [
        { id: 'mail', maxLength: 100 },  
        { id: 'mdp', maxLength: 50 },   
        { id: 'nom', maxLength: 50 },   
        { id: 'prenom', maxLength: 50 }  
    ];
    
    fieldsWithCounters.forEach(field => {
        const inputElement = document.getElementById(field.id);
        const container = inputElement.parentElement;
        
       
        const counter = document.createElement('div');
        counter.className = 'character-counter';
        counter.textContent = `0/${field.maxLength}`;
        counter.style.fontSize = '0.8em';
        counter.style.textAlign = 'right';
        counter.style.marginTop = '5px';
        
       
        container.appendChild(counter);
        
        
        inputElement.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/${field.maxLength}`;
            
           
            if (length > field.maxLength) {
                counter.style.color = 'red';
            } else {
                counter.style.color = '';
            }
        });
        
        
        const initialLength = inputElement.value.length;
        counter.textContent = `${initialLength}/${field.maxLength}`;
    });
}


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
        
        
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        errorElement.style.color = 'red';
        errorElement.style.fontSize = '0.8em';
        errorElement.style.marginTop = '5px';
        errorElement.style.display = 'none';
        
       
        element.parentElement.appendChild(errorElement);
        
       
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


function validateForm() {
    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const naissance = document.getElementById('naissance').value;
    const email = document.getElementById('mail').value;
    const password = document.getElementById('mdp').value;
    
    let isValid = true;
    let errorMessages = [];
    
    
    const nomResult = validateName(nom);
    if (!nomResult.isValid) {
        isValid = false;
        errorMessages.push('Nom: ' + nomResult.message);
    }
    
    
    const prenomResult = validateName(prenom);
    if (!prenomResult.isValid) {
        isValid = false;
        errorMessages.push('Prénom: ' + prenomResult.message);
    }
    
    
    const naissanceResult = validateBirthdate(naissance);
    if (!naissanceResult.isValid) {
        isValid = false;
        errorMessages.push('Date de naissance: ' + naissanceResult.message);
    }
    
   
    const emailResult = validateEmail(email);
    if (!emailResult.isValid) {
        isValid = false;
        errorMessages.push('Email: ' + emailResult.message);
    }
    
   
    const passwordResult = validatePassword(password);
    if (!passwordResult.isValid) {
        isValid = false;
        errorMessages.push('Mot de passe: ' + passwordResult.message);
    }
    
   
    if (!isValid) {
        showErrorSummary(errorMessages);
    }
    
    return isValid;
}


function showErrorSummary(messages) {
   
    const oldSummary = document.getElementById('error-summary');
    if (oldSummary) {
        oldSummary.remove();
    }
    
    
    const errorSummary = document.createElement('div');
    errorSummary.id = 'error-summary';
    errorSummary.className = 'error-summary';
    errorSummary.style.color = 'white';
    errorSummary.style.backgroundColor = 'rgba(255, 0, 0, 0.7)';
    errorSummary.style.padding = '10px';
    errorSummary.style.marginBottom = '20px';
    errorSummary.style.borderRadius = '5px';
    
   
    const title = document.createElement('h3');
    title.textContent = 'Veuillez corriger les erreurs suivantes:';
    errorSummary.appendChild(title);
    
   
    const errorList = document.createElement('ul');
    messages.forEach(message => {
        const listItem = document.createElement('li');
        listItem.textContent = message;
        errorList.appendChild(listItem);
    });
    errorSummary.appendChild(errorList);
    
   
    const form = document.querySelector('form');
    form.insertBefore(errorSummary, form.firstChild);
    
   
    errorSummary.scrollIntoView({ behavior: 'smooth' });
}


function validateName(value) {
    if (!value || value.trim() === '') {
        return { isValid: false, message: 'Ce champ est requis.' };
    }
    
    if (value.length > 50) {
        return { isValid: false, message: 'Ne doit pas dépasser 50 caractères.' };
    }
    
   
    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s\-']+$/;
    if (!regex.test(value)) {
        return { isValid: false, message: 'Ne doit contenir que des lettres, espaces, tirets ou apostrophes.' };
    }
    
    return { isValid: true };
}


function validateBirthdate(value) {
    if (!value) {
        return { isValid: false, message: 'La date de naissance est requise.' };
    }
    
    const birthDate = new Date(value);
    const today = new Date();
    
   
    if (isNaN(birthDate.getTime())) {
        return { isValid: false, message: 'La date de naissance est invalide.' };
    }
    
    
    if (birthDate > today) {
        return { isValid: false, message: 'La date de naissance ne peut pas être dans le futur.' };
    }
    
   
    const ageDifMs = today - birthDate;
    const ageDate = new Date(ageDifMs);
    const age = Math.abs(ageDate.getUTCFullYear() - 1970);
    
    if (age < 18) {
        return { isValid: false, message: 'Vous devez avoir au moins 18 ans pour vous inscrire.' };
    }
    
    return { isValid: true };
}


function validateEmail(value) {
    if (!value) {
        return { isValid: false, message: 'L\'email est requis.' };
    }
    
    if (value.length > 100) {
        return { isValid: false, message: 'L\'email ne doit pas dépasser 100 caractères.' };
    }
    
   
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!regex.test(value)) {
        return { isValid: false, message: 'Veuillez entrer une adresse email valide.' };
    }
    
    return { isValid: true };
}


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
    
    
    const hasLetter = /[A-Za-z]/.test(value);
    const hasDigit = /\d/.test(value);
    
    if (!hasLetter || !hasDigit) {
        return { isValid: false, message: 'Le mot de passe doit contenir au moins une lettre et un chiffre.' };
    }
    
    return { isValid: true };
}
