<?php
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 1:
            $error1 = '<p>Veuillez saisir un login et un mot de passe</p>';
            break;
        case 2:
            $error2 = '<p>Erreur de login/mot de passe</p>';

            break;
        case 3:
            $error3 = '<p>Vous avez été déconnecté du service</p>';
            break;
    }
}
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.ba0">
    <title>Login Page</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
        }
        header {
            height: 10vh;
            background-color:  #3b5998;
            padding-top: 5px;
            color: rgb(255, 252, 252);
            font-family: "Ubuntu";
        }

        h1 {
        margin: 15px auto;
        max-width: 400px;
        }
        h1,
        p {
            margin: 15px auto;
            max-width: 400px;
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
            background-color:  #3b5998;
            color: white;
            cursor: pointer;
            border: #4CAF50;
        }

        p {
            color: crimson;
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
    <?php if (!empty($error1))
        echo $error1; ?>
    <?php if (!empty($error2))
        echo $error2;
    ?>
    <?php if (!empty($error3))
        echo $error3;
    ?>
</body>

</html>