<?php

include 'pdo.php';

$idUser=1;
$idUnivers=1;

$sql = "SELECT * FROM ressources WHERE idUtilisateurs=$idUser AND idUnivers=$idUnivers";
$result = $db->query($sql);
$ressources = $result->fetch(PDO::FETCH_ASSOC); 
var_dump($ressources);

