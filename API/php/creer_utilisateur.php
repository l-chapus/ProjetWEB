<?php

include 'pdo.php';

// Fonction de hashage du mot de passe
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  // Vérification que le formulaire est complet
  if ($_POST['email']!='' && $_POST['password']!='') 
  {
    
    // Vérification de l'existence de l'utilisateur
    $email = $_POST['email'];
    $stmt = $db->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();
  
    if ($count > 0) {
      echo 'existe';
      exit();
    }

    // Création de l'utilisateur
    $password = $_POST['password'];
    $hashedPassword = hashPassword($password);
    $stmt = $db->prepare("INSERT INTO utilisateurs (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $hashedPassword]);
    echo 'existe_pas';
  }
  else 
  {
    echo "formulaire_incomplet";
  }
}
?>