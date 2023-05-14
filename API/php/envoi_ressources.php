<?php

include 'pdo.php';

session_start();

// Récupère l'id de l'utilisateur
$email = $_SESSION['email'];
$sql = "SELECT id FROM utilisateurs WHERE email='$email'";
$result = $db->query($sql);
$user = $result->fetch(PDO::FETCH_ASSOC);
$idUser = $user['id'];

// Récupère l'id de l'univers
$univers_nom = $_SESSION['univers'];
$sql = "SELECT id FROM univers WHERE nom='$univers_nom'";
$result = $db->query($sql);
$univers = $result->fetch(PDO::FETCH_ASSOC);
$idUnivers = $univers['id'];

// Regarde s'il y a déjà une ligne correspondant à l'utilisateur sur l'univers choisi
$sql = "SELECT * FROM ressources WHERE idUtilisateurs=$idUser AND idUnivers=$idUnivers";
$result = $db->query($sql);
$ressources = $result->fetch(PDO::FETCH_ASSOC);

// Récupère les ressources depuis la session
$metal = $_SESSION['metal'];
$energie = $_SESSION['energie'];
$deuterium = $_SESSION['deuterium'];

// Si les ressources ne sont pas déjà enregistrer sur la base de données
if (!$ressources) {
    $stmt = $db->prepare("INSERT INTO ressources (idUtilisateurs, idUnivers, metal, deuterium, energie) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$idUser, $idUnivers, $metal, $deuterium, $energie]);
}

// Met à jour les données déjà enregistrées
else {
    $idRessources = $ressources['id'];
    $stmt = $db->prepare("UPDATE ressources SET metal = $metal, deuterium = $deuterium, energie = $energie WHERE id = ?");
    $stmt->execute([$idRessources]);
}

include 'recuperation_ressources.php';