<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Hello " . $_SESSION['username'] . ".";
} else {
    echo "Log in Please";
}
