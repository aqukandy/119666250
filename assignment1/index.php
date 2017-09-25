<!DOCTYPE HTML>

<?php
session_start();

$username = "qukandy";
$password = "000000";

$errir = "";

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    $error = "success";
    header("Location: success.php");
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        $_SESSION['loggedIn'] = true;
        header('Location: success.php');
    } else {
        $_SESSION['loggedIn'] = false;
        $error = "Invalid username and password!";
    }
}
?>


    <head>
        <title>Login page</title>
    </head>

    
        <!-- output error massage if any -->
        <?php echo $error; ?>

        <!-- from for login -->
        <form method ="post" action="index.php">
            <label for ="Username">Username:</label><br/>
            <input type="text" name="username" id="username"><br/>
            <label for ="password">password:</label><br/>
            <input type="password" name="password" id="password"><br/>
            <input type="submit" value="Log In">
        </form>
    

