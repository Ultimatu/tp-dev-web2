<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un tableau</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
        }
        header {
            background-color: #3b5998;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
            margin-bottom: 15px;
        }

        header h1 {
            margin: 0;
        }

        form{
            margin: 15px auto;
            max-width: 500px;
        }
        input[type="number"]{
            background-color: #f6f7f9;
            border: 1px solid #d9d9d9;
            border-radius: 4px;
            height: 36px;
            font-size: 14px;
            padding: 0 10px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            justify-content: center;
            transition: all 0.5s ease;
        }

        input[type="submit"]:hover {
            background-color: #3E8E41;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

    </style>

</head>
<body>
    <header> 
        <h1>Veuillez entrez vos bésoins</h1>
    </header>
    <form action="tableau.php" method="post">
        <label for="nblignes">Nombre de lignes :</label>
        <input type="number" name="nblignes" id="nblignes" required>
        <br><br>
        <label for="nbcolonnes">Nombre de colonnes :</label>
        <input type="number" name="nbcolonnes" id="nbcolonnes" required>
        <br><br>
        <label for="taillebordure">Taille de la bordure :</label>
        <input type="number" name="taillebordure" id="taillebordure" required>
        <br><br>
        <input type="submit" value="Générer le tableau">
    </form>

</body>
</html>