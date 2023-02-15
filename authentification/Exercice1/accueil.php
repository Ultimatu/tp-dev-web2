<?php
session_start();

if ($_SESSION['CONNECT'] != 'OK') {
    header('Location: login.php');
    exit;
}

if (isset($_GET['afaire']) && $_GET['afaire'] == 'deconnexion') {
    session_destroy();
    header('Location: login.php?error=3');
    exit;
}
?>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Page</title>
  </head>
  <body>
    <h1>Hello <?php echo $_SESSION['USERNAME']; ?></h1>
    <p><a href="accueil.php?afaire=deconnexion">Déconnexion</a></p>
  </body>
</html>
