function ajout_event_listenner_infrastructure() {

    // Récupérer le bouton du laboratoire
    const laboratoire_recheche_boutton = document.getElementById("laboratoire_recheche_boutton");
    laboratoire_recheche_boutton.addEventListener("click", function () {
        if (laboratoire_recheche_boutton.className != "en_construction") {
            if (nombre_batiment()) {
                const laboratoire_recheche_metal = document.getElementById("laboratoire_recheche_metal");
                const laboratoire_recheche_energie = document.getElementById("laboratoire_recheche_energie");
                cout_metal = parseInt(laboratoire_recheche_metal.innerHTML.substring(8));
                cout_energie = parseInt(laboratoire_recheche_energie.innerHTML.substring(10));

                console.log(cout_metal);
                console.log(cout_energie);
                
                //laboratoire_recheche_boutton.classList.add("en_construction");
                //console.log(laboratoire_recheche_boutton.className);
            }

        }
    });

    // Récupérer le bouton du Chantier spatial
    const chantier_spatial_boutton = document.getElementById("chantier_spatial_boutton");
    chantier_spatial_boutton.addEventListener("click", function () {
        console.log("test2");
    });

    // Récupérer le bouton de l'usine de nanite
    const usine_nanite_boutton = document.getElementById("usine_nanite_boutton");
    usine_nanite_boutton.addEventListener("click", function () {
        console.log("test3");
    });

    // Récupérer le bouton de la mine de métal
    const mine_metal_boutton = document.getElementById("mine_metal_boutton");
    mine_metal_boutton.addEventListener("click", function () {
        console.log("test3");
    });

    // Récupérer le bouton de lu synthétiseur de deuterium
    const synthe_deuterium_boutton = document.getElementById("synthe_deuterium_boutton");
    synthe_deuterium_boutton.addEventListener("click", function () {
        console.log("test3");
    });

    // Récupérer le bouton de la centrale solaire
    const centrale_solaire_boutton = document.getElementById("centrale_solaire_boutton");
    centrale_solaire_boutton.addEventListener("click", function () {
        console.log("test3");
    });

    // Récupérer le bouton de l'usine de nanite
    const centrale_fusion_boutton = document.getElementById("centrale_fusion_boutton");
    centrale_fusion_boutton.addEventListener("click", function () {
        console.log("test3");
    });

    // Récupérer le bouton de l'artillerie laser
    const artillerie_laser_boutton = document.getElementById("artillerie_laser_boutton");
    artillerie_laser_boutton.addEventListener("click", function () {
        console.log("test3");
    });

    // Récupérer le bouton du cannon à ions
    const canon_ions_boutton = document.getElementById("canon_ions_boutton");
    canon_ions_boutton.addEventListener("click", function () {
        console.log("test3");
    });

    // Récupérer le bouton du bouclier
    const bouclier_boutton = document.getElementById("bouclier_boutton");
    bouclier_boutton.addEventListener("click", function () {
        console.log("test3");
    });
}

// renvoie true si on est en dessous de la limite et false si on est à la limite
function nombre_batiment() {
    return new Promise(function (resolve, reject) {
        const xmr = new XMLHttpRequest();

        xmr.onreadystatechange = function () {
            if (xmr.readyState === 4) {
                if (xmr.status === 200) {
                    if (xmr.responseText === "dessous") {
                        resolve(true);
                    } else {
                        resolve(false);
                    }
                } else {
                    reject(new Error("Une erreur s'est produite lors de la requête."));
                }
            }
        };

        xmr.open("GET", "../API/php/nombre_batiment.php", true);
        xmr.send();
    });
}