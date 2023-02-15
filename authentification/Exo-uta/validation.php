<?php
require "config.php";
session_start();

if (empty($_POST["username"]) && empty($_POST["password"])){
    header("Location: login.php");
    exit;
}

if (empty($_POST['username']) || empty($_POST['password']) || ($_POST['username'] != USERNAME) || !validatePassword($_POST["password"])) {
    $_SESSION["ACCESS"] = "false";
    header('Location: login.php?error=1');
    exit;
} else {
    $_SESSION["ACCESS"] = "true";
    header("location:login.php?success=true");

}


function validatePassword($password) {
    // Expression régulière pour vérifier s'il y a au moins un chiffre, une lettre majuscule et un caractère spécial
    $pattern = "/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%éèê^&*])[0-9a-zA-Z!@#éèê$%^&*]{8,}$/";

    // Vérifiez si le mot de passe respecte le modèle
    if (preg_match($pattern, $password)) {
        return true;
    } else {
        return false;
    }
}

?>
