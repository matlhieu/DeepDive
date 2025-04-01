<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   $name = $_POST['name'] ?? '';
   $firstname = $_POST['firstname'] ?? '';
   $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL); 
   $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT); 
   $datedenaissance = $_POST['datedenaissance'] ?? ''; 





   function valid($date) {
       
       $pattern = '/^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/\d{4}$/';

       
       if (preg_match($pattern, $date)) {
          
           list($month, $day, $year) = explode('/', $date);

         
           return checkdate($month, $day, $year); 
       }
       
       return false;
   }

	    if (!valid($datedenaissance)) {
        echo "La date de naissance n'est pas valide.";
    } else {
        echo "La date de naissance est valide.";
    }
}

 



   
   if (empty($name) || empty($firstname) || empty($email) || empty($password) || empty($datedenaissance)) {
       die("Veuillez remplir tous les champs."); 
   }


   
   $userData = [
       'name' => $name,
       'firstname' => $firstname,
       'email' => $email,
       'password' => $password,
       'datedenaissance' => $datedenaissance,
   ];


   
   $file = 'utilisateurs.json';


  
   $utilisateurs = json_decode(file_get_contents($file), true) ?? []; 
   $utilisateurs[] = $userData; // Correction de la variable $usersData en $userData


   
   file_put_contents($file, json_encode($utilisateurs, JSON_PRETTY_PRINT)); // Ajout de JSON_PRETTY_PRINT pour une meilleure lisibilité


   echo "Inscription réussie !";
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
<header>
	<?php include("navbar.php") ?>
</header>
<body>
  
   <section class="inscription">
       <div class="overlay">
           <h1>Devenez un DeepDiver</h1>
           <form action="signup.php" method="POST" autocomplete="off">
               <div class="form-group">
                   <label class="required" for="nom">Nom de famille:</label>
                   <input type="text" id="nom" name="nom" required value="<?php echo isset($nom) ? $nom : ''; ?>">
               </div>


               <div class="form-group">
                   <label class="required" for="prenom">Prénom:</label>
                   <input type="text" id="prenom" name="prenom" required value="<?php echo isset($prenom) ? $prenom : ''; ?>">
               </div>


               <div class="form-group">
                   <label class="required" for="naissance">Date de naissance (format MM/DD/YYYY):</label>
                   <input type="date" id="naissance" name="naissance" required value="<?php echo isset($naissance) ? $naissance : ''; ?>">
               </div>


               <div class="form-group">
                   <label class="required" for="email">Email:</label>
                   <input type="email" id="mail" name="mail" required value="<?php echo isset($mail) ? $mail : ''; ?>">
               </div>


               <div class="form-group">
                   <label class="required" for="password">Mot de passe:</label>
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
