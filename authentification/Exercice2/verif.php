<?php
// Récupérez les données du formulaire
foreach ($_POST as $key => $value) {
    ${$key} = $value;
}
$titre = mysqli_real_escape_string($conn, $titre);
$auteur = mysqli_real_escape_string($conn, $auteur);
$date_creation = mysqli_real_escape_string($conn, $date_creation);
$req = "SELECT id FROM exercice WHERE titre = '$titre' AND auteur = '$auteur' AND date_creation = '$date_creation'";
$res = mysqli_query($conn, $req);

if (mysqli_num_rows($res) > 0) {
    $_GET["error"]= "";
    $error_message = "<h3 class='error_message'>Ces données existent déjà</h3>";
    $permission = false;
}
else if(empty($titre) || empty($auteur) || empty($date_creation)){
    $_GET["error"] = "";
    $error_message = "<h3 class='error_message'>Remplissez les champs vide</h3>";
    $permission = false;
}

else{
    $permission = true;
}
// Conversion de la valeur entrée en objet Date
$dateObjet = new DateTime($date_creation);

// Récupération de la date actuelle
$dateActuelle = new DateTime();

// Comparaison de la date entrée avec la date actuelle
if ($dateObjet > $dateActuelle) {
    $permission = false;
    $error_message = "<h3 class='error_message'>La date entrée ne peut pas être supérieure à la date actuelle.</h3>";
    unset($success_message);
}


?>