<?php

include 'pdo.php';

// Récupération des univers de la base de données
$sql = "SELECT nom FROM univers";
$result = $db->query($sql);

// Génération du contenu HTML des options
$options = "<option value='' disabled selected hidden>--Choisissez une option--</option>" . "<option value='nouveau_univers'>Nouveau univers</option>";
if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $univers = $row["nom"];
        $options .= "<option value=\"$univers\">$univers</option>";
    }
}

// Renvoie le contenu HTML des options
echo $options;
?>



