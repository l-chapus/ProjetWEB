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
    

    $idPlaneteAAttribuer = rand($planete['id'] , $idDernierePlanete);

    $sql = "SELECT * FROM planete WHERE id=$idPlaneteAAttribuer";
    $result = $db->query($sql);
    $planete_attribuer = $result->fetch(PDO::FETCH_ASSOC);

    // Vérifie que la planète n'est pas déjà attribuer
    while($planete_attribuer['idUtilisateurs'] != null)
    {
        $idPlaneteAAttribuer = rand($planete['id'] , $idDernierePlanete);
        $sql = "SELECT * FROM planete WHERE id=$idPlaneteAAttribuer";
        $result = $db->query($sql);
        $planete_attribuer = $result->fetch(PDO::FETCH_ASSOC);
    }

    $stmt = $db->prepare("UPDATE planete SET idUtilisateurs = ? WHERE id = ?");
    $stmt->execute([$idUser, $idPlaneteAAttribuer]);


    // Récupère l'id du système solaire
    $sql = "SELECT * FROM planete WHERE id=$idPlaneteAAttribuer";
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
    
    // Formater la date actuelle au format DATETIME
    $formattedDate = date('Y-m-d H:i:s');

    // Initialise les ressources de base
    $stmt = $db->prepare("INSERT INTO ressources (metal, deuterium, energie, idUtilisateurs, idUnivers, dateDeconnexion) VALUES (?,?,?,?,?,?);");
    $stmt->execute([1000,1000,1000,$idUser,$idUnivers,$formattedDate]);


    // initialise les infrastuctures dans la base de données avec un niveau égale à 0 et sans date de fin
    // pour les installation
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idInstallations) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 1]);
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idInstallations) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 2]);
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idInstallations) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 3]);
    
    // pour la partie génération de ressource
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idMinier) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 1]);
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idMinier) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 2]);
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idMinier) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 3]);
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idMinier) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 4]);

    // pour la partie défense
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idDefense) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 1]);
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idDefense) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 2]);
    $infra = $db->prepare("INSERT INTO infrastructure (idPlanete,idDefense) VALUES (?,?);");
    $infra->execute([$idPlaneteAAttribuer, 3]);

    // Initialise les recherches d'un joueur avec un niveau de 0 pour chaque recherche
    $recherche = $db->prepare("INSERT INTO recherche (idPlanete,idUtilisateur,idTechnologie) VALUES (?,?,?);");
    $recherche->execute([$idPlaneteAAttribuer, $idUser, 1]);
    $recherche->execute([$idPlaneteAAttribuer, $idUser, 2]);
    $recherche->execute([$idPlaneteAAttribuer, $idUser, 3]);
    $recherche->execute([$idPlaneteAAttribuer, $idUser, 4]);
    $recherche->execute([$idPlaneteAAttribuer, $idUser, 5]);
    $recherche->execute([$idPlaneteAAttribuer, $idUser, 6]);

    // Initialise les vaisseaux posséder par un joueur
    $flotte = $db->prepare("INSERT INTO flotte (idPlanete,idUtilisateur,idChantierSpatial) VALUES (?,?,?);");
    $flotte->execute([$idPlaneteAAttribuer, $idUser, 1]);
    $flotte->execute([$idPlaneteAAttribuer, $idUser, 2]);
    $flotte->execute([$idPlaneteAAttribuer, $idUser, 3]);
    $flotte->execute([$idPlaneteAAttribuer, $idUser, 4]);
    

    $info = "<img src='ressources/nav/planete.png' alt='Logo de la planète'>" . $ref_planete;
    echo $info;
}

?>