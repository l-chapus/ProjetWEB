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
    <script src="../API/js/planete_nav.js"></script>
    <nav>
        <div id="ref_planete"></div>
        <img id="logo" src="ressources/nav/logo.png" alt="Logo ESIREM Galactique">
        <h1>ESIREM Galactique</h1>
        <div id="ressource">
            <div id="energie">
                <img src="ressources/nav/energie.png" alt="Logo énergie">
                <p><?php echo $_SESSION['energie'] ?></p>
            </div>
            <div class="v_line_ressource"></div>
            <div id="deuterium">
                <img src="ressources/nav/deuterium.png" alt="Logo deutérium">
                <p><?php echo $_SESSION['deuterium'] ?></p>
            </div>
            <div class="v_line_ressource"></div>
            <div id="metal">
                <img src="ressources/nav/metal.png" alt="Logo métal">
                <p><?php echo $_SESSION['metal'] ?></p>
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
            <button onclick="window.location.href = 'flottes.php';">Flottes</button>
        </sidebar>

        <div id="principale">
            <section id="recheche">
                <h3>Recherche</h3>
                <div class="h_line_table"></div>
                <div id="energie" class="categorie">
                    <img class="image_categorie">
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
                <div id="laser" class="categorie">
                    <img class="image_categorie">
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
                    <img class="image_categorie">
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
                    <img class="image_categorie">
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
                    <img class="image_categorie">
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