<!DOCTYPE HTML>

<?php
$_SESSION['failed'] = 0;
session_start();

$username = array ("qukandy", "abadee", "aqukandy");
$password = array ("000000", "123456", "111111");

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


