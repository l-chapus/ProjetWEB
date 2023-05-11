window.addEventListener('load', () => {
    
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Met à jour le contenu du tableau avec la réponse du script PHP
            document.getElementById("ref_planete").innerHTML = this.responseText;
        }
    };

    // Définir la méthode et l'URL de la requête
    xhr.open("GET", "../API/php/afficher_planete_nav.php", true);

    // Envoyer la requête
    xhr.send();
});