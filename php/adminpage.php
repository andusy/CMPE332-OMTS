<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] == true) {
    echo "Hello " . $_SESSION['username'] . ".";
} else {
    echo "Log in Please";
}
