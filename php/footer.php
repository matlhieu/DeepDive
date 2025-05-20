<footer>
 <div class="footer-main">
	 <img src="../style/Image/logo4.png" alt="logo">
		<div class="footer-container">
			<h3>Liens Utiles</h3>
            <?php 
              if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'){
                 echo'<p><a href="admin.php">Admin</a></p>';
              }
               ?>
			  <p><a href="../index.php">Accueil</a></p>
			  <p><a href="destinations.php">Destinations</a></p>
			  <p><a href="recherchev1.php">Recherche</a></p>
			  <?php 
			  if(isset($_SESSION['prenom'])){
			  ?>
			  <p><a href="profil.php">Profile</a></p>
			  <?php
			  }else{
			  ?>
			  <p><a href="signup.php">Inscription</a></p>
			  <p><a href="login.php">Connexion</a></p>
			  <?php
			  }
			  ?>
		</div>
	
		<div class="footer-container">
			<h3>Nous contacter</h3>
			<p><a href="about.php">En savoir plus sur nous</a><p>
			<p>Téléphone : +33 6 45 15 25</p>
			<p>Adresse : 75421, Varay, 22 Place d'Elden</p>
			<p>deepdive05@gmail.com</p>
		</div>
	</div>
	<p> © 2025 DeepDive | All rights reserved </p>
</footer>
