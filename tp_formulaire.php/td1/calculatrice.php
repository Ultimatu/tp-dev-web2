<?php
if (isset($_POST['operande1']) && isset($_POST['operande2']) && isset($_POST['operation'])) {
    $operande1 = $_POST['operande1'];
    $operande2 = $_POST['operande2'];
    $operation = $_POST['operation'];
    switch ($operation) {
        case "addition":
            $resultat = $operande1 + $operande2;
            break;
        case "soustraction":
            $resultat = $operande1 - $operande2;
            break;
        case "multiplication":
            $resultat = $operande1 * $operande2;
            break;
        case "division":
            $resultat = $operande1 / $operande2;
            break;
        default:
            $resultat = "Opération non valide";
            break;
    }
    echo "Le résultat de l'opération est : " . $resultat;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Calculatrice</title>
</head>
<body>
    <form action="calculatrice.php" method="post">
        <input type="text" name="operande1" required>
        <br><br>
        <input type="text" name="operande2" required>
        <br><br>
        <label for="addition">Addition</label>
        <input type="radio" id="addition" name="operation" value="addition" required>
        <br>
        <label for="soustraction">Soustraction</label>
        <input type="radio" id="soustraction" name="operation" value="soustraction" required>
        <br>
        <label for="multiplication">Multiplication</label>
        <input type="radio" id="multiplication" name="operation" value="multiplication" required>
        <br>
        <label for="division">Division</label>
        <input type="radio" id="division" name="operation" value="division" required>
        <br><br>
        <input type="submit" value="Calculer">
    </form>
</body>
</html>