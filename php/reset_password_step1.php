<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title>1ère étape de la création d'un nouveau mot de passe - DeepDive</title>
	<link rel="stylesheet" href="../style/nav_footer.css">
	<link rel="stylesheet" href="../style/login.css">
</head>
<header>
	<?php include("navbar.php") ?>
</header>
	
<body>
	
 <section class="connexion">
	<div class="overlay">
    	<h1>1ère étape pour créer un nouveau mot de passe</h1>
    
    	<form action="#" method="POST" autocomplete="off">

        	<div class="form-group">
            	<label class="required" for="email">Email:</label>
            	<input type="email" id="email" name="email" required>
        	</div>

        	<div class="form-group">
            	<label class="required" for="telephone">Numéro de téléphone:</label>
            	<input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" required title="Veuillez entrer un numéro de téléphone valide (10 chiffres).">
        	</div>

 	 
        	<input type="submit" value="Suivant">
    	</form>
	
   	 
 
	</div>

 </section>

<?php include("footer.php) ?>
	
</body>
</html>
