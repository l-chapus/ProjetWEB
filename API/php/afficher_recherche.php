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

    // Récupère les informations sur le laboratoire de recherche
    $sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete AND idInstallations =1";
    $result = $db->query($sql);
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $niveau_labo = $infra['niveau'];

    $textHTML = "<section id='recheche'><h3>Recherche</h3>";
    $ligne = "<div class='h_line_table'></div>";

    $sql = "SELECT * FROM recherche WHERE idUtilisateur=$idUser AND idPlanete=$idPlanete";
    $result = $db->query($sql);

    $recherche = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= $ligne;

    $textHTML .= "<div id='energie' class='categorie'>
                <img class='image_categorie' src='ressources/recherche/energie.png' alt='Logo de la recherche énergie'>
                <div><p>Energie</p>";
    $niveau = $recherche['niveau'];
    $textHTML .= "<p id='energie_niveau'>Niveau actuel : $niveau</p>";
    $textHTML .= "<p id='energie_deuterium'>Deutérium : 100</p>
                  <p class='afficher' id='energie_labo'>Nécessite le laboratoire de recherche</p></div>
                    <button id='energie_bouton' class='libre'><div>Rechercher</div><div id='energie_temps'>";
    $textHTML .= round(4 * pow(2, $niveau) * pow(0.95, $niveau_labo));
    $textHTML .= "s</div></button></div>";

    $textHTML .= $ligne;
    $recherche = $result->fetch(PDO::FETCH_ASSOC);

    $textHTML .= "<div id='energie' class='categorie'>
                <img class='image_categorie' src='ressources/recherche/intelligence_artificielle.png' alt='Logo de la recherche intelligence artificielle'>
                <div><p>Intelligence artificielle</p>";
    $niveau = $recherche['niveau'];
    $textHTML .= "<p id='intelligence_artificielle_niveau'>Niveau actuel : $niveau</p>";
    $textHTML .= "<p id='intelligence_artificielle_deuterium'>Deutérium : 200</p>
                  <p class='afficher' id='intelligence_artificielle_labo'>Nécessite le laboratoire de recherche</p></div>
                    <button id='intelligence_artificielle_bouton' class='libre'><div>Rechercher</div><div id='intelligence_artificielle_temps'>";
    $textHTML .= round(10 * pow(2, $niveau) * pow(0.95, $niveau_labo));
    $textHTML .= "s</div></button></div>";

    $textHTML .= $ligne;
    $recherche = $result->fetch(PDO::FETCH_ASSOC);

    $textHTML .= "<div id='energie' class='categorie'>
                <img class='image_categorie' src='ressources/recherche/laser.png' alt='Logo de la recherche laser'>
                <div><p>Laser</p>";
    $niveau = $recherche['niveau'];
    $textHTML .= "<p id='laser_niveau'>Niveau actuel : $niveau</p>";
    $textHTML .= "<p id='laser_deuterium'>Deutérium : 300</p>
                  <p class='afficher' id='laser_labo'>Nécessite le laboratoire de recherche</p>
                  <p class='afficher' id='laser_techno_energie_5'>Nécessite la recherche Energie niveau 5</p></div>
                  <button id='laser_bouton' class='libre'><div>Rechercher</div><div id='laser_temps'>";
    $textHTML .= round(2 * pow(2, $niveau) * pow(0.95, $niveau_labo));
    $textHTML .= "s</div></button></div>";

    $textHTML .= $ligne;
    $recherche = $result->fetch(PDO::FETCH_ASSOC);

    $textHTML .= "<div id='energie' class='categorie'>
                <img class='image_categorie' src='ressources/recherche/ions.png' alt='Logo de la recherche ions'>
                <div><p>Ions</p>";
    $niveau = $recherche['niveau'];
    $textHTML .= "<p id='ions_niveau'>Niveau actuel : $niveau</p>";
    $textHTML .= "<p id='ions_deuterium'>Deutérium : 300</p>
                  <p class='afficher' id='ions_labo'>Nécessite le laboratoire de recherche</p>
                  <p class='afficher' id='ions_techno_laser_5'>Nécessite la recherche Laser niveau 5</p></div>
                  <button id='ions_bouton' class='libre'><div>Rechercher</div><div id='ions_temps'>";
    $textHTML .= round(8 * pow(2, $niveau) * pow(0.95, $niveau_labo));
    $textHTML .= "s</div></button></div>";

    $textHTML .= $ligne;
    $recherche = $result->fetch(PDO::FETCH_ASSOC);

    $textHTML .= "<div id='energie' class='categorie'>
                <img class='image_categorie' src='ressources/recherche/bouclier.png' alt='Logo de la recherche bouclier'>
                <div><p>Bouclier</p>";
    $niveau = $recherche['niveau'];
    $textHTML .= "<p id='bouclier_niveau'>Niveau actuel : $niveau</p>";
    $textHTML .= "<p id='bouclier_deuterium'>Deutérium : 1000</p>
                  <p class='afficher' id='bouclier_labo'>Nécessite le laboratoire de recherche</p>
                  <p class='afficher' id='bouclier_techno_ions_2'>Nécessite la recherche Ions niveau 2</p>
                  <p class='afficher' id='bouclier_techno_enregie_8'>Nécessite la recherche Energie niveau 8</p></div>
                  <button id='bouclier_bouton' class='libre'><div>Rechercher</div><div id='bouclier_temps'>";
    $textHTML .= round(5 * pow(2, $niveau) * pow(0.95, $niveau_labo));
    $textHTML .= "s</div></button></div>";


    $textHTML .= $ligne;
    $recherche = $result->fetch(PDO::FETCH_ASSOC);

    $textHTML .= "<div id='energie' class='categorie'>
                <img class='image_categorie' src='ressources/recherche/armement.png' alt='Logo de la recherche armement'>
                <div><p>Armement</p>";
    $niveau = $recherche['niveau'];
    $textHTML .= "<p id='armement_niveau'>Niveau actuel : $niveau</p>";
    $textHTML .= "<p id='armement_deuterium'>Deutérium : 1000</p>
                  <p id='armement_metal'>Métal : 500</p>
                  <p class='afficher' id='armement_labo'>Nécessite le laboratoire de recherche</p>
                  <button id='armement_bouton' class='libre'><div>Rechercher</div><div id='armement_temps'>";
    $textHTML .= round(6 * pow(2, $niveau) * pow(0.95, $niveau_labo));
    $textHTML .= "s</div></button></div>";

    $textHTML .= "</section>";

    echo $textHTML;
}
