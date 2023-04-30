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
        <video autoplay muted loop>
                <source src="ressources/background_galaxie.mp4">
        </video>
        <sidebar>
            <button>Galaxie</button>
            <button onclick="window.location.href = 'infrastructures.html';">Infrastructure</button>
            <button onclick="window.location.href = 'recherche.html';">Recherche</button>
            <button onclick="window.location.href = 'chantier_spatial.html';">Chantier spatial</button>
        </sidebar>

        <div id="principale">
            <div id="univers">
                <h3>Univers choisi : <?php echo $_SESSION['univers'] ?></h3>

                <div id="selection">
                    <label for="galaxie" class="select">Galaxie</label>
                    <select name="galaxie" id="galaxie_select">
                        <option value="" disabled selected hidden>--Choisissez une option--</option>
                        <option value="galaxie_1">Galaxie 1</option>
                        <option value="galaxie_2">Galaxie 2</option>
                        <option value="galaxie_3">Galaxie 3</option>
                        <option value="galaxie_4">Galaxie 4</option>
                        <option value="galaxie_5">Galaxie 5</option>
                    </select>
                    <div class="v_line_univers"></div>
                    <label for="systeme_solaire" class="select">Système solaire</label>
                    <select name="systeme_solaire" id="systeme_solaire_select">
                        <option value="" disabled selected hidden>--Choisissez une option--</option>
                        <option value="systeme_solaire_1">Système solaire 1</option>
                        <option value="systeme_solaire_2">Système solaire 2</option>
                        <option value="systeme_solaire_3">Système solaire 3</option>
                        <option value="systeme_solaire_4">Système solaire 4</option>
                        <option value="systeme_solaire_5">Système solaire 5</option>
                        <option value="systeme_solaire_6">Système solaire 6</option>
                        <option value="systeme_solaire_7">Système solaire 7</option>
                        <option value="systeme_solaire_8">Système solaire 8</option>
                        <option value="systeme_solaire_9">Système solaire 9</option>
                        <option value="systeme_solaire_10">Système solaire 10</option>
                    </select>
                </div>
            </div>
            <div class="divTable">
                <div class="divTableHeading">
                    <div class="divTableCell">Distance</div>
                    <div class="divTableCell">Nom</div>
                    <div class="divTableCell">Joueur</div>
                    <div class="divTableCell">?</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">1</div>
                    <div class="divTableCell">val1</div>
                    <div class="divTableCell">val1</div>
                    <div class="divTableCell">val1</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">2</div>
                    <div class="divTableCell">val1</div>
                    <div class="divTableCell">val1</div>
                    <div class="divTableCell">val1</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">3</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">4</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">5</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">6</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">7</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">8</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">9</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="h_line_table"></div>
                <div class="divTableRow">
                    <div class="divTableCell">10</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
            </div>

            <div contentEditable="true">de chose a écrire</div>
            <div><?php echo $_SESSION['univers'] . ' ' . $_SESSION['email']; ?></div>
        </div>
    </div>

</body>

</html>