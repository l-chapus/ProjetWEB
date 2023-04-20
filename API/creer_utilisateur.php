<?php

// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'esirem_galactique';
$username = 'esirem';
$password = 'esirem';

// Création d'un objet PDO pour se connecter à la base de données
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
    exit();
}

// Fonction de hashage du mot de passe
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Vérification de l'existence de l'utilisateur
$email = $_POST['email'];
$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
$stmt->execute([$email]);
$count = $stmt->fetchColumn();
if ($count > 0) {
    echo "Cet utilisateur existe déjà";
    exit();
}

// Création de l'utilisateur
$password = $_POST['password'];
$hashedPassword = hashPassword($password);
$stmt = $db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->execute([$email, $hashedPassword]);
echo "Utilisateur créé avec succès";


/*
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

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

// Hashage du mot de passe avec la fonction password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Ouverture d'une connexion à la base de données
$connexion = new PDO("mysql:host=localhost;port=3306;dbname=esirem_galactique", "esirem", "esirem");

// Préparation de la requête avec des paramètres
$requete = $connexion->prepare("INSERT INTO `utilisateurs` (`email`, `password`) VALUES (:email, :password)");

// Association des paramètres avec leur valeur finale
$requete->bindValue(":email", $email);
$requete->bindValue(":password", $hashed_password);

// Exécution de la requête
if($requete->execute())
{
  // Utilisateur créé avec succès
  echo "Utilisateur créé avec succès !";
}
else
{
  // Erreur lors de la création de l'utilisateur
  echo "Erreur lors de la création de l'utilisateur.";
}