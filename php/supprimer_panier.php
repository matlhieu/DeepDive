<?php
session_start();
date_default_timezone_set('Europe/Paris');
$index = isset($_GET['index']) ? (int) $_GET['index'] : -1;

if (isset($_SESSION['panier'][$index])) {
    unset($_SESSION['panier'][$index]);
    $_SESSION['panier'] = array_values($_SESSION['panier']); 
}

header("Location: mon_panier.php");
exit();
