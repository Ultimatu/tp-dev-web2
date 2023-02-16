<?php
session_start();

if ($_SESSION['CONNECT'] != 'OK') {
  header('Location: login.php');
  exit;
} 


//connection à la base
include("connect_database.php");
// Vérifiez la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

  include("verif.php");
  if ($permission) {
    //inserer les données dans la base
    include("insert_book.php");
    if (mysqli_query($conn, $sql)) {
      $success_message = "<h3 class='succes-message'>Exercice ajouté avec succès</h3>";
    } else {
      $error_message = "<h3 class='error-message'>Erreur lors de l'ajout de l'exercice: </h3>" . mysqli_error($conn);
    }
  }
}
if (isset($_GET["error"])) {
  $error_id = $_GET['error'];
  if ($error_id == 1) {
    $error_message = "<h3 class='error_message'>Veuillez sélectionner un exercice à modifier.";
  } else if ($error_id == 2) {
    $error_message = "<h3 class='error_message'>L'exercice n'a pas pu être supprimer. Veuillez réessayer</h3>" . mysqli_error($conn);
  } else if ($error_id == 3) {

    $error_message = "<h3 class='error_message'>Erreur lors de la modification de l'exercice: </h3>" . mysqli_error($conn);
  } else if ($error_id == 4) {
    $error_message = "<h3 class='error_message'>Veuillez sélectionner un exercice à modifier.</h3>" . mysqli_error($conn);

  }

}
if (isset($_GET["succes"])) {
  $success_id = $_GET["succes"];
  if ($success_id == 2) {
    $success_message = "<h3 class='succes_message'>Exercice modifié avec succès </h3>";
  } else if ($success_id == 1) {
    $success_message = "<h3 class='succes_message'>Exercice supprimé avec succès </h3>";
  }

}
// Récupérez la liste des exercices
include("select_book.php");
// Fermez la connexion
mysqli_close($conn);
?>

<!-- Affichez le formulaire pour ajouter un nouvel exercice -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book sale</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <h1>
            Gestionaire d'exerices
        </h1>
    </header>
    <!-- Affichez le message de réussite ou d'erreur -->
    <div class="container">
      <?php



      // Code pour afficher les messages d'erreur ou de succès
      if (isset($error_message)) {
        echo '<div id="error_message" class= "alert  alert-danger">' . $error_message . '</div>';
        echo '<script type="text/javascript">
        setTimeout(function () {
        document.getElementById("error_message").style.display = "none";
        window.location.replace("' . $_SERVER['PHP_SELF'] . '");
        }, 3000);
        </script>';


      }
      if (isset($success_message)) {
        echo '<div id="success_message" class="alert alert-success">' . $success_message . '</div>';
        echo '<script type="text/javascript">
        setTimeout(function () {
        document.getElementById("success_message").style.display = "none";
        window.location.replace("' . $_SERVER['PHP_SELF'] . '");
        }, 3000);
        </script>';


      }
      // Suppression des variables d'erreur après 5 secondes
      
      ?>
      <form  method="post">
          <fieldset>
              <legend>Ajouter un exercice</legend>
              <div class="form-group">
                  <label for="titre">Titre de l'exercice</label>
                  <input type="text" name="titre" class="form-control" id="titre" >
              </div>
              <div class="form-group">
                  <label for="auteur">Auteur de l'exercice</label>
                  <input type="text" name="auteur" class="form-control" id="auteur" >
              </div>
              <div class="form-group">
                  <label for="date_creation">Date de création</label>
                  <input type="date" name="date_creation" class="form-control" id="date_creation" >
              </div>
              <div class="index">
                  <div><button type="submit" name="submit" class="btn btn-primary index">Ajouter</button></div>
                  <div><a class="afficher" id="afficher">Afficher</a></div>
              </div>
          </fieldset>

      </form>
      
    </div>
    <!-- Affichez les exercices dans un tableau -->
      <table class="table hide">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Date de création</th>
                  <th colspan="2">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['titre'] . "</td>";
                  echo "<td>" . $row['auteur'] . "</td>";
                  echo "<td>" . $row['date_creation'] . "</td>";
                  echo "<td><a href='./modifier.php?id=" . $row['id']
                    . ".'>Modifier</a></td><td><a href='supprimer.php?id=" . $row['id'] . ".'>Supprimer</a></td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='5'>Aucun exercice trouvé</td></tr>";
              }
              ?>
          </tbody>
      </table>
    


    <div class="deconnect">
      <a href="./deconnexion.php">Deconnecter</a>
    </div>
    <script src="./js/script.js"></script>

</body>

</html>