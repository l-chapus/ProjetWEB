window.addEventListener('load', () => {
    window.console.log('reset');
    const utilisateur = document.getElementById("utilisateur_existant");
    utilisateur.classList.remove('afficher');
    utilisateur.classList.add('reset');
});