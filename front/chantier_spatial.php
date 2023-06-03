<?php
session_start();
if (!$_SESSION) {
    header("Location:index.html");
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESIREM Galactique</title>
    <link rel="stylesheet" href="style/style_chantier_spatial.css" />
</head>

<body>
    <script src="../API/js/bouton_sidebar.js"></script>
    <script src="../API/js/ressource_manager.js"></script>    
    <script src="../API/js/planete_nav.js"></script>

    <script src="../API/js/affichage_chantier_spatial.js"></script>

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


        <div id="principale"></div>
    </div>
</body>

</html>