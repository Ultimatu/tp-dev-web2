<?php
// Connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$dbname = "tp6";

// Créer la connexion
$conn = mysqli_connect($host, $user, $password, $dbname);

// Vérifiez la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>