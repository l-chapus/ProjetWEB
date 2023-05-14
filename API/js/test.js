window.addEventListener('load', () => {
    // intervalle de 1000 millisecondes (1 seconde)
    setInterval(function () {
        document.getElementById("energie_count").innerHTML = energie;
        energie++;
    }, 1000);

});

