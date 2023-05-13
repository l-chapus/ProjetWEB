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

    // Récupère l'id du système solaire
    $sql = "SELECT * FROM planete WHERE id=$idPlanete";
    $result = $db->query($sql);
    $planete = $result->fetch(PDO::FETCH_ASSOC);

    $idsysteme_solaire = $planete['idSystemSolaire'];
    $position_planete = $planete['idPosition'];

    // Récupère l'id de la galaxie
    $sql = "SELECT * FROM systemsolaire WHERE id=$idsysteme_solaire";
    $result = $db->query($sql);
    $systeme_solaire = $result->fetch(PDO::FETCH_ASSOC);

    $idGalaxie = $systeme_solaire['idGalaxie'];
    $nom_systeme_solaire = $systeme_solaire['nom'];

    // Récupère le nom de la galaxie
    $sql = "SELECT * FROM galaxie WHERE id=$idGalaxie";
    $result = $db->query($sql);
    $galaxie = $result->fetch(PDO::FETCH_ASSOC);

    $nom_Galaxie = $galaxie['nom'];

    $ref_planete = "G" . substr($nom_Galaxie, -1) . "-S" . substr($nom_systeme_solaire, -1) . "-P" . $position_planete;

    $_SESSION['ref_planete'] = $ref_planete;

    $info = "<img src='ressources/nav/planete.png' alt='Logo de la planète'>" . $ref_planete;
    echo $info;
}
