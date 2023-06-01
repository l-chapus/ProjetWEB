function ajout_event_listenner_infrastructure() {


    nombre_batiment()
        .then(function (result) {
            const batiment = result;

            // Récupérer le bouton du laboratoire
            const laboratoire_recheche_boutton = document.getElementById("laboratoire_recheche_boutton");
            laboratoire_recheche_boutton.addEventListener("click", function () {
                if (laboratoire_recheche_boutton.className != "en_construction") {
                    if (batiment) {
                        const laboratoire_recheche_metal = document.getElementById("laboratoire_recheche_metal");
                        const laboratoire_recheche_energie = document.getElementById("laboratoire_recheche_energie");
                        const laboratoire_recheche_niveau = document.getElementById("laboratoire_recheche_niveau");
                        const laboratoire_recheche_temps = document.getElementById("laboratoire_recheche_temps");

                        cout_metal = parseInt(laboratoire_recheche_metal.innerHTML.substring(8));
                        cout_energie = parseInt(laboratoire_recheche_energie.innerHTML.substring(10));
                        niveau = parseInt(laboratoire_recheche_niveau.innerHTML.substring(16));
                        temps = parseInt(laboratoire_recheche_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_energie < quantite_energie_total) {
                            quantite_metal -= cout_metal;
                            quantite_energie -= cout_energie;
                            augmenter_niveau_date_fin(1, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton du Chantier spatial
            const chantier_spatial_boutton = document.getElementById("chantier_spatial_boutton");
            chantier_spatial_boutton.addEventListener("click", function () {
                if (chantier_spatial_boutton.className != "en_construction") {
                    if (batiment) {
                        const chantier_spatial_metal = document.getElementById("chantier_spatial_metal");
                        const chantier_spatial_energie = document.getElementById("chantier_spatial_energie");
                        const chantier_spatial_niveau = document.getElementById("chantier_spatial_niveau");
                        const chantier_spatial_temps = document.getElementById("chantier_spatial_temps");

                        cout_metal = parseInt(chantier_spatial_metal.innerHTML.substring(8));
                        cout_energie = parseInt(chantier_spatial_energie.innerHTML.substring(10));
                        niveau = parseInt(chantier_spatial_niveau.innerHTML.substring(16));
                        temps = parseInt(chantier_spatial_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_energie < quantite_energie_total) {
                            quantite_metal -= cout_metal;
                            quantite_energie -= cout_energie;
                            augmenter_niveau_date_fin(2, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton de l'usine de nanite
            const usine_nanite_boutton = document.getElementById("usine_nanite_boutton");
            usine_nanite_boutton.addEventListener("click", function () {
                if (usine_nanite_boutton.className != "en_construction") {
                    if (batiment) {
                        const usine_nanite_metal = document.getElementById("usine_nanite_metal");
                        const usine_nanite_energie = document.getElementById("usine_nanite_energie");
                        const usine_nanite_niveau = document.getElementById("usine_nanite_niveau");
                        const usine_nanite_temps = document.getElementById("usine_nanite_temps");

                        cout_metal = parseInt(usine_nanite_metal.innerHTML.substring(8));
                        cout_energie = parseInt(usine_nanite_energie.innerHTML.substring(10));
                        niveau = parseInt(usine_nanite_niveau.innerHTML.substring(16));
                        temps = parseInt(usine_nanite_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_energie < quantite_energie_total) {
                            quantite_metal -= cout_metal;
                            quantite_energie -= cout_energie;
                            augmenter_niveau_date_fin(3, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton de la mine de métal
            const mine_metal_boutton = document.getElementById("mine_metal_boutton");
            mine_metal_boutton.addEventListener("click", function () {
                if (mine_metal_boutton.className != "en_construction") {
                    if (batiment) {
                        const mine_metal_metal = document.getElementById("mine_metal_metal");
                        const mine_metal_energie = document.getElementById("mine_metal_energie");
                        const mine_metal_niveau = document.getElementById("mine_metal_niveau");
                        const mine_metal_temps = document.getElementById("mine_metal_temps");

                        cout_metal = parseInt(mine_metal_metal.innerHTML.substring(8));
                        cout_energie = parseInt(mine_metal_energie.innerHTML.substring(10));
                        niveau = parseInt(mine_metal_niveau.innerHTML.substring(16));
                        temps = parseInt(mine_metal_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_energie < quantite_energie_total) {
                            quantite_metal -= cout_metal;
                            quantite_energie -= cout_energie;
                            augmenter_niveau_date_fin(4, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton de lu synthétiseur de deuterium
            const synthe_deuterium_boutton = document.getElementById("synthe_deuterium_boutton");
            synthe_deuterium_boutton.addEventListener("click", function () {
                if (synthe_deuterium_boutton.className != "en_construction") {
                    if (batiment) {
                        const synthe_deuterium_metal = document.getElementById("synthe_deuterium_metal");
                        const synthe_deuterium_energie = document.getElementById("synthe_deuterium_energie");
                        const synthe_deuterium_niveau = document.getElementById("synthe_deuterium_niveau");
                        const synthe_deuterium_temps = document.getElementById("synthe_deuterium_temps");

                        cout_metal = parseInt(synthe_deuterium_metal.innerHTML.substring(8));
                        cout_energie = parseInt(synthe_deuterium_energie.innerHTML.substring(10));
                        niveau = parseInt(synthe_deuterium_niveau.innerHTML.substring(16));
                        temps = parseInt(synthe_deuterium_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_energie < quantite_energie_total) {
                            quantite_metal -= cout_metal;
                            quantite_energie -= cout_energie;
                            augmenter_niveau_date_fin(5, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton de la centrale solaire
            const centrale_solaire_boutton = document.getElementById("centrale_solaire_boutton");
            centrale_solaire_boutton.addEventListener("click", function () {
                if (centrale_solaire_boutton.className != "en_construction") {
                    if (batiment) {
                        const centrale_solaire_metal = document.getElementById("centrale_solaire_metal");
                        const centrale_solaire_deuterium = document.getElementById("centrale_solaire_deuterium");
                        const centrale_solaire_niveau = document.getElementById("centrale_solaire_niveau");
                        const centrale_solaire_temps = document.getElementById("centrale_solaire_temps");

                        cout_metal = parseInt(centrale_solaire_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(centrale_solaire_deuterium.innerHTML.substring(12));
                        niveau = parseInt(centrale_solaire_niveau.innerHTML.substring(16));
                        temps = parseInt(centrale_solaire_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_deuterium < quantite_deuterium) {
                            quantite_metal -= cout_metal;
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin(6, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton de l'usine de nanite
            const centrale_fusion_boutton = document.getElementById("centrale_fusion_boutton");
            centrale_fusion_boutton.addEventListener("click", function () {
                if (centrale_fusion_boutton.className != "en_construction") {
                    if (batiment) {
                        const centrale_fusion_metal = document.getElementById("centrale_fusion_metal");
                        const centrale_fusion_deuterium = document.getElementById("centrale_fusion_deuterium");
                        const centrale_fusion_niveau = document.getElementById("centrale_fusion_niveau");
                        const centrale_fusion_temps = document.getElementById("centrale_fusion_temps");

                        cout_metal = parseInt(centrale_fusion_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(centrale_fusion_deuterium.innerHTML.substring(12));
                        niveau = parseInt(centrale_fusion_niveau.innerHTML.substring(16));
                        temps = parseInt(centrale_fusion_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_deuterium < quantite_deuterium) {
                            quantite_metal -= cout_metal;
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin(7, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton de l'artillerie laser
            const artillerie_laser_boutton = document.getElementById("artillerie_laser_boutton");
            artillerie_laser_boutton.addEventListener("click", function () {
                if (artillerie_laser_boutton.className != "en_construction") {
                    if (batiment) {
                        const artillerie_laser_metal = document.getElementById("artillerie_laser_metal");
                        const artillerie_laser_deuterium = document.getElementById("artillerie_laser_deuterium");
                        const artillerie_laser_niveau = document.getElementById("artillerie_laser_niveau");
                        const artillerie_laser_temps = document.getElementById("artillerie_laser_temps");

                        cout_metal = parseInt(artillerie_laser_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(artillerie_laser_deuterium.innerHTML.substring(12));
                        niveau = parseInt(artillerie_laser_niveau.innerHTML.substring(16));
                        temps = parseInt(artillerie_laser_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_deuterium < quantite_deuterium) {
                            quantite_metal -= cout_metal;
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin(8, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton du cannon à ions
            const canon_ions_boutton = document.getElementById("canon_ions_boutton");
            canon_ions_boutton.addEventListener("click", function () {
                if (canon_ions_boutton.className != "en_construction") {
                    if (batiment) {
                        const canon_ions_metal = document.getElementById("canon_ions_metal");
                        const canon_ions_deuterium = document.getElementById("canon_ions_deuterium");
                        const canon_ions_niveau = document.getElementById("canon_ions_niveau");
                        const canon_ions_temps = document.getElementById("canon_ions_temps");

                        cout_metal = parseInt(canon_ions_metal.innerHTML.substring(8));
                        cout_deuterium = parseInt(canon_ions_deuterium.innerHTML.substring(12));
                        niveau = parseInt(canon_ions_niveau.innerHTML.substring(16));
                        temps = parseInt(canon_ions_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_deuterium < quantite_deuterium) {
                            quantite_metal -= cout_metal;
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin(9, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });

            // Récupérer le bouton du bouclier
            const bouclier_boutton = document.getElementById("bouclier_boutton");
            bouclier_boutton.addEventListener("click", function () {
                if (canon_ions_boutton.className != "en_construction") {
                    if (batiment) {
                        const bouclier_metal = document.getElementById("bouclier_metal");
                        const bouclier_energie = document.getElementById("bouclier_energie");
                        const bouclier_deuterium = document.getElementById("bouclier_deuterium");
                        const bouclier_niveau = document.getElementById("bouclier_niveau");
                        const bouclier_temps = document.getElementById("bouclier_temps");

                        cout_metal = parseInt(bouclier_metal.innerHTML.substring(8));
                        cout_energie = parseInt(bouclier_energie.innerHTML.substring(10));
                        cout_deuterium = parseInt(bouclier_deuterium.innerHTML.substring(12));
                        niveau = parseInt(bouclier_niveau.innerHTML.substring(16));
                        temps = parseInt(bouclier_temps.innerHTML);

                        if (cout_metal < quantite_metal && cout_deuterium < quantite_deuterium && cout_energie < quantite_energie_total) {
                            quantite_metal -= cout_metal;
                            quantite_deuterium -= cout_deuterium;
                            quantite_energie -= cout_energie;
                            augmenter_niveau_date_fin(10, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction("en_construction");
                            envoyer_ressource();
                            construction_batiment();
                        }
                    }
                }
            });
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

function ajouter_classe_en_construction(classe) {
    const laboratoire_recheche_boutton = document.getElementById("laboratoire_recheche_boutton");
    const chantier_spatial_boutton = document.getElementById("chantier_spatial_boutton");
    const usine_nanite_boutton = document.getElementById("usine_nanite_boutton");
    const mine_metal_boutton = document.getElementById("mine_metal_boutton");
    const synthe_deuterium_boutton = document.getElementById("synthe_deuterium_boutton");
    const centrale_solaire_boutton = document.getElementById("centrale_solaire_boutton");
    const centrale_fusion_boutton = document.getElementById("centrale_fusion_boutton");
    const artillerie_laser_boutton = document.getElementById("artillerie_laser_boutton");
    const canon_ions_boutton = document.getElementById("canon_ions_boutton");
    const bouclier_boutton = document.getElementById("bouclier_boutton");

    if (classe == "en_construction") {
        laboratoire_recheche_boutton.classList.replace("libre", "en_construction");
        chantier_spatial_boutton.classList.replace("libre", "en_construction");
        usine_nanite_boutton.classList.replace("libre", "en_construction");
        mine_metal_boutton.classList.replace("libre", "en_construction");
        synthe_deuterium_boutton.classList.replace("libre", "en_construction");
        centrale_solaire_boutton.classList.replace("libre", "en_construction");
        centrale_fusion_boutton.classList.replace("libre", "en_construction");
        artillerie_laser_boutton.classList.replace("libre", "en_construction");
        canon_ions_boutton.classList.replace("libre", "en_construction");
        bouclier_boutton.classList.replace("libre", "en_construction");
    }

    if (classe == "libre") {
        laboratoire_recheche_boutton.classList.replace("en_construction", "libre");
        chantier_spatial_boutton.classList.replace("en_construction", "libre");
        usine_nanite_boutton.classList.replace("en_construction", "libre");
        mine_metal_boutton.classList.replace("en_construction", "libre");
        synthe_deuterium_boutton.classList.replace("en_construction", "libre");
        centrale_solaire_boutton.classList.replace("en_construction", "libre");
        centrale_fusion_boutton.classList.replace("en_construction", "libre");
        artillerie_laser_boutton.classList.replace("en_construction", "libre");
        canon_ions_boutton.classList.replace("en_construction", "libre");
        bouclier_boutton.classList.replace("en_construction", "libre");
    }
}

function augmenter_niveau_date_fin(batiment, niveau, temps) {
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

    const date_fin_infrastructure = annee + "-" + mois + "-" + jour + " " + heures + ":" + minutes + ":" + secondes;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../API/php/infrastructure_niveau_date.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.status !== 200) {
            console.log("Erreur : " + xhr.statusText);
        }
    };

    xhr.send("niveau=" + niveau + "&batiment=" + batiment + "&date_fin=" + date_fin_infrastructure);
}