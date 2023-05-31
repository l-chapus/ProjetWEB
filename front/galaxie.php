<?php
session_start();
if (!$_SESSION) {
    header("Location:index.html");
} 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESIREM Galactique</title>
    <link rel="stylesheet" href="style/style_galaxie.css" />
</head>

<body>
    <script src="../API/js/bouton_sidebar.js"></script>
    <script src="../API/js/ressource_manager.js"></script>    
    <script src="../API/js/planete_nav.js"></script>

    <script src="../API/js/gestion_galaxie.js"></script>
    

    <nav>
        <div id="ref_planete"></div>
        <img id="logo" src="ressources/nav/logo.png" alt="Logo ESIREM Galactique">
        <h1>ESIREM Galactique</h1>
        <div id="ressource">
            <div id="energie">
                <img src="ressources/nav/energie.png" alt="Logo énergie">
                <p id='energie_count'></p>
            </div>
            <div class="v_line_ressource"></div>
            <div id="deuterium">
                <img src="ressources/nav/deuterium.png" alt="Logo deutérium">
                <p id='deuterium_count'></p>
            </div>
            <div class="v_line_ressource"></div>
            <div id="metal">
                <img src="ressources/nav/metal.png" alt="Logo métal">
                <p id='metal_count'></p>
            </div>
        </div>
    </nav>
    <div id="page">
        <sidebar>
            <div id="pseudo">
                <?php echo $_SESSION['pseudo'] ?>
            </div>
            <button id="galaxie_sidebar_bouton">Galaxie</button>
            <button id="infrastructure_sidebar_bouton">Infrastructure</button>
            <button id="recherche_sidebar_bouton">Recherche</button>
            <button id="chatier_spatial_sidebar_bouton">Chantier spatial</button>
            <button id="flottes_sidebar_bouton">Flottes</button>
            <button id="deconnexion_bouton">Déconnexion</button>
        </sidebar>

        <div id="principale">
            <img id="image_fond" src="/front/ressources/background_galaxie.jpg" alt="Image de fond">

            <div id="univers">
                <h3>Univers choisi : <?php echo $_SESSION['univers'] ?></h3>

                <div id="selection">
                    <label for="galaxie" class="select">Galaxie</label>
                    <select name="galaxie" id="galaxie_select">
                        <option value="" disabled selected hidden>--Choisissez une option--</option>
                        <option value="Galaxie 1">Galaxie 1</option>
                        <option value="Galaxie 2">Galaxie 2</option>
                        <option value="Galaxie 3">Galaxie 3</option>
                        <option value="Galaxie 4">Galaxie 4</option>
                        <option value="Galaxie 5">Galaxie 5</option>
                    </select>
                    <div class="v_line_univers"></div>
                    <label for="systeme_solaire" class="select">Système solaire</label>
                    <select name="systeme_solaire" id="systeme_solaire_select">
                        <option value="" disabled selected hidden>--Choisissez une option--</option>
                        <option value="Système solaire 1">Système solaire 1</option>
                        <option value="Système solaire 2">Système solaire 2</option>
                        <option value="Système solaire 3">Système solaire 3</option>
                        <option value="Système solaire 4">Système solaire 4</option>
                        <option value="Système solaire 5">Système solaire 5</option>
                        <option value="Système solaire 6">Système solaire 6</option>
                        <option value="Système solaire 7">Système solaire 7</option>
                        <option value="Système solaire 8">Système solaire 8</option>
                        <option value="Système solaire 9">Système solaire 9</option>
                        <option value="Système solaire 10">Système solaire 10</option>
                    </select>
                </div>
            </div>
            <div id="information">
                <div class="divTable" id=tableau_planete>
                    <div class="divTableHeading">
                        <div class="divTableCellDistanceHead"></div>
                        <div class="divTableCellImageHead"></div>
                        <div class="divTableCellHead">Nom</div>
                        <div class="divTableCellHead">Joueur</div>
                        <div class="divTableCellHead">Action</div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">1</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell"></div>
                        <div class="divTableCell"></div>
                        <div class="divTableCell"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>