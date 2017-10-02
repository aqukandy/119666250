<?php
ob_start();
session_start();
echo "WELCOME! " . $_SESSION['username'] . " Your Password is " . $_SESSION['password'] . " The Date is " . date("Y/m/d") . " and The Time is " . date("H/i/s");

?>
<form method ="post" action="logout.php">
    <input type="submit" value="Logout">
</form>


