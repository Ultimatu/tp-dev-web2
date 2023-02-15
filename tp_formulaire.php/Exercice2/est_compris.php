<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>est compris entre</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1>Entrez les nombres</h1>
    </header>

    <form action="reponse.php" method="post">
        <div>
            <input type="text" name="input1" id="input1" required>
        <span> est-il compris entre </span>
        <input type="text" name="input2" id="input2" required>
        <span> et </span>
        <input type="text" name="input3" id="input3" required>
        </div>
        <input type="submit" value="Réponse">
    </form>

    
</body>
</html>