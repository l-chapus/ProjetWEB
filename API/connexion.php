<?php

$servername = "localhost";
$username = "esirem";
$password = "esirem";
$dbname = "esirem_galactique";

// Créer une connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['email']) && isset($_POST['password'])) {
  // Récupérer les informations d'identification du formulaire
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Échapper les caractères spéciaux pour éviter les attaques par injection SQL
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);

  // Exécuter une requête SQL pour sélectionner l'utilisateur correspondant
  $sql = "SELECT * FROM utilisateurs WHERE email='$email' AND 'password'='$password'";
  $result = mysqli_query($conn, $sql);

  // Vérifier si l'utilisateur existe dans la base de données
  if (mysqli_num_rows($result) == 1) {
    // Démarrer une session PHP et stocker les informations d'identification de l'utilisateur
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;

    // Rediriger l'utilisateur vers la page d'accueil
    header("Location: page_accueil.php");
  } else {
    // Afficher un message d'erreur si l'utilisateur n'existe pas dans la base de données
    $error = "Nom d'utilisateur ou mot de passe incorrect.";
  }
}

// Fermer la connexion
mysqli_close($conn);

?>