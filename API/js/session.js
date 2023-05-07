window.addEventListener('load', () => {
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../API/php/session.php', true);
    xhr.onload = function() {
    
        if (xhr.status === 200) {
        const univers = xhr.responseText;
            if (univers === "nouveau_univers") {
                creation_univers();
            }
            else {
                console.log("non");
            }
    }
    
    else {
        console.log('Une erreur s\'est produite.');
    }
    
    };    
    xhr.send();

});

function creation_univers(){
    const xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "../API/php/creation_univers.php", true);
    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr2.send();
}