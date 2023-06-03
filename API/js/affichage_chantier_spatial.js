window.addEventListener('load', () => {

    // Affichage des recherches avec les bonnes informations
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../API/php/afficher_chantier_spatial.php', true);
    xhr.onload = function () {
        document.getElementById("principale").innerHTML = xhr.responseText;
    };
    xhr.send();


    // Attend que la page est fini de se générer
    setTimeout(function () {
        ajout_event_listenner_chantier_spatial();
        construction_vaisseau();
    }, 100);
});

function construction_vaisseau() {
    // Récupération de la date de fin
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../API/php/vaisseau_en_construction.php', true);
    xhr.onload = function () {
        const dateFin = xhr.responseText;

        if (dateFin) {
            let interval_ID_chantier_spatial = null;

            ajouter_classe_en_construction_chantier_spatial("en_construction");

            // intervalle de 1000 millisecondes (1 seconde)
            interval_ID_chantier_spatial = setInterval(function () {
                const date = new Date();

                const annee = date.getFullYear();
                const mois = ("0" + (date.getMonth() + 1)).slice(-2);
                const jour = ("0" + date.getDate()).slice(-2);
                const heures = ("0" + date.getHours()).slice(-2);
                const minutes = ("0" + date.getMinutes()).slice(-2);
                const secondes = ("0" + date.getSeconds()).slice(-2);

                const datetime = annee + "-" + mois + "-" + jour + " " + heures + ":" + minutes + ":" + secondes;

                if (datetime > dateFin) {
                    ajouter_classe_en_construction_chantier_spatial("libre");
                    reset_date_chantier_spatial();
                    clearInterval(interval_ID_chantier_spatial);
                    interval_ID_chantier_spatial = null; // Réinitialiser la variable de l'ID de l'intervalle
                    // Rafraîchir la page actuelle
                    location.reload();
                }
                else {
                    ajouter_classe_en_construction_chantier_spatial("en_construction");
                }

            }, 1000);
        }
    };
    xhr.send();
}
function reset_date_chantier_spatial(){
    // reset des la date de fin de la recherche
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../API/php/vaisseau_en_construction.php', true);
    xhr.send();
}