<?php
session_start();
if (!isset($_SESSION['role'])){		
	header('Location: login.php');
	exit();
}
    
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
	    
        <div class="side">
            <button onclick="window.location.href='profil.php'">Mes infos</button>
            <button onclick="window.location.href='profilv2.php'">Mes réservations</button>
        </div>
	    
        <div class="profile-field">
            <label for="nom">Nom :</label>
            <span id="nom"><?php echo htmlspecialchars($_SESSION['nom']); ?></span>
            <button class="edit-btn" onclick="editField('nom')">Modifier</button>
        </div>

        <div class="profile-field">
            <label for="prenom">Prénom :</label>
            <span id="prenom"><?php echo htmlspecialchars($_SESSION['prenom']); ?></span>
            <button class="edit-btn" onclick="editField('prenom')">Modifier</button>
        </div>

        <div class="profile-field">
            <label for="email">Email:</label>
            <span id="email"><?php echo htmlspecialchars($_SESSION['mail']); ?></span>
            <button class="edit-btn" onclick="editField('email')">Modifier</button>
        </div>

        <div class="profile-field">
            <label class="required" for="naissance">Date de naissance:</label>
            <input type="date" id="naissance" name="naissance" 
                   value="<?php echo isset($_SESSION['naissance']) ? htmlspecialchars($_SESSION['naissance']) : ''; ?>" 
                   max="<?php echo date('Y-m-d'); ?>" required>
            <button class="edit-btn" onclick="editField('naissance')">Modifier</button>
        </div>
       
        <a href="logout.php" class="logout-btn">Déconnexion</a>
        
    </div>
</section>
<?php include("footer.php") ?>
</body>
</html>
