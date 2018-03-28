<?php
include_once 'dbconnect.php';

$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM admin WHERE username='$username' and password='$password'";
$result=$dbh->query($sql);
$count=$result->rowCount();

if($count==1){
    session_start();
    echo "Logged in as Administrator " . $_SESSION['username'] . ".";
    $_SESSION['loggedin'] = true;
    $_SESSION['admin'] = true;
    $_SESSION['username'] = $username;
} else {
  echo "Fail";
}
