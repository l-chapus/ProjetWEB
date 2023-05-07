function creation(){
    const utilisateur_existant = document.getElementById("email_creation_existant");
    const utilisateur_incomplet = document.getElementById("email_creation_incomplet");
    const utilisateur_creer = document.getElementById("email_creation_creer");
    const email = document.getElementById("email_creation");
    const password = document.getElementById("password_creation");
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../API/php/creer_utilisateur.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
    if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        if(xhr.responseText === "formulaire_incomplet"){
            utilisateur_incomplet.classList.replace('reset', 'afficher');
            utilisateur_existant.classList.replace('afficher', 'reset');
            utilisateur_creer.classList.replace('succes', 'reset');
        }
        if(xhr.responseText === "existe"){
            utilisateur_existant.classList.replace('reset', 'afficher');
            utilisateur_creer.classList.replace('succes', 'reset');
            utilisateur_incomplet.classList.replace('afficher', 'reset');
        }
        if(xhr.responseText === "existe_pas"){
            utilisateur_existant.classList.replace('afficher', 'reset');
            utilisateur_incomplet.classList.replace('afficher', 'reset');
            utilisateur_creer.classList.replace('reset', 'succes');
        }
    }
    else if(xhr.status !== 200) {
        console.log("Erreur : " + xhr.statusText);
    }
    };

    xhr.send("email="+ email.value+"&password="+password.value);
}

function reset(){
    document.getElementById("email_connexion_manquant").classList.replace('afficher', 'reset');
    document.getElementById("email_connexion_inconnu").classList.replace('afficher', 'reset');
    document.getElementById("password_connexion_manquant").classList.replace('afficher', 'reset');
    document.getElementById("password_connexion_incorrect").classList.replace('afficher', 'reset');
    document.getElementById("univers_manquant").classList.replace('afficher', 'reset');
}


function connexion(){
    const email_connexion_manquant = document.getElementById("email_connexion_manquant");
    const email_connexion_inconnu = document.getElementById("email_connexion_inconnu");
    const password_connexion_manquant = document.getElementById("password_connexion_manquant");
    const password_connexion_incorrect = document.getElementById("password_connexion_incorrect");
    const univers_manquant = document.getElementById("univers_manquant");
    
    const email = document.getElementById("email_connexion");
    const password = document.getElementById("password_connexion");
    const univers = document.getElementById("univers_select");
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../API/php/connexion.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
    if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        if(xhr.responseURL === 'http://localhost:3000/front/galaxie.php')
        {
            window.location.href = "../front/galaxie.php";
        }
        if(xhr.responseText === "password_manquant"){
           reset();
           password_connexion_manquant.classList.replace('reset', 'afficher');
        }
        if(xhr.responseText === "passsword_incorrect"){
           reset();
           password_connexion_incorrect.classList.replace('reset', 'afficher');
        }
        if(xhr.responseText === "email_manquant"){
            reset();
            email_connexion_manquant.classList.replace('reset', 'afficher');
        }
        if(xhr.responseText === "password_manquant_email_manquant"){
            reset();
            email_connexion_manquant.classList.replace('reset', 'afficher');
            password_connexion_manquant.classList.replace('reset', 'afficher');
        }
        if(xhr.responseText === "utilisateur_inconnu"){
            reset();
            email_connexion_inconnu.classList.replace('reset', 'afficher');
        }
        if(xhr.responseText === "univers_manquant"){
            reset();
            univers_manquant.classList.replace('reset', 'afficher');
        }
    }
    else if(xhr.status !== 200) {
        console.log("Erreur : " + xhr.statusText);
    }
    };

    xhr.send("email="+ email.value+"&password="+password.value+"&univers="+univers.value);
}