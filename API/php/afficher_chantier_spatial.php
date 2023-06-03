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

    // Récupère les informations sur le chantier spatial
    $sql = "SELECT * FROM infrastructure WHERE idPlanete=$idPlanete AND idInstallations =2";
    $result = $db->query($sql);
    $infra = $result->fetch(PDO::FETCH_ASSOC);
    $niveau_chantier = $infra['niveau'];

    // Récupère les niveaux des recherches
    $sql = "SELECT * FROM recherche WHERE idPlanete=$idPlanete AND idUtilisateur=$idUser AND idTechnologie=5";
    $result = $db->query($sql);
    $recherche = $result->fetch(PDO::FETCH_ASSOC);
    $niveau_bouclier = $recherche['niveau'];

    $sql = "SELECT * FROM recherche WHERE idPlanete=$idPlanete AND idUtilisateur=$idUser AND idTechnologie=6";
    $result = $db->query($sql);
    $recherche = $result->fetch(PDO::FETCH_ASSOC);
    $niveau_armement = $recherche['niveau'];


    $textHTML = "<div id='chatier_spatial'>";


    $sql = "SELECT * FROM flotte WHERE idUtilisateur=$idUser AND idPlanete=$idPlanete AND idChantierSpatial = 1";
    $result = $db->query($sql);
    $flotte = $result->fetch(PDO::FETCH_ASSOC);
    $quantite = $flotte['quantite'];

    $sql = "SELECT * FROM chantierspatial WHERE id = 1";
    $result = $db->query($sql);
    $vaisseau = $result->fetch(PDO::FETCH_ASSOC);
    $metal = $vaisseau['coutMetal'];
    $deuterium = $vaisseau['coutDeuterium'];
    $temps = round($vaisseau['tempsConstruction'] * pow(0.95, $niveau_chantier));
    $attaque = round($vaisseau['pointAttaque'] * pow(1.03, $niveau_armement));
    $defense = round($vaisseau['pointDefense'] * pow(1.05, $niveau_bouclier));

    $textHTML .= "<section id='chasseur'>
                    <h3>Chasseurs</h3>
                    <img class='image_vaisseaux' src='/front/ressources/vaisseaux/chasseur.png' alt='Image du vaisseau chasseur'>
                    <div class='info'>
                        <p id='chasseur_quantite'>Disponible : $quantite</p>
                        <div class='h_line_vaisseaux'></div>
                        <p id='chasseur_metal'>Métal : $metal</p>
                        <p id='chasseur_deuterium'>Deutérium : $deuterium</p>
                        <div class='h_line_vaisseaux'></div>
                        <p>Point d'attaque : $attaque</p>
                        <p>Point de défense: $defense</p>
                    </div>
                    <div class='afficher'>Nécessite le chantier spatial</div>
                    <button class='libre'>
                        <div>Construire</div>
                        <div id='chasseur_temps'>$temps s</div>
                    </button>
                   </section>";


    $sql = "SELECT * FROM flotte WHERE idUtilisateur=$idUser AND idPlanete=$idPlanete AND idChantierSpatial = 2";
    $result = $db->query($sql);
    $flotte = $result->fetch(PDO::FETCH_ASSOC);
    $quantite = $flotte['quantite'];

    $sql = "SELECT * FROM chantierspatial WHERE id = 2";
    $result = $db->query($sql);
    $vaisseau = $result->fetch(PDO::FETCH_ASSOC);
    $metal = $vaisseau['coutMetal'];
    $deuterium = $vaisseau['coutDeuterium'];
    $temps = round($vaisseau['tempsConstruction'] * pow(0.95, $niveau_chantier));
    $attaque = round($vaisseau['pointAttaque'] * pow(1.03, $niveau_armement));
    $defense = round($vaisseau['pointDefense'] * pow(1.05, $niveau_bouclier));

    $textHTML .= "<section id='croiseur'>
                    <h3>Croiseurs</h3>
                    <img class='image_vaisseaux' src='/front/ressources/vaisseaux/croiseur.png' alt='Image du vaisseau croiseur'>
                    <div class='info'>
                        <p id='croiseur_quantite'>Disponible : $quantite</p>
                        <div class='h_line_vaisseaux'></div>
                        <p id='croiseur_metal'>Métal : $metal</p>
                        <p id='croiseur_deuterium'>Deutérium : $deuterium</p>
                        <div class='h_line_vaisseaux'></div>
                        <p>Point d'attaque : $attaque</p>
                        <p>Point de défense: $defense</p>
                    </div>
                    <div class='afficher'>Nécessite le chantier spatial</div>
                    <div class='afficher'>Nécessite la technologie ions niveau 4</div>
                    <button class='libre'>
                        <div>Construire</div>
                        <div id='croiseur_temps'>$temps s</div>
                    </button>
                  </section>";


    $sql = "SELECT * FROM flotte WHERE idUtilisateur=$idUser AND idPlanete=$idPlanete AND idChantierSpatial = 3";
    $result = $db->query($sql);
    $flotte = $result->fetch(PDO::FETCH_ASSOC);
    $quantite = $flotte['quantite'];

    $sql = "SELECT * FROM chantierspatial WHERE id = 3";
    $result = $db->query($sql);
    $vaisseau = $result->fetch(PDO::FETCH_ASSOC);
    $metal = $vaisseau['coutMetal'];
    $deuterium = $vaisseau['coutDeuterium'];
    $temps = round($vaisseau['tempsConstruction'] * pow(0.95, $niveau_chantier));
    $attaque = round($vaisseau['pointAttaque'] * pow(1.03, $niveau_armement));
    $defense = round($vaisseau['pointDefense'] * pow(1.05, $niveau_bouclier));

    $textHTML .= "<section id='transporteur'>
                    <h3>Transporteurs</h3>
                    <img class='image_vaisseaux' src='/front/ressources/vaisseaux/transporteur.png' alt='Image du vaisseau transporteur'>
                    <div class='info'>
                        <p id='transporteur_quantite'>Disponible : $quantite</p>
                        <div class='h_line_vaisseaux'></div>
                        <p id='transporteur_metal'>Métal : $metal</p>
                        <p id='transporteur_deuterium'>Deutérium : $deuterium</p>
                        <div class='h_line_vaisseaux'></div>
                        <p>Point d'attaque : $attaque</p>
                        <p>Point de défense: $defense</p>
                        <p>Capacité de fret: 100 000</p>
                    </div>
                    <div class='afficher'>Nécessite le chantier spatial</div>
                    <button class='libre'>
                        <div>Construire</div>
                        <div id='transporteur_temps'>$temps s</div>
                    </button>
                  </section>";


    $sql = "SELECT * FROM flotte WHERE idUtilisateur=$idUser AND idPlanete=$idPlanete AND idChantierSpatial = 4";
    $result = $db->query($sql);
    $flotte = $result->fetch(PDO::FETCH_ASSOC);
    $quantite = $flotte['quantite'];

    $sql = "SELECT * FROM chantierspatial WHERE id = 4";
    $result = $db->query($sql);
    $vaisseau = $result->fetch(PDO::FETCH_ASSOC);
    $metal = $vaisseau['coutMetal'];
    $deuterium = $vaisseau['coutDeuterium'];
    $temps = round($vaisseau['tempsConstruction'] * pow(0.95, $niveau_chantier));
    $attaque = round($vaisseau['pointAttaque'] * pow(1.03, $niveau_armement));
    $defense = round($vaisseau['pointDefense'] * pow(1.05, $niveau_bouclier));

    $textHTML .= "<section id='colonisation'>
                    <h3>Vaisseau de colonisation</h3>
                    <img class='image_vaisseaux' src='/front/ressources/vaisseaux/colonisateur.png' alt='Image du vaisseau colonisateur'>
                    <div class='info'>
                        <p id='colonisateur_quantite'>Disponible : $quantite</p>
                        <div class='h_line_vaisseaux'></div>
                        <p id='colonisateur_metal'>Métal : $metal</p>
                        <p id='colonisateur_deuterium'>Deutérium : $deuterium</p>
                        <div class='h_line_vaisseaux'></div>
                        <p>Point d'attaque : $attaque</p>
                        <p>Point de défense: $defense</p>
                    </div>
                    <div class='afficher'>Nécessite le chantier spatial</div>
                    <button class='libre'>
                        <div>Construire</div>
                        <div id='colonisateur_temps'>$temps s</div>
                    </button>
                  </section>";


    $textHTML .= "</div>";

    echo $textHTML;
}
