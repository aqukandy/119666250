<!DOCTYPE HTML>

<?php
$_SESSION['failed'] = 0;
session_start();

$username = array ("qukandy", "abadee", "aqukandy");
$password = array ("000000", "123456", "111111");

if (isset($_POST['username']) && isset($_POST['password'])) {
for ($i = 0; $i < 2; $i++) {
  if ($_POST['username'] == $username[$i] && $_POST['password'] == $password[$i]) {
  $_SESSION['loggedIn'] = true;
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['password'] = $_POST['password'];
  header('Location: success.php');
  } 
 }
  // $_SESSION['loggedIn'] = false;
  $_SESSION['failed'] = $_SESSION['failed'] + 1;
  echo "Invalid username and password!";
  
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

<form method ="post" action="attempts counts.php">
    <input type="submit" value="attempts numbers">
</form>

<form method ="post" action="create account.php">
    <input type="submit" value="create account">
</form>
