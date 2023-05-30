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
    <link rel="stylesheet" href="style/style_recherche.css" />
</head>

<body>
    <script src="../API/js/bouton_sidebar.js"></script>
    <script src="../API/js/ressource_manager.js"></script>    
    <script src="../API/js/planete_nav.js"></script>

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
        </sidebar>

        <div id="principale">
            <section id="recheche">
                <h3>Recherche</h3>
                <div class="h_line_table"></div>
                <div id="energie" class="categorie">
                    <img class="image_categorie" src="ressources/recherche/energie.png" alt="Logo de la recherche énergie">
                    <div>
                        <p>Energie</p>
                        <p>Niveau actuel : 0</p>
                        <p>Deutérium : 100</p>
                        <p class="afficher">Nécessite le laboratoire de recherche</p>
                    </div>
                    <button>
                        <div>Rechercher</div>
                        <div>4s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="energie" class="categorie">
                    <img class="image_categorie" src="ressources/recherche/intelligence_artificielle.png" alt="Logo de la recherche énergie">
                    <div>
                        <p>Intelligence artificielle</p>
                        <p>Niveau actuel : 0</p>
                        <p>Deutérium : 200</p>
                        <p class="afficher">Nécessite le laboratoire de recherche</p>
                    </div>
                    <button>
                        <div>Rechercher</div>
                        <div>10s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="laser" class="categorie">
                    <img class="image_categorie" src="ressources/recherche/laser.png" alt="Logo de la recherche laser">
                    <div>
                        <p>Laser</p>
                        <p>Niveau actuel : 0</p>
                        <p>Deutérium : 300</p>
                        <p class="afficher">Nécessite le laboratoire de recherche</p>
                        <p class="afficher">Nécessite la recherche Energie niveau 5</p>
                    </div>
                    <button>
                        <div>Rechercher</div>
                        <div>2s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="ions" class="categorie">
                    <img class="image_categorie" src="ressources/recherche/ions.png" alt="Logo de la recherche ions">
                    <div>
                        <p>Ions</p>
                        <p>Niveau actuel : 0</p>
                        <p>Deutérium : 300</p>
                        <p class="afficher">Nécessite le laboratoire de recherche</p>
                        <p class="afficher">Nécessite la recherche Laser niveau 5</p>
                    </div>
                    <button>
                        <div>Rechercher</div>
                        <div>8s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="bouclier" class="categorie">
                    <img class="image_categorie" src="ressources/recherche/bouclier.png" alt="Logo de la recherche bouclier">
                    <div>
                        <p>Bouclier</p>
                        <p>Niveau actuel : 0</p>
                        <p>Deutérium : 1 000</p>
                        <p class="afficher">Nécessite le laboratoire de recherche</p>
                        <p class="afficher">Nécessite la recherche Energie niveau 8</p>
                        <p class="afficher">Nécessite la recherche Ions niveau 2</p>
                    </div>
                    <button>
                        <div>Rechercher</div>
                        <div>5s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="armement" class="categorie">
                    <img class="image_categorie" src="ressources/recherche/armement.png" alt="Logo de la recherche armement">
                    <div>
                        <p>Armement</p>
                        <p>Niveau actuel : 0</p>
                        <p>Deutérium : 200</p>
                        <p>Métal : 500</p>
                        <p class="afficher">Nécessite le laboratoire de recherche</p>
                    </div>
                    <button>
                        <div>Rechercher</div>
                        <div>6s</div>
                    </button>
                </div>
            </section>

        </div>
    </div>
</body>

</html>