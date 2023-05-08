<?php

include 'pdo.php';

if($_SERVER["REQUEST_METHOD"] == "GET") 
{
    session_start();
    $univers = $_SESSION['univers'];
    $galaxie = $_GET['galaxie'];
    $systeme_solaire = $_GET['systeme_solaire'];

    // Récupère l'id de l'univers
    $sql = "SELECT id FROM univers WHERE nom='$univers'";
    $result = $db->query($sql);
    $univers = $result->fetch(PDO::FETCH_ASSOC);
    $idUnivers = $univers['id'];

    // Récupère l'id de la galaxie
    $sql = "SELECT id FROM galaxie WHERE nom='$galaxie' AND idUnivers=$idUnivers";
    $result = $db->query($sql);
    $galaxie = $result->fetch(PDO::FETCH_ASSOC);
    $idGalaxie = $galaxie['id'];
    
    // Récupère l'id du système solaire
    $sql = "SELECT id FROM systemsolaire WHERE nom='$systeme_solaire' AND idGalaxie=$idGalaxie";
    $result = $db->query($sql);
    $SystmeSolaire = $result->fetch(PDO::FETCH_ASSOC);
    $idSystmeSolaire = $SystmeSolaire['id'];
    
    // Récupère les informations sur les planètes
    $sql = "SELECT * FROM planete WHERE idUnivers=$idUnivers AND idSystemSolaire=$idSystmeSolaire";
    $result = $db->query($sql);

    $tableau='<div class="divTableHeading">
                <div class="divTableCellDistanceHead"></div>
                <div class="divTableCellImageHead"></div>
                <div class="divTableCellHead">Nom</div>
                <div class="divTableCellHead">Joueur</div>
                <div class="divTableCellHead">Action</div>
            </div>';


    $planetes = $result->fetch(PDO::FETCH_ASSOC);
    for ($i=1; $i < 10; $i++) { 
        $tableau .= '<div class="h_line_table"></div>';

        if($planetes){
            if ($planetes['idPosition'] === $i) {
                $idUtilisateur = $planetes['idUtilisateurs'];
                if($idUtilisateur != null){
                    $sql = "SELECT * FROM pseudo WHERE id='$idUtilisateur'";
                    $user = $db->query($sql);
                    $utilisateur = $user->fetch(PDO::FETCH_ASSOC);
                    $pseudo = $utilisateur['nom'];
                }
                else{
                    $pseudo="";
                }
                
                $NumImage = $planetes['NumImage'];
                $nom = $planetes['nom'];

                $tableau .= "<div class='divTableRow'>
                                <div class='divTableCellDistance'>$i</div>
                                <div class='divTableCellImage'>
                                <img src='/front/ressources/planetes/pla$NumImage.png' alt='image planete $i'>
                                </div>
                                <div class='divTableCell'>$nom</div>
                                <div class='divTableCell'>$pseudo</div>
                                <div class='divTableCell'>
                                    <img class='divTableImage' src='/front/ressources/vaisseaux_attaque.png' alt='boutton attaque planete $i'>
                                </div>
                            </div>
                            <div class='h_line_table_distance'></div>";
                $planetes = $result->fetch(PDO::FETCH_ASSOC); 
            }
            else{
                $tableau .= "<div class='divTableRow'>
                                <div class='divTableCellDistance'>$i</div>
                                <div class='divTableCellImage'></div>
                                <div class='divTableCell'></div>
                                <div class='divTableCell'></div>
                                <div class='divTableCell'></div>
                            </div>
                            <div class='h_line_table_distance'></div>";           
            }
        }
        else{
            $tableau .= "<div class='divTableRow'>
                            <div class='divTableCellDistance'>$i</div>
                            <div class='divTableCellImage'></div>
                            <div class='divTableCell'></div>
                            <div class='divTableCell'></div>
                            <div class='divTableCell'></div>
                        </div>
                        <div class='h_line_table_distance'></div>";           
        }
        
        
    }
    if($planetes){
        if ($planetes['idPosition'] === 10) {
            $tableau .= '<div class="h_line_table"></div>';
            $NumImage = $planetes['NumImage'];
            $nom = $planetes['nom'];
            $tableau .= "<div class='divTableRow'>
                            <div class='divTableCellDistance'>10</div>
                            <div class='divTableCellImage'>
                                <img src='/front/ressources/planetes/pla$NumImage.png' alt='image planete 10'>
                            </div>
                            <div class='divTableCell'>$nom</div>
                            <div class='divTableCell'>utilisateur</div>
                            <div class='divTableCell'>
                                <img class='divTableImage' src='/front/ressources/vaisseaux_attaque.png' alt='boutton attaque planete 10'>
                            </div>
                        </div>";
        }
    }
    else{
        $tableau .= '<div class="h_line_table"></div>';
        $tableau .= "<div class='divTableRow'>
                        <div class='divTableCellDistance'>10</div>
                        <div class='divTableCellImage'></div>
                        <div class='divTableCell'></div>
                        <div class='divTableCell'></div>
                        <div class='divTableCell'></div>
                    </div>";           
    }

    echo $tableau;
    //var_dump($planetes['idPosition']);

    //$planetes = $result->fetch(PDO::FETCH_ASSOC);
    //var_dump($planetes);

    // "<option value=\"$univers\">$univers</option>"
}
?>
