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
            <div id="chatier_spatial">
                <section id="chasseur">
                    <h3>Chasseurs</h3>
                    <img class="image_vaisseaux" src="/front/ressources/vaisseaux/chasseur.png" alt="Image du vaisseau chasseur">
                    <div class="info">
                        <p>Disponible : 0</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Métal : 3 000</p>
                        <p>Deutérium : 500</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Point d'attaque : 75</p>
                        <p>Point de défense: 50</p>
                    </div>
                    <div class="afficher">Nécessite le chantier spatial</div>
                    <button>
                        <div>Construire</div>
                        <div>20s</div>
                    </button>
                </section>

                <section id="croiseur">
                    <h3>Croiseurs</h3>
                    <img class="image_vaisseaux" src="/front/ressources/vaisseaux/croiseur.png" alt="Image du vaisseau croiseur">
                    <div class="info">
                        <p>Disponible : 0</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Métal : 20 000</p>
                        <p>Deutérium : 5 000</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Point d'attaque : 400</p>
                        <p>Point de défense: 150</p>
                    </div>
                    <div class="afficher">Nécessite le chantier spatial</div>
                    <div class="afficher">Nécessite la technologie ions niveau 4</div>
                    <button>
                        <div>Construire</div>
                        <div>120s</div>
                    </button>
                </section>

                <section id="transporteur">
                    <h3>Transporteurs</h3>
                    <img class="image_vaisseaux" src="/front/ressources/vaisseaux/transporteur.png" alt="Image du vaisseau transporteur">
                    <div class="info">
                        <p>Disponible : 0</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Métal : 6 000</p>
                        <p>Deutérium : 1 500</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Point d'attaque : 0</p>
                        <p>Point de défense: 50</p>
                        <p>Capacité de fret: 100 000</p>
                    </div>
                    <div class="afficher">Nécessite le chantier spatial</div>
                    <button>
                        <div>Construire</div>
                        <div>55s</div>
                    </button>
                </section>

                <section id="colonisation">
                    <h3>Vaisseau de colonisation</h3>
                    <img class="image_vaisseaux" src="/front/ressources/vaisseaux/colonisateur.png" alt="Image du vaisseau colonisateur">
                    <div class="info">
                        <p>Disponible : 0</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Métal : 10 000</p>
                        <p>Deutérium : 10 000</p>
                        <div class="h_line_vaisseaux"></div>
                        <p>Point d'attaque : 0</p>
                        <p>Point de défense: 50</p>
                    </div>
                    <button>
                        <div>Construire</div>
                        <div>120s</div>
                    </button>
                    <div class="reset">Nécessite le chantier spatial</div>
                </section>
            </div>

        </div>
    </div>
</body>

</html>