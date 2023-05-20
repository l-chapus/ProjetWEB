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
    setTimeout(function() {
        ajout_event_listenner_infrastructure();
    }, 500);
}