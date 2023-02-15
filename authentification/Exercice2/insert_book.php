<?php
// Vérifiez les entrées de l'utilisateur pour éviter les attaques de type SQL injection
$titre = mysqli_real_escape_string($conn, $titre);
$auteur = mysqli_real_escape_string($conn, $auteur);
$date_creation = mysqli_real_escape_string($conn, $date_creation);

// Ajoutez un nouvel exercice
$sql = "INSERT INTO exercice (titre, auteur, date_creation) VALUES ('$titre', '$auteur', '$date_creation')";
?>