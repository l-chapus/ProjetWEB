<?php

include 'pdo.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST['email']) && isset($_POST['password'])) 
{
  if ($_POST['email']!='' && $_POST['password']==='' ) 
  {
    echo 'password_manquant';
  }
  if ($_POST['email']==='' && $_POST['password']!='' ) 
  {
    echo 'email_manquant';
  }
  if ($_POST['email']==='' && $_POST['password']==='' ) 
  {
    echo 'password_manquant_email_manquant';
  }
  
  if ($_POST['email']!='' && $_POST['password']!='' ) 
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
        
          if($univers != ''){
            // Démare la session
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            $_SESSION['univers'] = $univers;

            // Ajoute l'id du pseudo
            $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
            $stmt->execute([$email]);
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $id_utilisateur = $utilisateur['id'];

            $stmt = $db->prepare("SELECT nom FROM pseudo WHERE id = ?");
            $stmt->execute([$id_utilisateur]);
            $reponse = $stmt->fetch(PDO::FETCH_ASSOC);
            $pseudo = $reponse['nom'];

            $_SESSION['pseudo'] = $pseudo;
            
            $_SESSION['ref_planete'] = "";
    
            // Initialise les ressources de base
            $_SESSION['energie'] = 0;
            $_SESSION['deuterium'] = 0;
            $_SESSION['metal'] = 0;

            // Si on selectionne nouveau univers
            if($univers === "nouveau_univers")
            {
              // On créer l'univers
              include 'creation_univers.php';
            }
          
            // calcul les ressources générer pendant que le joueur est déconnecté
            include 'ressource_connexion.php';
                        

            // Rediriger l'utilisateur vers la page d'accueil
            header("Location:../../front/galaxie.php");
          }
          else
          {
            echo "univers_manquant";
          }
        }
        else
        {
        // Mot de passe incorrect
        echo "passsword_incorrect";
        }
      }
      else
      {
      // Utilisateur non trouvé
        echo "utilisateur_inconnu";
      }
    }
  }
}
else
{
  echo "Erreur lors de la requête";
}