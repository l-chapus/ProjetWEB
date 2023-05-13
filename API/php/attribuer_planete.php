<?php

include 'pdo.php';

if($_SERVER["REQUEST_METHOD"] == "GET") 
{
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


    $sql = "SELECT * FROM planete WHERE idUnivers=$idUnivers";
    $result = $db->query($sql);
    $planete = $result->fetch(PDO::FETCH_ASSOC);
    $numRows = $result->rowCount();

    $idDernierePlanete = $planete['id'] + $numRows - 1;
    

    $ipPlaneteAAttribuer = rand($planete['id'] , $idDernierePlanete);

    $sql = "SELECT * FROM planete WHERE id=$ipPlaneteAAttribuer";
    $result = $db->query($sql);
    $planete_attribuer = $result->fetch(PDO::FETCH_ASSOC);

    // Vérifie que la planète n'est pas déjà attribuer
    while($planete_attribuer['idUtilisateurs'] != null)
    {
        $ipPlaneteAAttribuer = rand($planete['id'] , $idDernierePlanete);
        $sql = "SELECT * FROM planete WHERE id=$ipPlaneteAAttribuer";
        $result = $db->query($sql);
        $planete_attribuer = $result->fetch(PDO::FETCH_ASSOC);
    }

    $stmt = $db->prepare("UPDATE planete SET idUtilisateurs = ? WHERE id = ?");
    $stmt->execute([$idUser, $ipPlaneteAAttribuer]);


    // Récupère l'id du système solaire
    $sql = "SELECT * FROM planete WHERE id=$ipPlaneteAAttribuer";
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
    
    // Initialise les ressources de base
    $_SESSION['energie'] = 1000;
    $_SESSION['deuterium'] = 1000;
    $_SESSION['metal'] = 1000;

    $info = "<img src='ressources/nav/planete.png' alt='Logo de la planète'>" . $ref_planete;
    echo $info;
}

?>