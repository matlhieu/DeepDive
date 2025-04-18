<?php

session_start();

$file = 'utilisateurs.json';
$users = json_decode(file_get_contents($file), true);
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];


    if (isset($users[$mail])) {
		
        if (password_verify($mdp, $users[$mail]['mdp'])) {
            
            $_SESSION["nom"] = $users[$mail]["nom"];
            $_SESSION["prenom"] = $users[$mail]["prenom"];
	    $_SESSION['mail'] = $mail;
            $_SESSION["naissance"] = $users[$mail]["naissance"];
            $_SESSION["tel"] = $users[$mail]["tel"];
            $_SESSION["role"] = $users[$mail]["role"];

            if ($users[$mail]['role'] === 'Admin') {
                header('Location: admin.php');
            } else {
                header('Location: profil.php');
            }
            exit();
        } else {
            $error = "Mauvais mail ou mot de passe";
        }
    } else {
        $error = "Pas de compte enregistrer avec ce mail";
    }
}


?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title>Connexion - DeepDive</title>
	<link rel="stylesheet" href="../style/nav_footer.css">
	<link rel="stylesheet" href="../style/login.css">
</head>

<header>
	<?php include("navbar.php") ?>
</header>
	
<body>
 <section class="connexion">
	<div class="overlay">
    	<h1>Connectez-vous à votre compte DeepDive</h1>
    
    	<form action="" method="POST" autocomplete="off">

        <div class="form-group">
            	<label class="required" for="mail">mail:</label>
            	<input type="email" id="mail" name="mail" required>
        	</div>

        	<div class="form-group">
            	<label class="required" for="mdp">Mot de passe:</label>
            	<input type="password" id="mdp" name="mdp" required minlength="6" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" title="Le mot de passe doit contenir au moins 6 caractères, incluant au moins une lettre et un chiffre.">
        	</div>
 	 
        	<input type="submit" value="Se connecter">
    	</form>

		<?php if (!empty($error)) : ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
		
	<div class="login-link">
        	<p>Mot de passe oublié ? <a href="reset_mdp_step1.php">Cliquez ici</a></p>
    	</div>

    	<div class="login-link">
        	<p>Pas encore membre ? <a href="signup.php">Inscrivez-vous ici</a></p>
    	</div>
   	 
 
	</div>

 </section>

<?php include("footer.php") ?>
	
</body>
</html>


