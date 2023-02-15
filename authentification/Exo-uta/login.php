<?php
session_start();
if((isset($_GET["error"]) && empty($_SESSION["ACCESS"])) || isset($_GET["success"]) && empty($_SESSION["ACCESS"])){
    header("Location: validation.php");
}
if (isset($_GET['error']) && $_SESSION["ACCESS"]=="false") {
    $error = '<p>Faux</p>';
}
if(isset($_GET["success"]) && $_SESSION["ACCESS"]=="true"){
    $success = '<h2>Vrai</h2>';
}
?>

<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        *{
            margin: 0;
            box-sizing: border-box;
        }
        header{
            margin-top: -20px;
            height: 15vh;
            background-color: #4CAF50;
            padding-top: 3vh;
            color: #ddd;
        }
        h1, p, h2{
            margin: 15px auto;
            max-width: 400px;
        }
        h2{
            font-size: 25px;
            font-weight: bold;
            border: 4px green solid;
            width: 200px;
            text-align: center;
            border-radius: 15px;
            background-color: green;
            color: #ddd;
        }
        h2:hover{
            color: green;
            background-color: unset;
        }
        .login-form {
            background-color: #fafafa;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            align-items: center;
            margin: 10px auto;
            
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: #4CAF50;
        }
        p{
            color: red;
            font-size: 25px;
            font-weight: bold;
            border: 4px red solid;
            width: 200px;
            text-align: center;
            border-radius: 15px;
            background-color: red;
            color: #ddd;
        }
        p:hover{
            background-color: unset;
            color: black;
        }
    </style>
  </head>
  <body>
    <header>
        <h1>Login</h1>
    </header>

    <div class="login-form">
        <form action="validation.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Se connecter!">
        </form>
    </div>
    <?php if (!empty($error))
        echo $error; ?>
    <?php if (!empty($success))
        echo $success;
    ?>
   
  </body>
</html>
