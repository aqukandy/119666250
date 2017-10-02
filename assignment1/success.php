<?php
ob_start();
session_start();
echo "Logged In! " . $_SESSION['username'] . " password is " . $_SESSION['password'] . " date " . date("Y/M/D") . " time " . date("H/I/S");

?>
<form method ="post" action="logout.php">
    <input type="submit" value="Logout">
</form>


