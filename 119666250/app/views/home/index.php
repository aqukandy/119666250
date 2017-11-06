<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<h1 style="font-size:10vw;">Welcome</h1>
</body>
</html>

<?php
echo "WELCOME TO MY WEBSITE! " . $_SESSION['username']. $_SESSION['report'];
echo "  Today is: " . date("F jS, Y") . " and The Time is " . date("h:i:sa");

/*if (!empty($_SESSION['authenticated'])) {
    header("Location: /remind");
} else {
    $_SESSION['authenticated'] = true;
}*/
?>
<br/>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="/remind"> Add Reminder </a>
<br>
<a href="/logout"> logout! </a>

<?php require_once '../app/views/templates/footer.php' ?>


