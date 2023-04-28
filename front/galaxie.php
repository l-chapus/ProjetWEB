<?php
    session_start();

    if(!$_SESSION){
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
        <nav>
            <img id="logo" src="ressources/logo.png" alt="Logo ESIREM Galactique">
            <h1>ESIREM Galactique</h1>
            <div id="ressource">
                <div id="energie">
                    <img src="ressources/energie.png" alt="Logo énergie">
                    <p>13322</p>
                </div>
                <div id="deuterium">
                    <img src="ressources/deuterium.png" alt="Logo deutérium">
                    <p>122</p>
                </div>
                <div>
                    <img src="ressources/metal.png" alt="Logo métal">
                    <p>122</p>
                </div>
            </div>
        </nav>
        <div id="page"> 
            <sidebar>
                <button>Galaxie</button>
                <button onclick="window.location.href = 'infrastructures.html';">Infrastructure</button>
                <button onclick="window.location.href = 'recherche.html';">Recherche</button>
                <button onclick="window.location.href = 'chantier_spatial.html';">Chantier spatial</button>
            </sidebar>

            <div>
                <div contentEditable="true">de chose a écrire</div> 
                <div><?php echo $_SESSION['univers'].' '.$_SESSION['email']; ?></div>
            </div>
        </div>  

    </body>

</html>