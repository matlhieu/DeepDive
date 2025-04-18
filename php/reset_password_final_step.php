<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title>Création nouveau mot de passe - DeepDive</title>
	<link rel="stylesheet" href="../style/nav_footer.css">
	<link rel="stylesheet" href="../style/login.css">
</head>
<header>
	<?php include("navbar.php") ?>
</header>
<body>
  <section class="connexion">
	<div class="overlay">
    	<h1>Création d'un nouveau mot de passe</h1>
    
    	<form action="#" method="POST" autocomplete="off">

        	<div class="form-group">
            	<label class="required" for="password">Nouveau mot de passe:</label>
            	<input type="password" id="new_password" name="new_password" required minlength="8" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" title="Le mot de passe doit contenir au moins 8 caractères, incluant au moins une lettre et un chiffre.">
        	</div>

        	<div class="form-group">
            	<label class="required" for="password">Confirmer le nouveau mot de passe:</label>
            	<input type="password" id="confirme_password" name="confirm_password" required minlength="8" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" title="Le nouveau mot de passe doit être pareil que ce vous venez d'écrire juste en haut.">
        	</div>

 	 
        	<input type="submit" value="Réinitialiser le mot de passe">
   	 
 
	</div>

 </section>

<?php include("footer.php") ?>
	
</body>
</html>
