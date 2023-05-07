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
    <link rel="stylesheet" href="style/style_galaxie.css" />
</head>

<body>
    <script src="../API/js/session.js"></script>

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
            <button>Galaxie</button>
            <button onclick="window.location.href = 'infrastructures.php';">Infrastructure</button>
            <button onclick="window.location.href = 'recherche.php';">Recherche</button>
            <button onclick="window.location.href = 'chantier_spatial.php';">Chantier spatial</button>
            <button onclick="window.location.href = 'flottes.php';">Flottes</button>
        </sidebar>

        <div id="principale">
            <img id="image_fond" src="/front/ressources/background_galaxie3.jpg" alt="Image de fond">

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
            <div id="information">
                <div class="divTable">
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
                        <div class="divTableCellImage">
                            <img src="/front/ressources/planetes/pla1.png" alt="image planete 2">
                        </div>
                        <div class="divTableCell">Planète 1</div>
                        <div class="divTableCell"> <?php echo $_SESSION['pseudo'] ?> </div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 1">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">2</div>
                        <div class="divTableCellImage">
                            <img src="/front/ressources/planetes/pla11.png" alt="image planete 2">
                        </div>
                        <div class="divTableCell">val1</div>
                        <div class="divTableCell"></div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 2">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">3</div>
                        <div class="divTableCellImage">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 3">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">4</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 4">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">5</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 5">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">6</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 6">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">7</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 7">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">8</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 8">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">9</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 9">
                        </div>
                    </div>
                    <div class="h_line_table"></div>
                    <div class="h_line_table_distance"></div>
                    <div class="divTableRow">
                        <div class="divTableCellDistance">10</div>
                        <div class="divTableCellImage"></div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">
                            <img class="divTableImage" src="/front/ressources/vaisseaux_attaque.png" alt="boutton attaque planete 10">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>