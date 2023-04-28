<?php

$host = "localhost";
$username = "esirem";
$password = "esirem";
$dbname = "esirem_galactique";

// Création d'un objet PDO pour se connecter à la base de données
try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion à la base de données: " . $e->getMessage();
  exit();
}

?>