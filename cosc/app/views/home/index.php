
<?php
echo "WELCOME TO MY WEBSITE! " . $_SESSION['username']. $_SESSION['report'];
echo "  Today is: " . date("F jS, Y") . " and The Time is " . date("h:i:sa");

if (!empty($_SESSION['authenticated'])) {
    header("Location: /logout");
} else {
    $_SESSION['authenticated'] = true;
}
?>

<br/>
<a href="/logout"> logout! </a>

<?php require_once '../app/views/templates/footer.php' ?>


