<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulaire</title>
</head>
<body>
	<form action="target2.php" method="post">
		<label for="distance">Distance parcourue (en km):</label>
		<input type="number" id="distance" name="distance"><br><br>
		
		<label for="temps">Temps marché par jour:</label>
		<input type="number" id="temps" name="temps"><br><br>
		
		<label for="jours">Nombre de jours:</label>
		<input type="number" id="jours" name="jours"><br><br>
		
		<input type="submit" value="Envoyer" name="submit">
	</form>
</body>
</html>