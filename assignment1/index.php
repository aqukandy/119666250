<!DOCTYPE HTML>

<?php
$_SESSION['failed'] = 0;
session_start();

$username = "qukandy";
$password = "000000";
/*
$_SESSION['username'] = 'qukandy';
$_SESSION['loggedIn'] = true;
$_SESSION['password'] = '123456';

if (isset($_POST['loggrdIn'])) {
    $username = array('username1', 'username2', 'username3');
    $password = array('password1', 'password2', 'password3');
    if (in_array($_POST['username'], $username)) {
        $key = array_search($_POST['username'], $username);
        if ($password[$key] == $_POST['password']) {
            $_SESSTION['access'] = 1;
            header("Location: success.php");
            echo "Welcome back " . $_POST['username'];
        } else {
            echo "Password Incorrect.";
        }
    }
} else {
    echo "Login from";
}
 */
 if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
  header("Location: success.php");
  } 

if (isset($_POST['username']) && isset($_POST['password'])) {
  if ($_POST['username'] == $username && $_POST['password'] == $password) {
  $_SESSION['loggedIn'] = true;
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['password'] = $_POST['password'];
  header('Location: success.php');
  } else {
  // $_SESSION['loggedIn'] = false;
  $_SESSION['failed'] = $_SESSION['failed'] + 1;
  echo "Invalid username and password!". $_SESSION['failed'];
  }
  }
 
?>

<head>
    <title>Login page</title>
</head>

<!-- from for login -->
<form method ="post" action="index.php">
    <label for ="Username">Username:</label><br/>
    <input type="text" name="username" id="username"><br/>
    <label for ="password">password:</label><br/>
    <input type="password" name="password" id="password"><br/>
    <input type="submit" value="Log In">
</form>


