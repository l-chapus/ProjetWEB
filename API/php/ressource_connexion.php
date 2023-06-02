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

if ($planete) {

    $idPlanete = $planete['id'];

    // Récupère les ressources du joueur
    $sql = "SELECT * FROM ressources WHERE idUtilisateurs=$idUser AND idUnivers=$idUnivers";
    $result = $db->query($sql);
    $ressource = $result->fetch(PDO::FETCH_ASSOC);
    $date_deconnexion = $ressource['dateDeconnexion'];
    $ancien_metal = $ressource['metal'];
    $ancien_deuterium = $ressource['deuterium'];

    // convertie la date en objet DateTime
    $date_deconnexion  = DateTime::createFromFormat('Y-m-d H:i:s', $date_deconnexion);

    // Formater la date actuelle au format DATETIME
    $date_actuelle = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));

    // Calcul de la différence entre les dates
    $diff = $date_deconnexion->diff($date_actuelle);

    // Récupération de la différence entre les deux dates
    $diff_annees = $diff->y;
    $diff_mois = $diff->m;
    $diff_jours = $diff->days;
    $diff_heures = $diff->h;
    $diff_minutes = $diff->i;
    $diff_secondes = $diff->s;

    // calcul le temps entre les deux dates en secondes
    $temps = $diff_secondes + 60 * ($diff_minutes + 60 * ($diff_heures + 24 * ($diff_jours + 30 * ($diff_mois + 12 * $diff_annees))));


    // Récupère les informations sur la mine de métal
    $sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete AND idMinier=1";
    $result = $db->query($sql);
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $niveau = $infra['niveau'];

    $sql = "SELECT * FROM minier WHERE id=1";
    $result_mine = $db->query($sql);
    $minier = $result_mine->fetch(PDO::FETCH_ASSOC);

    $production = $minier['production'] * pow(1.5, $niveau);

    // Calcul la quatité de ressource
    $metal = round($temps * ($production / 60)) + $ancien_metal;


    // Récupère les informations sur le synthétiseur de deutérium
    $sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete AND idMinier=2";
    $result = $db->query($sql);
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $niveau = $infra['niveau'];

    $sql = "SELECT * FROM minier WHERE id=2";
    $result_synthe = $db->query($sql);
    $synthe = $result_synthe->fetch(PDO::FETCH_ASSOC);

    $production = $synthe['production'] * pow(1.3, $niveau);

    // Calcul la quatité de ressource
    $deuterium = round($temps * ($production / 60)) + $ancien_deuterium;


    // Formater la date actuelle au format DATETIME
    $formattedDate = date('Y-m-d H:i:s');

    // Met à jour les ressources
    $stmt = $db->prepare("UPDATE ressources SET metal = ?, deuterium = ?, dateDeconnexion = ? WHERE idUtilisateurs = ? AND idUnivers = ?");

    // Exécuter la requête avec les valeurs fournies
    $stmt->execute([$metal, $deuterium, $formattedDate, $idUser, $idUnivers]);
}
