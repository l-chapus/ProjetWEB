window.addEventListener('load', () => {
    // intervalle de 1000 millisecondes (1 seconde)
    setInterval(function () {
        document.getElementById("metal_count").innerHTML = metal;
        metal++;
    }, 1000);

});

