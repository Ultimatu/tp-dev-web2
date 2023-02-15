<?php
session_start();

if ($_SESSION['CONNECT'] != 'OK') {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    // Récupérez l'ID de l'exercice à modifier
    $id = $_GET['id'];
    // Vérifiez les données soumises via le formulaire de modification

} else {
    $_SESSION["CONNECT"] = "OK";
    header("location: ajout.php?error=4");
    exit;
}
include("connect_database.php");

$result = mysqli_query($conn, "SELECT * FROM exercice WHERE id=$id");
$row = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    // Récupérez les données du formulaire
    foreach ($_POST as $key => $value) {
        ${$key} = $value;
    }
    // Vérifiez les entrées de l'utilisateur pour éviter les attaques de type SQL injection
    $titre = mysqli_real_escape_string($conn, $titre);
    $auteur = mysqli_real_escape_string($conn, $auteur);
    $date_creation = mysqli_real_escape_string($conn, $date_creation);

    // Exécutez la requête SQL pour mettre à jour les données de l'exercice
    $sql = "UPDATE exercice SET titre='$titre', auteur='$auteur', date_creation='$date_creation' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["AUTORISATION"] = "true";
        header("Location: ajout.php?succes=2");
        exit;
    } else {
        header("Location: ajout.php?error=3");
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
    <title>update book</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <h1>Gestionnaire d'exercice</h1>
    </header>
    <div class="form container">
        <form action="" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir modifier cet exercice?');">
            <fieldset>
                <legend>Modifier un exercice</legend>
                <div class="form-group">
                    <label for="titre">Titre de l'exercice</label>
                    <input type="text" name="titre" class="form-control" id="titre" value="<?php echo $row["titre"] ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur de l'exercice</label>
                    <input type="text" name="auteur" class="form-control" id="auteur"
                        value="<?php echo $row["auteur"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="date_creation">Date de création</label>
                    <input type="date" name="date_creation" class="form-control" id="date_creation"
                        value="<?php echo $row["date_creation"] ?>" required>
                </div>
                <div class="button modif">
                    <button type="submit" name="submit" class="btn btn-primary">Modfier</button>
                    <li class="btn btn-reset"><a href="./ajout.php">Annuler</a></li>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>