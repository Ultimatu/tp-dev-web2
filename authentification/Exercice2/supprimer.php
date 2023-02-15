<?php
session_start();
if (isset($_GET['id'])) {
    // Récupérez l'ID de l'exercice à modifier
    $id = $_GET['id'];
    // Vérifiez les données soumises via le formulaire de modification

} else {
    header("location: ajout.php?error=1?");
    exit;
}
include("connect_database.php");

$result = mysqli_query($conn, "SELECT * FROM exercice WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    $del = mysqli_query($conn, "DELETE  FROM exercice WHERE id=$id");
    if ($del) {
        // Mise à jour des identifiants
        mysqli_query($conn, "SET @num := 0");
        mysqli_query($conn, "UPDATE exercice SET id = @num := (@num+1)");
        mysqli_query($conn, "ALTER TABLE exercice AUTO_INCREMENT = 1");
        //lien vers la page index avec le message de succès
        $_SESSION["CONNECT"] = "OK";
        header("location: ajout.php?succes=1");
        exit;
    } else {
        $_SESSION["CONNECT"] = "ok";
        header("Location: ajout.php?error=2");
        exit;
    }
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete book exercice</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <header>
        <h1>Gestionnaire de livre</h1>
    </header>
    <div class="form container">
        <form action="" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet exercice?');">
            <fieldset>
                <legend>Supprimer un exercie</legend>
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" class="form-control" id="titre" value="<?php echo $row["titre"] ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur</label>
                    <input type="text" name="auteur" class="form-control" id="auteur"
                        value="<?php echo $row["auteur"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="date_creation">Date de création</label>
                    <input type="date" name="date_creation" class="form-control" id="date_creation"
                        value="<?php echo $row["date_creation"] ?>" required>
                </div>
                <div class="button sup">
                    <button type="submit" name="submit" class="btn btn-primary">Supprimer</button>
                    <li class="btn btn-reset"><a href="./ajout.php">Annuler</a></li>
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>