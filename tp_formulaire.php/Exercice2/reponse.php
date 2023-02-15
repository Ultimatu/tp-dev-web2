<?php
$input1 = $_POST['input1'];
$input2 = $_POST['input2'];
$input3 = $_POST['input3'];

if ($input1 >= $input2 && $input1 <= $input3) {
    $reponse = "Oui, $input1 est compris entre $input2 et $input3.";
} else {
    $reponse = "Non,  $input1 n'est pas compris entre $input2 et $input3.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponse</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1>Réponse du test</h1>

    </header>
    <div class="reponse">
        <p style="color: green;">Est-ce que <?php echo $input1; ?> est compris entre <?php echo $input2; ?> et <?php echo $input3; ?> ?</p>
    <p style="color: red;"><?php echo $reponse; ?></p>
    </div>

    
</body>
</html>