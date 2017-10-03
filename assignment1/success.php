<?php
ob_start();
session_start();
echo "WELCOME! " . $_SESSION['username'] . " Your Password is " . $_SESSION['password'] . " The Date is " . date("M-d-Y") . " and The Time is " . date("h:i:sa");


if (!empty($_SESSION['authenticated'])) {
    header('Location: logout.php');
    
} else {
    $_SESSION['authenticated'] = true;
}
?>
<form method ="post" action="logout.php">
    <input type="submit" value="Logout">
</form>


