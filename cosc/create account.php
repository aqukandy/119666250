
<!DOCTYPE HTML>
<?php
session_start();
?>
<html>
    <body>
        <br/>
        Creating Account<br/>
        <br/>
        <form method="post" action="addToTable.php">
             Email:<br/>
            <input type="text" name="Email"><br/>
            Username:<br/>
            <input type="text" name="Username"><br/>
            Password<br/>
            <input type="password" name="Password"><br/>
            <br/>
            <input type="submit" value="Regester">

        </form>
    </body>
</html>
