function creation(){
    const utilisateur_existant = document.getElementById("utilisateur_existant");
    const utilisateur_incomplet = document.getElementById("utilisateur_incomplet");
    const utilisateur_creer = document.getElementById("utilisateur_creer");

    const email = document.getElementById("email_creation");
    const password = document.getElementById("password_creation");
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../API/php/creer_utilisateur.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
    if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log("Réponse du script PHP : " + xhr.responseText);

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