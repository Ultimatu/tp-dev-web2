<?php
require 'config.php';

session_start();

if (empty($_POST['username']) || empty($_POST['password'])) {
    header('Location: login.php?error=1');
    exit;
}

if ($_POST['username'] != USERLOGIN || $_POST['password'] != USERPASS) {
    header('Location: login.php?error=2');
    exit;
}

$_SESSION['CONNECT'] = 'OK';
$_SESSION['USERNAME'] = $_POST['username'];
$_SESSION['PASSWORD'] = $_POST['password'];

header('Location:accueil.php');
exit;
?>
