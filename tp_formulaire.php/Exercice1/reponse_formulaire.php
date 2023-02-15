<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formalire</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        body{
            background-color: lightsteelblue;
        }
    </style>
</head>
<body>
    <div class="reponse">
        <p><?php 
          echo "Bonjour  ".@$_SESSION["prenom"]." <strong>"." ".@$_SESSION["nom"]."</strong>" . ".<br>Nous avons bien noté que vous habitez <br>", @$_SESSION["addresse"]," à <strong>",
          @$_SESSION["ville"],"</strong>(".@$_SESSION["postal"],")" ?>.</p>
        <li><a href="./formulaire.php">< Retour au formulaire</a></li>
    </div>
</body>
</html>
