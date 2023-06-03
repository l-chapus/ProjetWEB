function ajout_event_listenner_chantier_spatial() {

    possede_chantier_spatial()
        .then(function (result) {

            const chantier_spatial = result;

            const chasseur_chantier = document.getElementById("chasseur_chantier");
            const croiseur_chantier = document.getElementById("croiseur_chantier");
            const transporteur_chantier = document.getElementById("transporteur_chantier");
            const colonisateur_chantier = document.getElementById("colonisateur_chantier");

            if (chantier_spatial) {
                chasseur_chantier.classList.replace('afficher', 'cacher');
                croiseur_chantier.classList.replace('afficher', 'cacher');
                transporteur_chantier.classList.replace('afficher', 'cacher');
                colonisateur_chantier.classList.replace('afficher', 'cacher');

               
                //if (ions_niveau >= 5) {
                //    laser_techno_energie_5.classList.replace('afficher', 'cacher');
                //}
                

                // Récupérer le bouton du chasseur
                const chasseur_bouton = document.getElementById("chasseur_bouton");
                chasseur_bouton.addEventListener("click", function () {
                    if (chasseur_bouton.className != "en_construction") {

                        const chasseur_metal = document.getElementById("chasseur_metal");
                        const chasseur_deuterium = document.getElementById("chasseur_deuterium");
                        const chasseur_temps = document.getElementById("chasseur_temps");
                        const chasseur_quantite = document.getElementById("chasseur_quantite");

                        cout_metal = parseInt(chasseur_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(chasseur_deuterium.innerHTML.substring(12));
                        temps = parseInt(chasseur_temps.innerHTML);
                        quantite = parseInt(chasseur_quantite.innerHTML.substring(13));
                        

                        if (cout_deuterium < quantite_deuterium && cout_metal < quantite_metal) {
                            quantite_deuterium -= cout_deuterium;
                            quantite_metal -= cout_metal;
                            augmenter_quantite_date_fin_chantier_spatial(1, quantite + 1, temps);

                        //change la classe
                            ajouter_classe_en_construction_chantier_spatial("en_construction");
                            envoyer_ressource();
                            construction_vaisseau();
                        }

                    }
                });

                // Récupérer le bouton du croiseur
                const croiseur_bouton = document.getElementById("croiseur_bouton");
                croiseur_bouton.addEventListener("click", function () {
                    if (croiseur_bouton.className != "en_construction") {

                        const croiseur_metal = document.getElementById("croiseur_metal");
                        const croiseur_deuterium = document.getElementById("croiseur_deuterium");
                        const croiseur_temps = document.getElementById("croiseur_temps");
                        const croiseur_quantite = document.getElementById("croiseur_quantite");

                        cout_metal = parseInt(croiseur_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(croiseur_deuterium.innerHTML.substring(12));
                        temps = parseInt(croiseur_temps.innerHTML);
                        quantite = parseInt(croiseur_quantite.innerHTML.substring(13));
                        

                        if (cout_deuterium < quantite_deuterium && cout_metal < quantite_metal) {
                            quantite_deuterium -= cout_deuterium;
                            quantite_metal -= cout_metal;
                            augmenter_quantite_date_fin_chantier_spatial(2, quantite + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_chantier_spatial("en_construction");
                            envoyer_ressource();
                            construction_vaisseau();
                        }

                    }
                });

                // Récupérer le bouton du transporteur
                const transporteur_bouton = document.getElementById("transporteur_bouton");
                transporteur_bouton.addEventListener("click", function () {
                    if (transporteur_bouton.className != "en_construction") {

                        const transporteur_metal = document.getElementById("transporteur_metal");
                        const transporteur_deuterium = document.getElementById("transporteur_deuterium");
                        const transporteur_temps = document.getElementById("transporteur_temps");
                        const transporteur_quantite = document.getElementById("transporteur_quantite");

                        cout_metal = parseInt(transporteur_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(transporteur_deuterium.innerHTML.substring(12));
                        temps = parseInt(transporteur_temps.innerHTML);
                        quantite = parseInt(transporteur_quantite.innerHTML.substring(13));

                        if (cout_deuterium < quantite_deuterium && cout_metal < quantite_metal) {
                            quantite_deuterium -= cout_deuterium;
                            quantite_metal -= cout_metal;
                            augmenter_quantite_date_fin_chantier_spatial(3, quantite + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_chantier_spatial("en_construction");
                            envoyer_ressource();
                            construction_vaisseau();
                        }

                    }
                });

                // Récupérer le bouton du vaisseau de colonisation
                const colonisateur_bouton = document.getElementById("colonisateur_bouton");
                colonisateur_bouton.addEventListener("click", function () {
                    if (colonisateur_bouton.className != "en_construction") {

                        const colonisateur_metal = document.getElementById("colonisateur_metal");
                        const colonisateur_deuterium = document.getElementById("colonisateur_deuterium");
                        const colonisateur_temps = document.getElementById("colonisateur_temps");
                        const colonisateur_quantite = document.getElementById("colonisateur_quantite");

                        cout_metal = parseInt(colonisateur_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(colonisateur_deuterium.innerHTML.substring(12));
                        temps = parseInt(colonisateur_temps.innerHTML);
                        quantite= parseInt(colonisateur_quantite.innerHTML.substring(13));

                        if (cout_deuterium < quantite_deuterium && cout_metal < quantite_metal) {
                            quantite_deuterium -= cout_deuterium;
                            quantite_metal -= cout_metal;
                            augmenter_quantite_date_fin_chantier_spatial(4, quantite + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_chantier_spatial("en_construction");
                            envoyer_ressource();
                            construction_vaisseau();
                        }

                    }
                });

            }
            else {
                ajouter_classe_en_construction_chantier_spatial("en_construction");
                chasseur_chantier.classList.replace('cacher', 'afficher');
                croiseur_chantier.classList.replace('cacher', 'afficher');
                transporteur_chantier.classList.replace('cacher', 'afficher');
                colonisateur_chantier.classList.replace('cacher', 'afficher');
            }
        })
}


function ajouter_classe_en_construction_chantier_spatial(classe) {
    const chasseur_bouton = document.getElementById("chasseur_bouton");
    const croiseur_bouton = document.getElementById("croiseur_bouton");
    const transporteur_bouton = document.getElementById("transporteur_bouton");
    const colonisateur_bouton = document.getElementById("colonisateur_bouton");

    if (classe == "en_construction") {
        chasseur_bouton.classList.replace("libre", "en_construction");
        croiseur_bouton.classList.replace("libre", "en_construction");
        transporteur_bouton.classList.replace("libre", "en_construction");
        colonisateur_bouton.classList.replace("libre", "en_construction");
    }

    if (classe == "libre") {
        chasseur_bouton.classList.replace("en_construction", "libre");
        croiseur_bouton.classList.replace("en_construction", "libre");
        transporteur_bouton.classList.replace("en_construction", "libre");
        colonisateur_bouton.classList.replace("en_construction", "libre");
    }
}

function possede_chantier_spatial() {

    return new Promise(function (resolve, reject) {
        const xmr = new XMLHttpRequest();

        xmr.onreadystatechange = function () {
            if (xmr.readyState === 4) {
                if (xmr.status === 200) {
                    if (xmr.responseText === "possede") {
                        resolve(true);
                    } else {
                        resolve(false);
                    }
                } else {
                    reject(new Error("Une erreur s'est produite lors de la requête."));
                }
            }
        };

        xmr.open("GET", "../API/php/possede_chantier_spatial.php", true);
        xmr.send();
    });
}

function augmenter_quantite_date_fin_chantier_spatial(vaisseau, quantite, temps) {
    const date = new Date();

    let secondes = date.getSeconds() + temps;
    let minutes = date.getMinutes();
    let heures = date.getHours();
    let jour = date.getDate();

    if (secondes > 60) {
        minutes += Math.floor(secondes / 60);
        secondes -= Math.floor(secondes / 60) * 60;
        if (minutes > 60) {
            heures += Math.floor(minutes / 60);
            minutes -= Math.floor(minutes / 60) * 60;
            if (heures > 24) {
                jour += Math.floor(heures / 24) * 24;
                heures -= Math.floor(heures / 24);
            }
        }
    }

    const annee = date.getFullYear();
    const mois = ("0" + (date.getMonth() + 1)).slice(-2);
    jour = ("0" + jour).slice(-2);
    heures = ("0" + heures).slice(-2);
    minutes = ("0" + minutes).slice(-2);
    secondes = ("0" + secondes).slice(-2);

    const date_fin_chantier_spatial = annee + "-" + mois + "-" + jour + " " + heures + ":" + minutes + ":" + secondes;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../API/php/chantier_spatial_niveau_date.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.status !== 200) {
            console.log("Erreur : " + xhr.statusText);
        }
    };

    xhr.send("quantite=" + quantite + "&vaisseau=" + vaisseau + "&date_fin=" + date_fin_chantier_spatial);
}