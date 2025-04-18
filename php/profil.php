<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
	<link rel="stylesheet" href="../style/nav_footer.css">
	<link rel="stylesheet" href="../style/profil.css">
</head>
<header>
	<?php include("navbar.php") ?>
</header>
	
<body>
   <section class="profil">
	  <div class="box-container">
        <h1>Vos Informations</h1>
        
       
       
        <div class="profile-field">
            <label for="name">Nom :</label>
        
            <span id="name">Marc-Antoine ABALE </span>
            <button class="edit-btn" onclick="editField('name')">Modifier</button>
        </div>

        
        <div class="profile-field">
            <label for="email">Email:</label>
            <span id="email">ma.abale10@gmail.com</span>
            <button class="edit-btn" onclick="editField('email')">Modifier</button>
        </div>

        
        <div class="profile-field">
            <label for="phone">Téléphone:</label>
            <span id="phone">+33 7 88 99 77 87</span>
            <button class="edit-btn" onclick="editField('phone')">Modifier</button>
        </div>

        
        <div class="profile-field">
            <label for="address">Adresse:</label>
            <span id="address">10 rue des majorberts, 95000 Cergy</span>
            <button class="edit-btn" onclick="editField('address')">Modifier</button>
        </div>
        
        <div class="profile-field">
            	<label class="required" for="ville">Ville:</label>
            	<span id="address">Cergy</span>
            	<button class="edit-btn" onclick="editField('address')">Modifier</button>
        	</div>
        	
        	
        <div class="profile-field">
        	<label class="required" for="code_postal">Code Postal:</label>
        	<span id="address">95000</span>
        	<button class="edit-btn" onclick="editField('address')">Modifier</button>
        </div>
        
        <div class="profile-field">
		<label class="required" for="naissance">Date de naissance:</label>
            	<input type="date" id="naissance" name="naissance" value="2005-11-04" max="2025-02-16" required>
		<button class="edit-btn" onclick="editField('address')">Modifier</button>
            
          </div>
          <div class="profile-field">
		<a href=logout.php>Déconnexion</a>            
          </div>
      </div>
</section>
<?php include("footer.php") ?>
    
</body>
</html>










