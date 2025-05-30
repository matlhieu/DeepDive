
<nav class="navibar">
	
	  <div class="logo-container">
		<div class="logo"> 
			<a href="index.php">
			<img src="../style/Image/logo4.png" alt="logo"></a>
		</div>
			<p class="nav-titre">Deep<span>Dive</span></p>
	  </div>
	  
		<div class="menu">
			<ul class="navi-liens">
			<?php
			if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'){
				
				echo '<li><a href="admin.php" class="navi-lien">ADMIN</a></li>';
			}
			?>
            <li><a href="index.php" class="navi-lien">ACCUEIL</a></li>
			<li><a href="destinations.php" class="navi-lien">DESTINATIONS</a></li>
            <li><a href="recherchev1.php" class="navi-lien">RECHERCHE</a></li>
            <li><a href="about.php" class="navi-lien">QUI SOMMES NOUS ?</a></li>          
			</ul>
			<div class="right">

			<button id="light-mode-toggle" class="light-mode-toggle">
  				<svg width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 496"><path fill="currentColor" d="M8,256C8,393,119,504,256,504S504,393,504,256,393,8,256,8,8,119,8,256ZM256,440V72a184,184,0,0,1,0,368Z" transform="translate(-8 -8)"/></svg>
			</button>
			
			<?php 
			if(isset($_SESSION['prenom'])){
			?>
			<a class="btn-account" href="mon_panier.php">
			<svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="currentColor"><path d="M286.79-81Q257-81 236-102.21t-21-51Q215-183 236.21-204t51-21Q317-225 338-203.79t21 51Q359-123 337.79-102t-51 21Zm400 0Q657-81 636-102.21t-21-51Q615-183 636.21-204t51-21Q717-225 738-203.79t21 51Q759-123 737.79-102t-51 21ZM235-741l110 228h288l125-228H235Zm-30-60h589.07q22.97 0 34.95 21 11.98 21-.02 42L694-495q-11 19-28.56 30.5T627-453H324l-56 104h491v60H277q-42 0-60.5-28t.5-63l64-118-152-322H51v-60h117l37 79Zm140 288h288-288Z"/></svg>
			</a>
			<a class="btn-account" href="profil.php">
			<svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="currentColor"><path d="M216-259q64-45 128.05-68.5 64.04-23.5 136-23.5Q552-351 616-327.5 680-304 746-259q43-56 60-109t17-112q0-146-98.5-244.5T480-823q-146 0-244.5 98.5T137-480q0 59 17.5 112T216-259Zm263.85-179Q417-438 374-481.15q-43-43.14-43-106Q331-650 374.15-693q43.14-43 106-43Q543-736 586-692.85q43 43.14 43 106Q629-524 585.85-481q-43.14 43-106 43Zm.62 374Q395-64 319.46-96.76q-75.53-32.77-132.5-90Q130-244 97-319.27q-33-75.26-33-161.5Q64-565 97.21-640.41q33.21-75.42 89.97-132.74 56.75-57.32 132.05-90.09Q394.53-896 480.77-896q84.23 0 159.64 33.21 75.42 33.21 132.5 90Q830-716 863-640.55q33 75.45 33 160.08 0 85.47-32.76 161.01-32.77 75.53-90.09 132.28-57.32 56.76-132.69 89.97Q565.1-64 480.47-64Zm-.47-73q53 0 104.5-15T688-207q-51.59-34.97-104.29-52.98Q531-278 480-278q-51 0-103.5 18T273-206.7q51 39.31 102.5 54.5Q427-137 480-137Zm0-374q33 0 54.5-21.5T556-587q0-33-21.5-54.5T480-663q-33 0-54.5 21.5T404-587q0 33 21.5 54.5T480-511Zm0-76Zm0 379Z"/></svg>
			</a>

			<?php
			}else{
			?>
			
			<a class="button-login" href="login.php">CONNECTEZ-VOUS</a>
			<?php 
			}
			?>
			</div>
		</div>

		<script src="../js/lightmode.js"></script>
	</nav>
