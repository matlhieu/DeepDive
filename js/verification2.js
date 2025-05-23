document.addEventListener('DOMContentLoaded', function() {
   
    const form = document.querySelector('form');
    
   
    setupPasswordToggle();
    
   
    setupCharacterCounters();
    
   
    form.addEventListener('submit', function(event) {
       
        event.preventDefault();
        
       
        if (validateForm()) {
           
            this.submit();
        }
    });
    
   
    setupLiveValidation();
});

/**
 * Ajoute la fonctionnalité d'affichage et masquage du mot de passe
 */
function setupPasswordToggle() {
    const passwordField = document.getElementById('mdp');
    const passwordContainer = passwordField.parentElement;
    
   
    const toggleIcon = document.createElement('span');
    toggleIcon.innerHTML = '👁️';
    toggleIcon.className = 'password-toggle';
    toggleIcon.title = 'Afficher/Masquer le mot de passe';
    
   
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
        { id: 'mdp', maxLength: 50 }     
    ];
    
    fieldsWithCounters.forEach(field => {
        const inputElement = document.getElementById(field.id);
        const container = inputElement.parentElement;
        
       
        const counter = document.createElement('div');
        counter.className = 'character-counter';
        counter.textContent = `0/${field.maxLength}`;
        
       
        container.appendChild(counter);
        
       
        inputElement.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/${field.maxLength}`;
            
           
            if (length > field.maxLength) {
                counter.style.color = 'red';
                inputElement.classList.add('too-long');
            } else {
                counter.style.color = '';
                inputElement.classList.remove('too-long');
            }
        });
        
       
        const initialLength = inputElement.value.length;
        counter.textContent = `${initialLength}/${field.maxLength}`;
    });
}


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
        
       
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
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

/**
 * Valide l'ensemble du formulaire

 */
function validateForm() {
    const email = document.getElementById('mail').value;
    const password = document.getElementById('mdp').value;
    
    let isValid = true;
    let errorMessages = [];
    
   
    const emailResult = validateEmail(email);
    if (!emailResult.isValid) {
        isValid = false;
        errorMessages.push(emailResult.message);
    }
    
    
    const passwordResult = validatePassword(password);
    if (!passwordResult.isValid) {
        isValid = false;
        errorMessages.push(passwordResult.message);
    }
    
   
    if (email.length > 100) {
        isValid = false;
        errorMessages.push('L\'email ne doit pas dépasser 100 caractères.');
    }
    
    if (password.length > 50) {
        isValid = false;
        errorMessages.push('Le mot de passe ne doit pas dépasser 50 caractères.');
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

/**
 * Valide une adresse email
 
 */
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
    
    
    const hasLetter = /[A-Za-z]/.test(value);
    const hasDigit = /\d/.test(value);
    
    if (!hasLetter || !hasDigit) {
        return { isValid: false, message: 'Le mot de passe doit contenir au moins une lettre et un chiffre.' };
    }
    
    return { isValid: true };
}
