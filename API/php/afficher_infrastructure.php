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

    // Récupère les informations sur les infrastructures
    $sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete";
    $result = $db->query($sql);
    $infra = $result->fetch(PDO::FETCH_ASSOC);

    // A DEFINIR DYNAMIQUEMENT
    $niveau_intelligeance_artificelle = 5;


    $textHTML = "";
    $ligne = "<div class='h_line_table'></div>";


    // section installation
    $textHTML .= "<section id='installation'><h3>Installations</h3>" . $ligne;
    $textHTML .= "<div id='labo_de_recheche' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Laboratoire de recheche</p>";
    $textHTML .= installation_info($infra['idInstallations'], $infra['niveau']);
    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);
    $textHTML .= $ligne;
    $textHTML .= "<div id='chantier_spatial' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Chantier spatial</p>";
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= installation_info($infra['idInstallations'], $infra['niveau']);
    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);
    $textHTML .= $ligne;
    $textHTML .= "<div id='usine_nanite' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Usine de nanites</p>";
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= installation_info($infra['idInstallations'], $infra['niveau']);
    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);
    $textHTML .= "</section>";


    // Section Ressource
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= "<section id='ressources'><h3>Ressources</h3>" . $ligne;

    $textHTML .= "<div id='mine_metal' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Mine de métal</p>";
    $niveau = $infra['niveau'];
    $textHTML .= "<p id='mine_metal_niveau'>Niveau actuel : $niveau</p>";

    $id = $infra['idMinier'];
    $sql = "SELECT * FROM minier WHERE id=$id";
    $result_mine = $db->query($sql);
    $minier = $result_mine->fetch(PDO::FETCH_ASSOC);

    $metal = round($minier['metal'] * pow(1.6, $niveau));
    $energie = round($minier['energie'] * pow(1.6, $niveau));
    $production = round($minier['production'] * pow(1.5, $niveau));
    $textHTML .= "<p id='mine_metal_metal'>Métal : $metal</p>";
    $textHTML .= "<p id='mine_metal_energie'>Energie : $energie</p>";
    $textHTML .= "<p>Production : $production / minutes</p></div>";

    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);

    $textHTML .= $ligne;

    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= "<div id='synthe_deuterium' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Sythétiseur de deuterium</p>";
    $niveau = $infra['niveau'];
    $textHTML .= "<p>Niveau actuel : $niveau</p>";

    $id = $infra['idMinier'];
    $sql = "SELECT * FROM minier WHERE id=$id";
    $result_mine = $db->query($sql);
    $minier = $result_mine->fetch(PDO::FETCH_ASSOC);

    $metal = round($minier['metal'] * pow(1.6, $niveau));
    $energie = round($minier['energie'] * pow(1.6, $niveau));
    $production = round($minier['production'] * pow(1.3, $niveau));

    $textHTML .= "<p>Métal : $metal</p>";
    $textHTML .= "<p>Energie : $energie</p>";
    $textHTML .= "<p>Production : $production / minutes</p></div>";

    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);

    $textHTML .= $ligne;

    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= "<div id='centrale_solaire' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Centrale solaire</p>";
    $niveau = $infra['niveau'];
    $textHTML .= "<p>Niveau actuel : $niveau</p>";

    $id = $infra['idMinier'];
    $sql = "SELECT * FROM minier WHERE id=$id";
    $result_mine = $db->query($sql);
    $minier = $result_mine->fetch(PDO::FETCH_ASSOC);

    $metal = round($minier['metal'] * pow(1.6, $niveau));
    $deuterium = round($minier['deuterium'] * pow(1.6, $niveau));
    $production = round($minier['production'] * pow(1.4, $niveau));

    $textHTML .= "<p>Métal : $metal</p>";
    $textHTML .= "<p>Deutérium : $deuterium</p>";
    $textHTML .= "<p>Production : $production</p></div>";

    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);

    $textHTML .= $ligne;

    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= "<div id='centrale_fusion' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Centrale à fusion</p>";
    $niveau = $infra['niveau'];
    $textHTML .= "<p>Niveau actuel : $niveau</p>";

    $id = $infra['idMinier'];
    $sql = "SELECT * FROM minier WHERE id=$id";
    $result_mine = $db->query($sql);
    $minier = $result_mine->fetch(PDO::FETCH_ASSOC);

    $metal = round($minier['metal'] * pow(1.6, $niveau));
    $deuterium = round($minier['deuterium'] * pow(1.6, $niveau));
    $production = round($minier['production'] * pow(2, $niveau));

    $textHTML .= "<p>Métal : $metal</p>";
    $textHTML .= "<p>Deutérium : $deuterium</p>";
    $textHTML .= "<p>Production : $production</p></div>";

    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);
    $textHTML .= "</section>";


    // Section Défense
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= "<section id='defense'><h3>Défense</h3>" . $ligne;

    $textHTML .= "<div id='artillerie_laser' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Artillerie laser</p>";
    $niveau = $infra['niveau'];
    $textHTML .= "<p>Niveau actuel : $niveau</p>";
    $textHTML .= "<p>Métal : test</p>";
    $textHTML .= "<p>Métal : test</p></div>";

    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);

    $textHTML .= $ligne;

    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= "<div id='canon_ions' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Canon à ions</p>";
    $niveau = $infra['niveau'];
    $textHTML .= "<p>Niveau actuel : $niveau</p>";
    $textHTML .= "<p>Métal : test</p>";
    $textHTML .= "<p>Métal : test</p></div>";

    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);

    $textHTML .= $ligne;

    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $textHTML .= "<div id='bouclier' class='categorie'>
                    <img class='image_categorie' src='ressources/infrastructures/marteau.png' alt='Image de marteau'>
                    <div>
                    <p>Bouclier</p>";
    $niveau = $infra['niveau'];
    $textHTML .= "<p>Niveau actuel : $niveau</p>";
    $textHTML .= "<p>Métal : test</p>";
    $textHTML .= "<p>Métal : test</p></div>";

    $textHTML .= bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete);
    $textHTML .= "</section>";

    echo $textHTML;
}


function installation_info($id, $niveau)
{
    include 'pdo.php';
    
    // Récupère les informations sur l'installation
    $sql = "SELECT * FROM installations WHERE id=$id";
    $result = $db->query($sql);
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $metal_id = $infra['nom'] . "_metal";
    $energie_id = $infra['nom'] . "_energie";
    $niveau_id = $infra['nom'] . "_niveau";

    // calcul et arrondi au plus proche les valeurs
    $metal = round($infra['metal'] * pow(1.6, $niveau));
    $energie = round($infra['energie'] * pow(1.6, $niveau));

    $info = "<p id='$niveau_id'>Niveau actuel : $niveau</p>";
    $info .= "<p id='$metal_id'>Métal : $metal</p>";
    $info .= "<p id='$energie_id'>Energie : $energie</p></div>";

    return $info;
}


// Fonction pour afficher les bouttons pour construire les batiments
function bouton_info($infra, $niveau_intelligeance_artificelle, $idPlanete)
{
    include 'pdo.php';

    //récupère le niveau de l'usine de nanite
    $sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete AND idInstallations=3";
    $result = $db->query($sql);
    $nanite = $result->fetch(PDO::FETCH_ASSOC);
    $niveau_usine_nanite = $nanite['niveau'];

    $niveau = $infra['niveau'];
    $info = "";

    if ($infra['idInstallations'] != null) {
        $id = $infra['idInstallations'];
        $sql = "SELECT * FROM installations WHERE id=$id";
    }
    if ($infra['idMinier'] != null) {
        $id = $infra['idMinier'];
        $sql = "SELECT * FROM minier WHERE id=$id";
    }
    if ($infra['idDefense'] != null) {
        $id = $infra['idDefense'];
        $sql = "SELECT * FROM Defense WHERE id=$id";
    }

    $result = $db->query($sql);
    $installation = $result->fetch(PDO::FETCH_ASSOC);
    $nom = $installation['nom'] . '_boutton';
    $nom_temps = $installation['nom'] . '_temps';
    // calcul le temps de construction en prennant en compte le niveau de la technologie intelligeance artificiel
    $temps = round($installation['tempsConstruction'] * pow(2, $niveau) * pow(1 - $niveau_intelligeance_artificelle / 100, $niveau_usine_nanite));

    $info .= "<button id='$nom' class='libre'><div>Construire</div>";
    $info .= "<div id='$nom_temps'>$temps s</div></button></div>";

    return $info;
}