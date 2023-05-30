window.addEventListener('load', () => {
    afficher_infra();
});

// On passe par un fonction pour pouvoir l'appeller dans d'autres javascript
function afficher_infra() {

    // Affichage des sections avec les bonnes informations
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../API/php/afficher_infrastructure.php', true);
    xhr.onload = function () {
        document.getElementById("principale").innerHTML = xhr.responseText;
    };
    xhr.send();


    //attend que la page est fini de se générer
    setTimeout(function () {
        ajout_event_listenner_infrastructure();
        construction_batiment();
    }, 500);

}

function construction_batiment() {
    // Récupération de la date de fin
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../API/php/batiment_en_construction.php', true);
    xhr.onload = function () {
        const dateFin = xhr.responseText;
                
        if (dateFin) {
            let intervalID = null;
    
            // intervalle de 1000 millisecondes (1 seconde)
            intervalID = setInterval(function () {
                const date = new Date();
    
                const annee = date.getFullYear();
                const mois = ("0" + (date.getMonth() + 1)).slice(-2);
                const jour = ("0" + date.getDate()).slice(-2);
                const heures = ("0" + date.getHours()).slice(-2);
                const minutes = ("0" + date.getMinutes()).slice(-2);
                const secondes = ("0" + date.getSeconds()).slice(-2);
    
                const datetime = annee + "-" + mois + "-" + jour + " " + heures + ":" + minutes + ":" + secondes;
    
                if (datetime > dateFin) {
                    ajouter_classe_en_construction("libre");
                    reset_date_batiment();
                    clearInterval(intervalID);
                    intervalID = null; // Réinitialiser la variable de l'ID de l'intervalle
                    // Rafraîchir la page actuelle
                    location.reload();
                }
                else {
                    ajouter_classe_en_construction("en_construction");
                }
    
            }, 1000);
        }
    };
    xhr.send();
    
}

function reset_date_batiment() {
    // Affichage des sections avec les bonnes informations
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../API/php/batiment_en_construction.php', true);
    xhr.send();
}