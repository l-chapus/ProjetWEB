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

    // Regarde su l'utilsateur possède déjà une planète
    $stmt = $db->prepare("SELECT * FROM planete WHERE idUtilisateurs = $idUser AND idUnivers = $idUnivers");
    $stmt->execute();
    
    // Compte le nombre de planète associé au joueur
    
    // Le joueur n'a pas de planète
    if($stmt->rowCount() == 0)
    {
        echo "false";
    }

    // Le joueur possède déjà au moins une planète
    else
    {
        echo "true";
    }
    
}

?>