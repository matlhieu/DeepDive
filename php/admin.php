<?php
session_start();

if ($_SESSION['role'] !== 'Admin'){		
	header('Location: login.php');
	exit();
}
// Chargement des utilisateurs
$users = json_decode(file_get_contents("../json/utilisateurs.json"), true);

// Pagination
$usersPerPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $usersPerPage;

$allUsers = array_values($users); // conversion en tableau indexé
$paginatedUsers = array_slice($allUsers, $offset, $usersPerPage);

$totalUsers = count($allUsers);
$totalPages = ceil($totalUsers / $usersPerPage);
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title>administrateur - DeepDive</title>
	<link rel="stylesheet" href="../style/nav_footer.css">
	<link rel="stylesheet" href="../style/login.css">
	<link rel="stylesheet" href="../style/admin.css">
</head>
<header>
	<?php include("navbar.php") ?>
</header>
	
<body>
 <section class="connexion">
	<div class="overlayAdmin">
    	<h1>Zone administrateur</h1>
    

				<div class="container">


<table>
		<thead>
				<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>Rôle</th>
						<th>VIP</th>
						<th>Ban</th>
				</tr>
		</thead>
		<tbody>
				<?php foreach ($paginatedUsers as $user): ?>
						<tr>
						
								<td><?= $user['nom'] ?></td>
								<td><?= $user['prenom'] ?></td>
								<td><?= $user['mail']  ?></td>
								<td><?= $user['role'] ?></td>
								<td><button type="submit" name="action" value="vip" class="btn btn-vip" >VIP</button>
                <td><button type="submit" name="action" value="ban"class="btn btn-ban">Bannir</button></td>

						</tr>
				<?php endforeach; ?>
		</tbody>
</table>

<!-- Pagination -->
<div class="pagination">
		<?php for ($i = 1; $i <= $totalPages; $i++): ?>

				<a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
	
		<?php endfor; ?>
</div>
		
		

</body>
</html>


