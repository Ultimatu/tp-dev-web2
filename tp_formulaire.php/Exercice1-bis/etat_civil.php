<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etat civil</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="etat">
        <p><?php
        echo "Prénom : " . @$_SESSION["prenom"] . " <br>" . "Nom : " . @$_SESSION["nom"] ?></p>
        <li><a href="./formulaire.php">< Retour au formulaire</a></li>
    </div>
    
</body>
</html>