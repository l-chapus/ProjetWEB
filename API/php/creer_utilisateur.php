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

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
// Vérification de l'existence de l'utilisateur
  
  $email = $_POST['email'];
  $stmt = $db->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
  $stmt->execute([$email]);
  $count = $stmt->fetchColumn();
  
  if ($count > 0) {
    echo "Cet utilisateur existe déjà";
    exit();
  }

  // Création de l'utilisateur
  $password = $_POST['password'];
  $hashedPassword = hashPassword($password);
  $stmt = $db->prepare("INSERT INTO utilisateurs (email, password) VALUES (?, ?)");
  $stmt->execute([$email, $hashedPassword]);
  echo "Utilisateur créé avec succès";

}
?>