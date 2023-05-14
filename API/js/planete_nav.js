window.addEventListener('load', () => {

    // Atribution ou non d'une planète au joueur
    const xhr2 = new XMLHttpRequest();
    xhr2.open('GET', '../API/php/possession_planete.php', true);
    xhr2.onload = function () {
        const possession_planete = xhr2.responseText;
        
        // Si l'utilisateur n'a pas de planète on lui en attribue une et on l'affiche
        if (possession_planete === "false") {
            attribuer_planete();
        }
        // Si il en a déjà une on affiche simplement ces coordonnées
        else {
            afficher_coordonner_planete();
        }

    };
    xhr2.send();
    
});

function attribuer_planete() {
    const xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Met à jour le contenu de la case avec la réponse du script PHP
            document.getElementById("ref_planete").innerHTML = this.responseText;
        }
    };
    // Définir la méthode et l'URL de la requête
    xhr.open("GET", "../API/php/attribuer_planete.php", true);
    // Envoyer la requête
    xhr.send();

    // Envoie puis récupère les ressources de l'utilisateur
    const xhr2 = new XMLHttpRequest();
    xhr2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ressource").innerHTML = this.responseText;
        }
    };
    xhr2.open("GET", "../API/php/envoi_ressources.php", true);
    xhr2.send();
}



function afficher_coordonner_planete(){
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Met à jour le contenu de la case avec la réponse du script PHP
            document.getElementById("ref_planete").innerHTML = this.responseText;
        }
    };

    // Définir la méthode et l'URL de la requête
    xhr.open("GET", "../API/php/afficher_planete_nav.php", true);
    // Envoyer la requête
    xhr.send();


    // Récupère les ressources de l'utilisateur
    const xhr2 = new XMLHttpRequest();

    xhr2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ressource").innerHTML = this.responseText;
        }
    };
    // Définir la méthode et l'URL de la requête
    xhr2.open("GET", "../API/php/recuperation_ressources.php", true);
    // Envoyer la requête
    xhr2.send();
}