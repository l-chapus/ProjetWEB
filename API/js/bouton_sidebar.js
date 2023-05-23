window.addEventListener('load', () => {
    
    // Récupérer le bouton de la galaxie
    const galaxie_boutton = document.getElementById("galaxie_sidebar_bouton");
    galaxie_boutton.addEventListener("click", function () {
        envoyer_ressource();
        window.location.href = "../front/galaxie.php";
    });

    // Récupérer le bouton des infrastructures
    const infrastructure_sidebar_bouton = document.getElementById("infrastructure_sidebar_bouton");
    infrastructure_sidebar_bouton.addEventListener("click", function () {
        envoyer_ressource();
        window.location.href = "../front/infrastructures.php";
    });

    // Récupérer le bouton des recherches
    const recherche_sidebar_bouton = document.getElementById("recherche_sidebar_bouton");
    recherche_sidebar_bouton.addEventListener("click", function () {
        envoyer_ressource();
        window.location.href = "../front/recherche.php";
    });

    // Récupérer le bouton du Chantier spatial
    const chantier_spatial_boutton = document.getElementById("chatier_spatial_sidebar_bouton");
    chantier_spatial_boutton.addEventListener("click", function () {
        envoyer_ressource();
        window.location.href = "../front/chantier_spatial.php";
    });

    // Récupérer le bouton de la flottes
    const flottes_sidebar_bouton = document.getElementById("flottes_sidebar_bouton");
    flottes_sidebar_bouton.addEventListener("click", function () {
        envoyer_ressource();
        window.location.href = "../front/flottes.php";
    });
});