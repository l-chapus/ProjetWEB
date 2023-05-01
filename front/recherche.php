<?php
session_start();
if (!$_SESSION) {
    header("Location:index.html");
}?>

<!DOCTYPE html>
<html lang="fr">

    <head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ESIREM Galactique</title>
        <link rel="stylesheet" href="style/style_recherche.css" />
    </head>

    <body>
        <nav>
            <img id="logo" src="ressources/logo.png" alt="Logo ESIREM Galactique">
            <h1>ESIREM Galactique</h1>
            <div id="ressource">
                <div id="energie">
                    <img src="ressources/energie.png" alt="Logo énergie">
                    <p>13322</p>
                </div>
                <div class="v_line_ressource"></div>
                <div id="deuterium">
                    <img src="ressources/deuterium.png" alt="Logo deutérium">
                    <p>122</p>
                </div>
                <div class="v_line_ressource"></div>
                <div>
                    <img src="ressources/metal.png" alt="Logo métal">
                    <p>122</p>
                </div>
            </div>
        </nav>
        <div id="page"> 
            <sidebar>
                <div id="pseudo">
                    <?php echo $_SESSION['pseudo'] ?>
                </div>
                <button onclick="window.location.href = 'galaxie.php';">Galaxie</button>
                <button onclick="window.location.href = 'infrastructures.php';">Infrastructure</button>
                <button>Recherche</button>
                <button onclick="window.location.href = 'chantier_spatial.php';">Chantier spatial</button>
            </sidebar>

            <div>
                <div>de chose a écrire</div> 
                <div>akbekzbvkhbz</div>
            </div>
        </div>  
    </body>

</html>