<?php
if (isset($_POST['nblignes']) && isset($_POST['nbcolonnes']) && isset($_POST['taillebordure'])) {
    $nblignes = $_POST['nblignes'];
    $nbcolonnes = $_POST['nbcolonnes'];
    $taillebordure = $_POST['taillebordure'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }
        

    </style>
</head>
<body>
    <header><h1>Voici votre tableau</h1></header>
    <?php 
    echo "<table border='" . $taillebordure . "'>";
    for ($i = 0; $i < $nblignes; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $nbcolonnes; $j++) {
            echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
    
</body>
</html>
