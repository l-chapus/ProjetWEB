function ajout_event_listenner_recherche() {

    possede_laboratoire()
        .then(function (result) {

            const laboratoire = result;

            const energie_labo = document.getElementById("energie_labo");
            const intelligence_labo = document.getElementById("intelligence_artificielle_labo");
            const laser_labo = document.getElementById("laser_labo");
            const ions_labo = document.getElementById("ions_labo");
            const bouclier_labo = document.getElementById("bouclier_labo");
            const armement_labo = document.getElementById("armement_labo");

            if (laboratoire) {
                energie_labo.classList.replace('afficher', 'reset');
                intelligence_labo.classList.replace('afficher', 'reset');
                laser_labo.classList.replace('afficher', 'reset');
                ions_labo.classList.replace('afficher', 'reset');
                bouclier_labo.classList.replace('afficher', 'reset');
                armement_labo.classList.replace('afficher', 'reset');

                const energie_niveau = parseInt(document.getElementById("energie_niveau").innerHTML.substring(16));
                const laser_niveau = parseInt(document.getElementById("laser_niveau").innerHTML.substring(16));
                const ions_niveau = parseInt(document.getElementById("ions_niveau").innerHTML.substring(16));

                const laser_techno_energie_5 = document.getElementById("laser_techno_energie_5");
                const ions_techno_laser_5 = document.getElementById("ions_techno_laser_5");
                const bouclier_techno_ions_2 = document.getElementById("bouclier_techno_ions_2");
                const bouclier_techno_enregie_8 = document.getElementById("bouclier_techno_enregie_8");

                if (energie_niveau >= 5) {
                    laser_techno_energie_5.classList.replace('afficher', 'reset');
                }
                if (energie_niveau >= 8) {
                    bouclier_techno_enregie_8.classList.replace('afficher', 'reset');
                }
                if (laser_niveau >= 5) {
                    ions_techno_laser_5.classList.replace('afficher', 'reset');
                }
                if (ions_niveau >= 2) {
                    bouclier_techno_ions_2.classList.replace('afficher', 'reset');
                }


                // Récupérer le bouton de la technologie energie
                const energie_bouton = document.getElementById("energie_bouton");
                energie_bouton.addEventListener("click", function () {
                    if (energie_bouton.className != "en_construction") {

                        const energie_deuterium = document.getElementById("energie_deuterium");
                        const energie_temps = document.getElementById("energie_temps");

                        cout_deuterium = parseInt(energie_deuterium.innerHTML.substring(12));
                        niveau = energie_niveau;
                        temps = parseInt(energie_temps.innerHTML);

                        if (cout_deuterium < quantite_deuterium) {
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin_recherche(1, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_recherche("en_construction");
                            envoyer_ressource();
                            rechercher();
                        }

                    }
                });

                // Récupérer le bouton de la technologie intelligence artificielle
                const intelligence_artificielle_bouton = document.getElementById("intelligence_artificielle_bouton");
                intelligence_artificielle_bouton.addEventListener("click", function () {
                    if (intelligence_artificielle_bouton.className != "en_construction") {

                        const intelligence_artificielle_deuterium = document.getElementById("intelligence_artificielle_deuterium");
                        const intelligence_artificielle_temps = document.getElementById("intelligence_artificielle_temps");

                        cout_deuterium = parseInt(intelligence_artificielle_deuterium.innerHTML.substring(12));
                        niveau = parseInt(document.getElementById("intelligence_artificielle_niveau").innerHTML.substring(16));
                        temps = parseInt(intelligence_artificielle_temps.innerHTML);

                        if (cout_deuterium < quantite_deuterium) {
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin_recherche(2, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_recherche("en_construction");
                            envoyer_ressource();
                            rechercher();
                        }

                    }
                });

                // Récupérer le bouton de la technologie laser
                const laser_bouton = document.getElementById("laser_bouton");
                laser_bouton.addEventListener("click", function () {
                    if (laser_bouton.className != "en_construction" && energie_niveau >= 5) {

                        const laser_deuterium = document.getElementById("laser_deuterium");
                        const laser_temps = document.getElementById("laser_temps");

                        cout_deuterium = parseInt(laser_deuterium.innerHTML.substring(12));
                        niveau = laser_niveau;
                        temps = parseInt(laser_temps.innerHTML);

                        if (cout_deuterium < quantite_deuterium) {
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin_recherche(3, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_recherche("en_construction");
                            envoyer_ressource();
                            rechercher();
                        }

                    }
                });

                // Récupérer le bouton de la technologie ions
                const ions_bouton = document.getElementById("ions_bouton");
                ions_bouton.addEventListener("click", function () {
                    if (ions_bouton.className != "en_construction" && laser_niveau >= 5) {

                        const ions_deuterium = document.getElementById("ions_deuterium");
                        const ions_temps = document.getElementById("ions_temps");

                        cout_deuterium = parseInt(ions_deuterium.innerHTML.substring(12));
                        niveau = parseInt(document.getElementById("ions_niveau").innerHTML.substring(16));
                        temps = parseInt(ions_temps.innerHTML);

                        if (cout_deuterium < quantite_deuterium) {
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin_recherche(4, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_recherche("en_construction");
                            envoyer_ressource();
                            rechercher();
                        }

                    }
                });

                // Récupérer le bouton de la technologie bouclier
                const bouclier_bouton = document.getElementById("bouclier_bouton");
                bouclier_bouton.addEventListener("click", function () {
                    if (bouclier_bouton.className != "en_construction" && ions_niveau >= 2 && energie_niveau >= 8) {

                        const bouclier_deuterium = document.getElementById("bouclier_deuterium");
                        const bouclier_temps = document.getElementById("bouclier_temps");

                        cout_deuterium = parseInt(bouclier_deuterium.innerHTML.substring(12));
                        niveau = parseInt(document.getElementById("bouclier_niveau").innerHTML.substring(16));
                        temps = parseInt(bouclier_temps.innerHTML);

                        if (cout_deuterium < quantite_deuterium) {
                            quantite_deuterium -= cout_deuterium;
                            augmenter_niveau_date_fin_recherche(5, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_recherche("en_construction");
                            envoyer_ressource();
                            rechercher();
                        }

                    }
                });

                // Récupérer le bouton de la technologie armement
                const armement_bouton = document.getElementById("armement_bouton");
                armement_bouton.addEventListener("click", function () {
                    if (armement_bouton.className != "en_construction") {

                        const armement_deuterium = document.getElementById("armement_deuterium");
                        const armement_metal = document.getElementById("armement_metal");
                        const armement_temps = document.getElementById("armement_temps");

                        cout_deuterium = parseInt(armement_deuterium.innerHTML.substring(12));
                        cout_metal = parseInt(armement_metal.innerHTML.substring(8))
                        niveau = parseInt(document.getElementById("armement_niveau").innerHTML.substring(16));
                        temps = parseInt(armement_temps.innerHTML);

                        if (cout_deuterium < quantite_deuterium && cout_metal < quantite_metal) {
                            quantite_deuterium -= cout_deuterium;
                            quantite_metal -= cout_metal;
                            augmenter_niveau_date_fin_recherche(1, niveau + 1, temps);

                            //change la classe
                            ajouter_classe_en_construction_recherche("en_construction");
                            envoyer_ressource();
                            rechercher();
                        }

                    }
                });

            }
            else {
                ajouter_classe_en_construction_recherche("en_construction");
                energie_labo.classList.replace('reset', 'afficher');
                intelligence_labo.classList.replace('reset', 'afficher');
                laser_labo.classList.replace('reset', 'afficher');
                ions_labo.classList.replace('reset', 'afficher');
                bouclier_labo.classList.replace('reset', 'afficher');
                armement_labo.classList.replace('reset', 'afficher');
            }
        })
}

function ajouter_classe_en_construction_recherche(classe) {
    const energie_bouton = document.getElementById("energie_bouton");
    const intelligence_artificielle_bouton = document.getElementById("intelligence_artificielle_bouton");
    const laser_bouton = document.getElementById("laser_bouton");
    const ions_bouton = document.getElementById("ions_bouton");
    const bouclier_bouton = document.getElementById("bouclier_bouton");
    const armement_bouton = document.getElementById("armement_bouton");

    if (classe == "en_construction") {
        energie_bouton.classList.replace("libre", "en_construction");
        intelligence_artificielle_bouton.classList.replace("libre", "en_construction");
        laser_bouton.classList.replace("libre", "en_construction");
        ions_bouton.classList.replace("libre", "en_construction");
        bouclier_bouton.classList.replace("libre", "en_construction");
        armement_bouton.classList.replace("libre", "en_construction");
    }

    if (classe == "libre") {
        energie_bouton.classList.replace("en_construction", "libre");
        intelligence_artificielle_bouton.classList.replace("en_construction", "libre");
        laser_bouton.classList.replace("en_construction", "libre");
        ions_bouton.classList.replace("en_construction", "libre");
        bouclier_bouton.classList.replace("en_construction", "libre");
        armement_bouton.classList.replace("en_construction", "libre");
    }
}

function possede_laboratoire() {

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

        xmr.open("GET", "../API/php/possede_laboratoire.php", true);
        xmr.send();
    });
}
function augmenter_niveau_date_fin_recherche(technologie, niveau, temps) {
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

    const date_fin_recherche = annee + "-" + mois + "-" + jour + " " + heures + ":" + minutes + ":" + secondes;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../API/php/recherche_niveau_date.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.status !== 200) {
            console.log("Erreur : " + xhr.statusText);
        }
    };

    xhr.send("niveau=" + niveau + "&technologie=" + technologie + "&date_fin=" + date_fin_recherche);
}