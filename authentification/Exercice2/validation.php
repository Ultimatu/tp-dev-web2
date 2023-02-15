<?php
require 'config.php';

session_start();

if (empty($_POST['username']) || empty($_POST['password'])) {
    header('Location: login.php?error=1');
    exit;
}

if ($_POST['username'] != USERLOG || $_POST['password'] != USERPASSWORD) {
    header('Location: login.php?error=2');
    exit;
}

$_SESSION['CONNECT'] = 'OK';

header('Location: ajout.php');
exit;
?>