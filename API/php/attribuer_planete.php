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
}

?>