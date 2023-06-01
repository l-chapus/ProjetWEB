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

// Récupère la date de fin de la recherche
$sql = "SELECT * FROM recherche WHERE idPlanete=$idPlanete AND dateFin IS NOT NULL";
$result = $db->query($sql);
$recherche = $result->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(!$recherche){
        echo null;
    }
    else{
        echo $recherche['dateFin'];
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $recherche['id'];
    
    $stmt = $db->prepare("UPDATE recherche SET dateFin = NULL WHERE id = ? ");
    $stmt->execute(array($id));
}