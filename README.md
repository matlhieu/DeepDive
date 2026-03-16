### DeepDive: Full-Stack Data Persistence Platform 🌊

[English Version](#english-version) | [Version Française](#version-française)

---

<a name="english-version"></a>
#DeepDive: Full-Stack Data Persistence Platform 🌊

DeepDive is a secure web application designed for managing diving expeditions and reservations. The platform provides a multi-tier environment where users can browse destinations, calculate real-time pricing, and manage their orders through a custom data persistence layer.

### How to install and run the project

Ensure you have a local web server environment like XAMPP, WAMP or MAMP installed.

### Optional Step

Ensure the PHP development environment is correctly added to your system path: 'apt install php' or similar commands for your distribution:

### Step 1 Server Configuration

Copy all project files into the root directory of your local server, typically the htdocs or www folder.

### Step 2 Data Persistence Setup

Check that the JSON files located in the json directory have the correct read and write permissions to allow the PHP engine to update user data and orders.

### Step 3 Application Launch

Start your local server modules and navigate to the project URL in your browser at localhost/DeepDive/index.php.

### Technical Architecture

The platform is built on a modular architecture focusing on two key areas.

1 Data Management: The system uses a structured JSON persistence layer to store user profiles and transaction history. Security is enforced through BCRYPT password hashing and server-side session validation.
2 Dynamic Frontend: JavaScript engines handle real-time price computations and asynchronous profile updates to ensure a seamless user experience.

### Technical Stack

Programming Languages: PHP, JavaScript, HTML, CSS.
Data Format: JSON.
Security Features: Session management, BCRYPT encryption, Client-side and server-side form validation.

## Collaborators
<a href="https://github.com/Sparthuus/DeepDive/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Sparthuus/DeepDive" alt="Contributors" />
</a>

### Authors

Lucien Boyer
Mathieu Nguyen
Marc-Antoine Abale
Ayman Ghomari

---

<a name="version-française"></a>
# DeepDive 🌊

DeepDive est une plateforme web complète dédiée à la gestion de réservations de plongée sous-marine. Elle propose une interface utilisateur dynamique permettant de rechercher des destinations, de calculer des tarifs en temps réel et de gérer un cycle de commande complet.

### Comment faire pour que le programme s'exécute

Assurez-vous de posséder un environnement de serveur local comme XAMPP, WAMP ou MAMP.

### Etape Facultative

Vérifiez que votre environnement PHP est bien configuré sur votre machine: 'apt install php' ou une commande équivalente selon votre système:

### Etape 1 Configuration du serveur

Copiez l'intégralité des dossiers et fichiers du projet dans le répertoire racine de votre serveur local, généralement le dossier htdocs ou www.

### Etape 2 Initialisation des données

Vérifiez que les fichiers JSON présents dans le dossier json possèdent les droits de lecture et d'écriture pour permettre au moteur PHP de sauvegarder les nouveaux utilisateurs et les commandes.

### Etape 3 Lancement de l'application

Démarrez les modules Apache de votre serveur local puis accédez à l'adresse du projet via votre navigateur à l'url localhost/DeepDive/index.php.

### Comment ça fonctionne

Le projet repose sur une structure modulaire séparant la logique métier de la présentation.

1 Gestion des données: L'application utilise des fichiers JSON pour la persistance des informations. Les mots de passe sont sécurisés via un hachage BCRYPT et les accès sont contrôlés par un système de sessions robuste.
2 Interface dynamique: Des scripts JavaScript gèrent le calcul des prix selon les options choisies et permettent la modification du profil utilisateur sans rechargement de page.

### Ce que l'on a utilisé

Langages : PHP, JavaScript, HTML, CSS.
Stockage des données : JSON.
Outils : Sessions PHP, Hachage sécurisé, Validation de formulaires dynamique.

## Collaborateurs
<a href="https://github.com/Sparthuus/DeepDive/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Sparthuus/DeepDive" alt="Contributors" />
</a>

### Auteurs

Lucien Boyer
Mathieu Nguyen
Marc-Antoine Abale
Ayman Ghomari
