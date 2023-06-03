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
$nom_univers = $_SESSION['univers'];
$sql = "SELECT * FROM univers WHERE nom='$nom_univers'";
$result = $db->query($sql);
$univers = $result->fetch(PDO::FETCH_ASSOC);
$idUnivers = $univers['id'];

// Récupère l'id de la planète
$sql = "SELECT * FROM planete WHERE idUtilisateurs=$idUser AND idUnivers=$idUnivers";
$result = $db->query($sql);
$planete = $result->fetch(PDO::FETCH_ASSOC);
$idPlanete = $planete['id'];

// Récupère la date de fin de construction du vaisseau
$sql = "SELECT * FROM flotte WHERE idPlanete=$idPlanete AND dateFin IS NOT NULL";
$result = $db->query($sql);
$vaisseau = $result->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(!$vaisseau){
        echo null;
    }
    else{
        echo $vaisseau['dateFin'];
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $vaisseau['id'];
    $stmt = $db->prepare("UPDATE flotte SET dateFin = NULL WHERE id = ? ");
    $stmt->execute(array($id));
}