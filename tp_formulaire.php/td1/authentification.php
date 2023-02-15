<?php $password = "secret";
if (isset($_POST['password'])) {
    if ($_POST['password'] == $password) {
        echo "Authentification réussie !";
    } else {
        echo "Mot de passe incorrect.";
    }
} ?>