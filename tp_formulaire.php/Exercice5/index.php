 <?php
 $well = "";
 $error = "";
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);

   if (strtolower($username) === 'admin' && strtolower($password) === 'secret')

     $well = "<h2>Bienvenue!</h2>";
   else {
     $error = "<h2>Nom d'utilisateur ou mot de passe incorrect.</h2>";
   }
 }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de connexion</title>
  <link rel="stylesheet" href="./style.css">
    <style>
     
    </style>
  </head>
  <body>
    <header>
      <h1>Connectez-vous</h1>
    </header>
    <div class="error">
      <?php if (!empty($error))
        echo $error; ?>
    </div>
    <div class="form-container">

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <label for="username">Nom d'utilisateur</label>
          <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password">
        </div>
        <input type="submit" value="Se connecter">
      </form>
    </div>
    <div class="valier">
       <?php if (!empty($well))
         echo $well; ?>
    </div>
  </body>
</html>
