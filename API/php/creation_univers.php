<?php

include 'pdo.php';

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //on récupère le nombre d'univers déjà créé
    $stmt = $db->prepare("SELECT COUNT(*) FROM univers");
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    //on ajoute l'univers à la base de données avec le bon nom
    $nom_univers = "Univers " . strval($count);
    $stmt2 = $db->prepare("INSERT INTO univers (nom) VALUES (?);");
    $stmt2->execute([$nom_univers]);

    //l'id est simplement le numéro de l'univer + 1 parcequ'on commence à 0 
    $id_univers = $count + 1;

    //on va ensuite créé les galaxie, les systèmes solaires et les planètes

    for($i = 1; $i <= 5; $i++) {
        //ajoute la galaxie
        $nom_galaxie = "Galaxie " . strval($i);
        $galaxie = $db->prepare("INSERT INTO galaxie (idUnivers,nom) VALUES (?,?);");
        $galaxie->execute([$id_univers, $nom_galaxie]);

        //récupère l'id de la galaxie
        $galaxie2 = $db->prepare("SELECT * FROM galaxie WHERE idUnivers =$id_univers AND nom='$nom_galaxie';");
        $galaxie2->execute();
        $galaxie_info = $galaxie2->fetch(PDO::FETCH_ASSOC);
        $id_galaxie = $galaxie_info['id'];
        

        for($j = 1; $j <= 10; $j++) {
            //ajoute le système solaire
            $nom_syst_solaire = "Système solaire " . strval($j);
            $syst_solaire = $db->prepare("INSERT INTO systemsolaire (idGalaxie,nom) VALUES (?,?);");
            $syst_solaire->execute([$id_galaxie, $nom_syst_solaire]);

            //récupère l'id du système solaire
            $syst_solaire2 = $db->prepare("SELECT * FROM systemsolaire WHERE idGalaxie =$id_galaxie AND nom='$nom_syst_solaire';");
            $syst_solaire2->execute();
            $syst_solaire_info = $syst_solaire2->fetch(PDO::FETCH_ASSOC);
            $id_syst_solaire = $syst_solaire_info['id'];
            
            
            $nombre_planete = rand(4, 10);
            $position_utiliser = array();

            //tire au sort les positions des planètes
            for($k = 1; $k <= $nombre_planete; $k++) {
                $position = rand(1, 10);
                //vérifie que la position n'est pas déjà utilisé
                while (in_array($position, $position_utiliser)) {
                    $position = rand(1, 10);
                }
                array_push($position_utiliser , $position);
            }

            //tire les positions dans l'ordre croissant
            sort($position_utiliser);

            //ajoute les planètes à la base de données
            for($k = 1; $k <= $nombre_planete; $k++) {  
                $nom_planete = "Planète " . strval($position);
                $planete = $db->prepare("INSERT INTO planete (idPosition,idSystemSolaire,nom) VALUES (?,?,?);");
                $planete->execute([$position_utiliser[$k], $id_syst_solaire, $nom_planete]);
            }
        }
    }

    session_start();
    $_SESSION['univers'] = $nom_univers;
}

?>