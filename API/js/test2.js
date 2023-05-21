window.addEventListener('load', () => {
    const xhr2 = new XMLHttpRequest();
    xhr2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            metal = this.responseText;
        }
    };
    xhr2.open("GET", "../API/php/test.php", true);
    xhr2.send();
});