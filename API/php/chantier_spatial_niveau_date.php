<?php

include 'pdo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Récupère les données fournies
    $datefin = $_POST['date_fin'];
    $quantite = $_POST['quantite'];
    $vaisseau = $_POST['vaisseau'];

    $stmt = $db->prepare("UPDATE flotte SET quantite = ?, dateFin = ? WHERE idChantierSpatial = ? AND idUtilisateur = ? AND idPlanete = ?");
    $stmt->execute([$quantite,$datefin,$vaisseau,$idUser,$idPlanete]);
}