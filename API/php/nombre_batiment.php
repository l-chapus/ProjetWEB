<?php

include 'pdo.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
    $idPosition = $planete['idPosition'];

    // Récupère les informations sur les batiments
    $sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete";
    $result = $db->query($sql);
    $infra = $result->fetch(PDO::FETCH_ASSOC);

    $nombre_batiment = 0;

    // Ajoute le niveau de chaque batiment
    for($j = 0; $j < 7; $j++) {
        $nombre_batiment += $infra['niveau'];
        $infra = $result->fetch(PDO::FETCH_ASSOC);
    }

    // Récupère le nombre limite de batiment
    $sql = "SELECT * FROM position WHERE id=$idPosition";
    $result = $db->query($sql);
    $position = $result->fetch(PDO::FETCH_ASSOC);
    $nombre_batiment_limite = $position['taille'];

    if($nombre_batiment < $nombre_batiment_limite){
        echo "dessous";
    }
    else{
        echo "limite";
    } 
}