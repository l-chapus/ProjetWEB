window.addEventListener('load', () => {
    ressource_update();
});

function ressource_update() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const reponse = this.responseText;
            const params = reponse.split("|");
            const quantite_metal_bdd = params[0];
            niveau_mine = params[1];
            quantite_metal = parseFloat(quantite_metal_bdd);

            const quantite_deterium_bdd = params[2];
            niveau_synthetiseur = params[3];
            quantite_deuterium = parseFloat(quantite_deterium_bdd);

            const quantite_energie_bdd = params[4];
            niveau_centrale_solaire = params[5];
            niveau_centrale_fusion = params[6];
            quantite_energie = parseFloat(quantite_energie_bdd);

            quantite_energie_total = quantite_energie + 20 * 1.6 ** niveau_centrale_solaire + 50 * 2 ** niveau_centrale_fusion,
            document.getElementById("energie_count").innerHTML = Math.round(quantite_energie_total);
            document.getElementById("metal_count").innerHTML = Math.round(quantite_metal);
            document.getElementById("deuterium_count").innerHTML = Math.round(quantite_deuterium);

            prod_metal = 3 * 1.5 ** niveau_mine;
            prod_deuterium = 1 * 1.3 ** niveau_synthetiseur;

            // intervalle de 1000 millisecondes (1 seconde)
            setInterval(function () {
                quantite_metal += prod_metal / 60;
                quantite_deuterium += prod_deuterium / 60;
                document.getElementById("metal_count").innerHTML = Math.round(quantite_metal);
                document.getElementById("deuterium_count").innerHTML = Math.round(quantite_deuterium);
                document.getElementById("energie_count").innerHTML = Math.round(quantite_energie_total);
            }, 1000);
        }
    };
    xhr.open("GET", "../API/php/ressource_info.php", true);
    xhr.send();
}

function envoyer_ressource() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../API/php/ressource_info.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.status !== 200) {
            console.log("Erreur : " + xhr.statusText);
        }
    };

    xhr.send("energie=" + quantite_energie + "&metal=" + quantite_metal + "&deuterium=" + quantite_deuterium);
}