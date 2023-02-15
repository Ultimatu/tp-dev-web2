<?php
$nom_valide = "utilisateur";
$mot_de_passe_valide = "motdepasse";

if (isset($_POST['submit'])) {
    $nom = trim($_POST['nom']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    if (
        strtolower($nom) == strtolower($nom_valide) &&
        strtolower($mot_de_passe) == strtolower($mot_de_passe_valide)
    ) {
        echo "Bienvenue!";
    } else {
        ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  Nom: <input type="text" name="nom"><br>
                  Mot de passe: <input type="password" name="mot_de_passe"><br>
                  <input type="submit" name="submit" value="Submit">
                </form>
          <?php
    }
} else {
    ?>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Nom: <input type="text" name="nom"><br>
            Mot de passe: <input type="password" name="mot_de_passe"><br>
            <input type="submit" name="submit" value="Submit">
          </form>
    <?php
}
?>
