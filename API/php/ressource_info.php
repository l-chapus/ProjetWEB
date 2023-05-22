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

// Récupère l'id de la planète
$sql = "SELECT * FROM planete WHERE idUtilisateurs=$idUser AND idUnivers=$idUnivers";
$result = $db->query($sql);
$planete = $result->fetch(PDO::FETCH_ASSOC);
$idPlanete = $planete['id'];

// Récupère les ressources stocké dans la base de données
$sql = "SELECT * FROM ressources WHERE idUtilisateurs=$idUser AND idUnivers=$idUnivers";
$result = $db->query($sql);
$ressources = $result->fetch(PDO::FETCH_ASSOC);

// Récupère les informations sur les niveau des batiments
$sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete AND idMinier IS NOT NULL";
$result = $db->query($sql);
$infra = $result->fetch(PDO::FETCH_ASSOC);
$niveau_mine = $infra['niveau'];

$infra = $result->fetch(PDO::FETCH_ASSOC);
$niveau_synthetiseur = $infra['niveau'];

$infra = $result->fetch(PDO::FETCH_ASSOC);
$niveau_centrale_solaire = $infra['niveau'];

$infra = $result->fetch(PDO::FETCH_ASSOC);
$niveau_centrale_fusion = $infra['niveau'];


$metal = $ressources['metal'];
$energie = $ressources['energie'];
$deuterium = $ressources['deuterium'];


// on sépare chaque valeur pour pouvoir les retrouvées dans le javascript
$info = $metal . '|' . $niveau_mine  . '|' . $deuterium . '|' . $niveau_synthetiseur . '|' . $energie . '|' . $niveau_centrale_solaire . '|' . $niveau_centrale_fusion;

echo $info;