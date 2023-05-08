//initialise des variables globales
var selectedGalaxie="";
var selectedSystemeSolaire="";

window.addEventListener('load', () => {

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../API/php/session.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const univers = xhr.responseText;
            if (univers === "nouveau_univers") {
                creation_univers();
            }
        }
        else {
            console.log('Une erreur s\'est produite.');
        }

    };
    xhr.send();

    // Récupérer la balise select
    const selectGalaxie = document.getElementById("galaxie_select");
    
    // Ajouter un écouteur d'événements onchange à la balise select
    selectGalaxie.addEventListener("change", function () {
        // Récupérer l'option sélectionnée
        selectedGalaxie = this.options[this.selectedIndex].value;
        afficher_planete();
    });
    
    const selectSystemeSolaire = document.getElementById("systeme_solaire_select");
    // Ajouter un écouteur d'événements onchange à la balise select
    selectSystemeSolaire.addEventListener("change", function () {
        // Récupérer l'option sélectionnée
        selectedSystemeSolaire = this.options[this.selectedIndex].value;
        afficher_planete();
    });


});

function creation_univers() {
    const xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "../API/php/creation_univers.php", true);
    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr2.send();
}

function afficher_planete(){
    if(selectedGalaxie != "" && selectedSystemeSolaire != ""){
       
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Met à jour le contenu du tableau avec la réponse du script PHP
                document.getElementById("tableau_planete").innerHTML = this.responseText;
            }
        };

        // Définir la méthode et l'URL de la requête
        xhr.open("GET", "../API/php/afficher_planete.php?galaxie=" + selectedGalaxie + "&systeme_solaire=" + selectedSystemeSolaire, true);

        // Envoyer la requête
        xhr.send();
    }

}