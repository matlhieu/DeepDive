<?php
session_start();
header('Content-type: ../json/utilisateurs.json');

if (!isset($_SESSION['mail'])) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté']);
    exit;
}

$donnees = json_decode(file_get_contents('php://input'), true);
if (!$donnees) {
    echo json_encode(['success' => false, 'message' => 'Aucune donnée reçue']);
    exit;
}

$jsonPath = "../json/utilisateurs.json"; // adapte si besoin
$json = json_decode(file_get_contents($jsonPath), true);
$mail = $_SESSION['mail'];

if (!isset($json[$mail])) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé']);
    exit;
}

// Mise à jour des champs modifiés
foreach ($donnees as $cle => $valeur) {
    if (isset($json[$mail][$cle])) {
        $json[$mail][$cle] = $valeur;
        $_SESSION[$cle] = $valeur; // mise à jour session
    }
}

// Sauvegarde
file_put_contents($jsonPath, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo json_encode(['success' => true]);
