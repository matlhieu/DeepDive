
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
			<a href="profil.php">
			<svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="100%" fill="currentColor" d="M400-485q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM80-164v-94q0-35 17.5-63t50.5-43q72-32 133.5-46T400-424h23q-6 14-9 27.5t-5 32.5h-9q-58 0-113.5 12.5T172-310q-16 8-24 22.5t-8 29.5v34h269q5 18 12 32.5t17 27.5H80Zm587 44-10-66q-17-5-34.5-14.5T593-222l-55 12-25-42 47-44q-2-9-2-25t2-25l-47-44 25-42 55 12q12-12 29.5-21.5T657-456l10-66h54l10 66q17 5 34.5 14.5T795-420l55-12 25 42-47 44q2 9 2 25t-2 25l47 44-25 42-55-12q-12 12-29.5 21.5T731-186l-10 66h-54Zm27-121q36 0 58-22t22-58q0-36-22-58t-58-22q-36 0-58 22t-22 58q0 36 22 58t58 22ZM400-545q39 0 64.5-25.5T490-635q0-39-25.5-64.5T400-725q-39 0-64.5 25.5T310-635q0 39 25.5 64.5T400-545Zm0-90Zm9 411Z" transform="translate(-8 -8)"></svg>
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
