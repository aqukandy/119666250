<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <h1 style="font-size:10vw;">Welcome</h1>
        <?php
        echo "WELCOME TO MY WEBSITE! " . $_SESSION['username'] . $_SESSION['report'];
        echo "  Today is: " . date("F jS, Y") . " and The Time is " . date("h:i:sa");
        ?>
        <form action="<?= REMIND ?>" method="post">
            <input type="submit" value="ADD"/>
        </form>
        <a href="<?= REMIND ?>">Add Reminder</a>
        <a href="/logout"> logout! </a>
    </body>
</html>


