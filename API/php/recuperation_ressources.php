<?php

include 'pdo.php';

error_reporting(0);

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

$sql = "SELECT * FROM ressources WHERE idUtilisateurs=$idUser AND idUnivers=$idUnivers";
$result = $db->query($sql);
$ressources = $result->fetch(PDO::FETCH_ASSOC);

$_SESSION['energie'] = $ressources['energie'];
$_SESSION['deuterium'] = $ressources['deuterium'];
$_SESSION['metal'] = $ressources['metal'];

$metal = $_SESSION['metal'];
$energie = $_SESSION['energie'];
$deuterium = $_SESSION['deuterium'];

$info = "<div id='energie'>
            <img src='ressources/nav/energie.png' alt='Logo énergie'>
            <p id='energie_count'>$energie</p>
        </div>
        <div class='v_line_ressource'></div>
        <div id='deuterium'>
            <img src='ressources/nav/deuterium.png' alt='Logo deutérium'>
            <p>$deuterium</p>
        </div>
        <div class='v_line_ressource'></div>
        <div id='metal'>
            <img src='ressources/nav/metal.png' alt='Logo métal'>
            <p>$metal</p>
        </div>";

echo $info;