<?php
session_start();
foreach ($_GET as $key => $value) {
    ${$key} = $value;
}
$error1 = "";
$error2 = "";

if (isset($_GET["submit"])) {
    if (!empty($nom) && !empty($prenom) && !empty($ville) && !empty($addresse) && !empty($postal)) {
        if (preg_match("#^[0-9]#", $postal)) {
            foreach ($_GET as $key => $value) {
                @$_SESSION[$key] = $value;
            }
            header("Location:lien_vers_page.php");

        } else
            $error1 = "Le code postal ne peut pas contenir de lettre";

    } else {
        $error2 = "<h3>Veuillez remplir tous les champs </h3>";

    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <header>
      <h1>Remplissez le formulaire
      </h1>
    </header>
    <form method="get">
      
      <fieldset>
        <div class="error">
          <?php if (!empty($error2))
              echo $error2; ?>
      </div>
        <div class="input">
          <label for="prenom">Prénom :</label>
          <input type="text" id="prenom" name="prenom" />
        </div>
        <div class="input">
          <label for="nom">Nom :</label> <input type="text" id="nom" name="nom" />
        </div>

        <div class="input">
          <label for="addresse">Addresse :</label>
          <input type="text" id="addresse" name="addresse" />
        </div>

        <div class="input">
          <label for="ville">Ville :</label>
          <input type="text" id="ville" name="ville"/>
        </div>
        <div class="input">
          <label for="postal">Code Postal:</label>
          <input type="text" id="postal" name="postal"/>
          
        </div>
        <div class="error">
            <?php if (!empty($error1))
                echo $error1; ?>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Envoyer" />
          <input type="reset" value="Réinitialiser" />
        </div>
      </fieldset>
    </form>
  </body>
</html>
