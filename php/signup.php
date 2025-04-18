<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   
   $name = $_POST['nom'] ?? '';
   $firstname = $_POST['prenom'] ?? '';
   $email = filter_var($_POST['mail'] ?? '', FILTER_VALIDATE_EMAIL); 
   $password = password_hash($_POST['mdp'] ?? '', PASSWORD_BCRYPT); 
   $datedenaissance = $_POST['naissance'] ?? ''; 
   
  
   function validateDate($date) {
       if (empty($date)) {
           return false;
       }
       
       $d = DateTime::createFromFormat('Y-m-d', $date);
       return $d && $d->format('Y-m-d') === $date;
   }

   
   if (empty($name) || empty($firstname) || empty($email) || empty($password) || empty($datedenaissance)) {
       die("Veuillez remplir tous les champs."); 
   }
   
   
   if (!validateDate($datedenaissance)) {
       die("La date de naissance n'est pas valide.");
   }
   
   
   $userData = [
       'name' => $name,
       'firstname' => $firstname,
       'email' => $email,
       'password' => $password,
       'datedenaissance' => $datedenaissance,
   ];
   
   $file = 'utilisateurs.json';
   
  
   if (file_exists($file)) {
       $utilisateurs = json_decode(file_get_contents($file), true) ?? [];
   } else {
       $utilisateurs = [];
   }
   
   
   foreach ($utilisateurs as $utilisateur) {
       if ($utilisateur['email'] === $email) {
           die("Cette adresse email est déjà utilisée.");
       }
   }
   
  
   $utilisateurs[] = $userData;
   
   
   file_put_contents($file, json_encode($utilisateurs, JSON_PRETTY_PRINT));
   
   
   $_SESSION['message'] = "Inscription réussie !";
  
   echo "Inscription réussie !";
   exit;
}
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
   <meta charset="UTF-8">
   <title>Inscription - DeepDive</title>
   <link rel="stylesheet" href="../style/nav_footer.css">
   <link rel="stylesheet" href="../style/signup.css">
</head>
<body>
<header>
<?php include("navbar.php") ?>
</header>
  <section class="inscription">
       <div class="overlay">
           <h1>Devenez un DeepDiver</h1>
           <?php if(isset($_SESSION['message'])): ?>
           <div class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
           <?php endif; ?>
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
               <div class="form-group">
                   <label class="required" for="nom">Nom de famille:</label>
                   <input type="text" id="nom" name="nom" required value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>">
               </div>
               <div class="form-group">
                   <label class="required" for="prenom">Prénom:</label>
                   <input type="text" id="prenom" name="prenom" required value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>">
               </div>
               <div class="form-group">
                   <label class="required" for="naissance">Date de naissance:</label>
                   <input type="date" id="naissance" name="naissance" required value="<?php echo isset($_POST['naissance']) ? htmlspecialchars($_POST['naissance']) : ''; ?>">
               </div>
               <div class="form-group">
                   <label class="required" for="mail">Email:</label>
                   <input type="email" id="mail" name="mail" required value="<?php echo isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : ''; ?>">
               </div>
               <div class="form-group">
                   <label class="required" for="mdp">Mot de passe:</label>
                   <input type="password" id="mdp" name="mdp" required minlength="8" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" title="Le mot de passe doit contenir au moins 8 caractères, incluant au moins une lettre et un chiffre.">
               </div>
               <input type="submit" value="Créer mon compte">
           </form>
          
           <div class="login-link">
               <p>Vous avez déjà un compte ? <a href="login.php">Connectez-vous ici</a></p>
           </div>
       </div>
   </section>
   <?php include("footer.php") ?>
</body>
</html>
