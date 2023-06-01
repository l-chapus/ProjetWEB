window.addEventListener('load', () => {

    // Affichage des recherches avec les bonnes informations
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../API/php/afficher_recherche.php', true);
    xhr.onload = function () {
        document.getElementById("principale").innerHTML = xhr.responseText;
    };
    xhr.send();


    // Attend que la page est fini de se générer
    setTimeout(function () {
        
    }, 300);
});