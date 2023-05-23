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
    <link rel="stylesheet" href="style/style_infrastructures.css" />
</head>

<body>
    <script src="../API/js/planete_nav.js"></script>
    <script src="../API/js/bouton_sidebar.js"></script>
    <script src="../API/js/ressource_manager.js"></script>
    
    <script src="../API/js/affichage_infractructure.js"></script>
    <script src='../API/js/construction.js'></script>
    

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

            <section id="installation">
                <h3>Installations</h3>
                <div class="h_line_table"></div>
                <div id="labo_de_recheche" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Laboratoire de recheche</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 1 000</p>
                        <p>Energie : 500</p>
                    </div>
                    <button id="labo_de_recheche_boutton">
                        <div>Construire</div>
                        <div>50s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="chantier_spatial" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Chantier spatial</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 500</p>
                        <p>Energie : 500</p>
                    </div>
                    <button id="chantier_spatial_boutton">
                        <div>Construire</div>
                        <div>50s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="usine_nanite" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Usine de nanites</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 1 000</p>
                        <p>Energie : 5 000</p>
                    </div>
                    <button id="usine_nanite_boutton">
                        <div>Construire</div>
                        <div>10 minutes</div>
                    </button>
                </div>
            </section>

            <section id="ressources">
                <h3>Ressources</h3>
                <div class="h_line_table"></div>
                <div id="mine_metal" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Mine de métal</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 100</p>
                        <p>Energie : 10</p>
                        <p>Production : 3 / minutes</p>
                    </div>
                    <button id="mine_metal_boutton">
                        <div>Construire</div>
                        <div>10s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="synthe_deuterium" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Sythétiseur de deuterium</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 200</p>
                        <p>Energie : 50</p>
                        <p>Production : 1 / minutes</p>
                    </div>
                    <button id="synthe_deuterium_boutton">
                        <div>Construire</div>
                        <div>25s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="centrale_solaire" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Centrale solaire</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 150</p>
                        <p>Deuterium : 20</p>
                        <p>Production : 20</p>
                    </div>
                    <button id="centrale_solaire_boutton">
                        <div>Construire</div>
                        <div>10s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="centrale_fusion" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Centrale à fusion</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 5 000</p>
                        <p>Deuterium : 2 000</p>
                        <p>Production : 50</p>
                    </div>
                    <button id="centrale_fusion_boutton">
                        <div>Construire</div>
                        <div>2 minutes</div>
                    </button>
                </div>
            </section>

            <section id="defense">
                <h3>Défense</h3>
                <div class="h_line_table"></div>
                <div id="artillerie_laser" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Artillerie laser</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 150</p>
                        <p>Deuterium : 20</p>
                        <p>Point d'attaque : 100</p>
                        <p>Point de défense : 25</p>
                    </div>
                    <button id="artillerie_laser_boutton">
                        <div>Construire</div>
                        <div>10s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="canon_ions" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Canon à ions</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 5 000</p>
                        <p>Deuterium : 1 000</p>
                        <p>Point d'attaque : 250</p>
                        <p>Point de défense : 200</p>
                    </div>
                    <button id="canon_ions_boutton">
                        <div>Construire</div>
                        <div>40s</div>
                    </button>
                </div>
                <div class="h_line_table"></div>
                <div id="bouclier" class="categorie">
                    <img class="image_categorie" src="ressources/infrastructures/marteau.png" alt="Image de marteau">
                    <div>
                        <p>Bouclier</p>
                        <p>Niveau actuel : 0</p>
                        <p>Métal : 10 000</p>
                        <p>Deuterium : 5 000</p>
                        <p>Energie : 1 000</p>
                        <p>Point d'attaque : 0</p>
                        <p>Point de défense : 2 000</p>
                    </div>
                    <button id="bouclier_boutton">
                        <div>Construire</div>
                        <div>60s</div>
                    </button>
                </div>
            </section>
        </div>
    </div>
</body>

</html>