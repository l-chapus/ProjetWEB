<?php

include 'pdo.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST['email']) && isset($_POST['password'])) 
{

  // Récupérer les informations d'identification du formulaire
  $email = $_POST['email'];
  $password = $_POST['password'];
  $univers = $_POST['univers'];

  $email = $_POST['email'];
  $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
  $stmt->bindValue(":email",$email);
  
  // Exécution de la requète
  if($stmt->execute())
  {
    if($stmt->rowCount() == 1)
    {

    // Récupération de l'utilisateur
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Vérification du mot de passe avec la fonction password_verify()
      if(password_verify($password, $utilisateur['password']))
      {
      // Identifiants valides
        echo "Identifiants valides.";
        
        if($univers != ''){
          // Démare la session
          session_start();
          $_SESSION['email'] = $email;
          $_SESSION['loggedin'] = true;
          $_SESSION['univers'] = $univers;
          var_dump($_SESSION);
        
          // Rediriger l'utilisateur vers la page d'accueil
          header("Location:../../front/galaxie.php");
        }
        else{
          echo " Veuillez choisir un univers";
        }
      }
      else
      {
      // Mot de passe incorrect
      echo "Mot de passe incorrect.";
      }
    }
    else
    {
    // Utilisateur non trouvé
      echo "Utilisateur non trouvé.";
    }
  }
}
else
{
  echo "Erreur lors de la requête";
}