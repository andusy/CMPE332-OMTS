<?php
session_start();
$_SESSION['loggedin'] = false;
$_SESSION['admin'] = false;
$_SESSION['username'] = NULL;
header("Location: ../index.html");
die();
?>
