<?php

if (!empty($_POST['distance']) && !empty($_POST['temps']) && !empty($_POST['jours'])) {
    $distance = $_POST['distance'];
    $heures = $_POST['temps'];
    $jours = $_POST['jours'];

    $temps_total = $heures * $jours;
    $vitesse = $distance / $temps_total;

    echo "<h1>La vitesse du bébé est de " . $vitesse . " km/h</h1>";
} else
    print_r($_POST)
        ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    
    </body>
    </html>
