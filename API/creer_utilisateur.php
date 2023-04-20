<?php

$servername = "localhost";
$username = "root";
$password = "Diabolodu30+";
$dbname = "esirem_galactique";

// Créer une connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['email']) && isset($_POST['password'])) {
  // Récupérer les informations du formulaire
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Échapper les caractères spéciaux pour éviter les attaques par injection SQL
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);

  // Hasher le mot de passe avant de le stocker dans la base de données
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Exécuter une requête SQL pour insérer les informations de l'utilisateur dans la base de données
  $sql = "INSERT INTO utilisateurs (email, 'password') VALUES ('$email', '$hashed_password')";
  $result = mysqli_query($conn, $sql);

  // Vérifier si l'insertion a réussi
  if ($result) {
    echo "Nouvel utilisateur créé avec succès.";
  } else {
    echo "Erreur lors de la création de l'utilisateur: " . mysqli_error($conn);
  }
}

// Fermer la connexion
mysqli_close($conn);

?>