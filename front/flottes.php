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
    <link rel="stylesheet" href="style/style_flottes.css" />
</head>

<body>
    <nav>
        <div id="ref_planete">
            <img src="ressources/nav/planete.png" alt="Logo de la planète">
            G5-S8-P1
        </div>
        <img id="logo" src="ressources/nav/logo.png" alt="Logo ESIREM Galactique">
        <h1>ESIREM Galactique</h1>
        <div id="ressource">
            <div id="energie">
                <img src="ressources/nav/energie.png" alt="Logo énergie">
                <p>13322</p>
            </div>
            <div class="v_line_ressource"></div>
            <div id="deuterium">
                <img src="ressources/nav/deuterium.png" alt="Logo deutérium">
                <p>122</p>
            </div>
            <div class="v_line_ressource"></div>
            <div>
                <img src="ressources/nav/metal.png" alt="Logo métal">
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
            <button onclick="window.location.href = 'recherche.php';">Recherche</button>
            <button onclick="window.location.href = 'chantier_spatial.php';">Chantier spatial</button>
            <button>Flottes</button>
        </sidebar>

        <div id="principale">
            <div id="attaque">
                <div id="vaisseaux">
                    <section id="chasseur">
                        <h3>Chasseurs</h3>
                        <img class="image_vaisseaux" src="/front/ressources/vaisseaux/chasseur.png" alt="Image du vaisseau chasseur">
                        <p>Disponible : 0</p>
                        <input type="text" name="" id="" placeholder="Entrez une valeur">
                    </section>

                    <section id="croiseur">
                        <h3>Croiseurs</h3>
                        <img class="image_vaisseaux" src="/front/ressources/vaisseaux/croiseur.png" alt="Image du vaisseau croiseur">
                        <p>Disponible : 0</p>
                        <input type="text" name="" id="" placeholder="Entrez une valeur">
                    </section>

                    <section id="transporteur">
                        <h3>Transporteurs</h3>
                        <img class="image_vaisseaux" src="/front/ressources/vaisseaux/transporteur.png" alt="Image du vaisseau transporteur">
                        <p>Disponible : 0</p>
                        <input type="text" name="" id="" placeholder="Entrez une valeur">
                    </section>

                    <section id="colonisation">
                        <h3>Vaisseau colonisateur</h3>
                        <img class="image_vaisseaux" src="/front/ressources/vaisseaux/colonisateur.png" alt="Image du vaisseau colonisateur">
                        <p>Disponible : 0</p>
                        <input type="text" name="" id="" placeholder="Entrez une valeur">
                    </section>
                </div>
                <div id="selection">
                    <div id="univers">
                        <div class="select">
                            <label for="galaxie">Galaxie</label>
                            <select name="galaxie" id="galaxie_select">
                                <option value="" disabled selected hidden>--Choisissez une option--</option>
                                <option value="galaxie_1">Galaxie 1</option>
                                <option value="galaxie_2">Galaxie 2</option>
                                <option value="galaxie_3">Galaxie 3</option>
                                <option value="galaxie_4">Galaxie 4</option>
                                <option value="galaxie_5">Galaxie 5</option>
                            </select>
                        </div>
                        <div class="select">
                            <label for="systeme_solaire">Système solaire</label>
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
                        <div class="select">
                            <label for="planete">Planète</label>
                            <select name="planete" id="planete_select">
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
                    <div id="action">
                        <button class="boutton_action">Attaquer</button>
                        <button class="boutton_action">Coloniser</button>
                    </div>
                </div>
            </div>
            <div id="v_line_principale"></div>
            <div id="rapport">
                <div id="rapport_historique">
                    <h3>Rapports de combat</h3>
                    <div>test1</div>
                    <div>test1</div>
                    <div>test1</div>
                </div>
                <div id="h_line_rapport"></div>
                <div id="rapport_détails">

                </div>
            </div>
        </div>
    </div>
</body>

</html>