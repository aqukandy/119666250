<?php
ob_start();
session_start();
echo "Logged In! " . $_SESSION['username'] . " password is " . $_SESSION['password'] . " date and time " . date("Y/m/d") . " " . date("H/i/s");

?>
<form method ="post" action="logout.php">
    <input type="submit" value="Logout">
</form>


