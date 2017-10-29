<?php require_once '../app/views/templates/headerPublic.php' ?>
<html>
<body> 
    <form method ="post" action="/login/index">
    <label for ="Username">Username:</label><br/>
    <input type="text" name="username" id="username"><br/>
    <label for ="password">Password:</label><br/>
    <input type="password" name="password" id="password"><br/>
    <input type="submit" value="LogIn">
	<br/>
    <br/>
    <a href="/Reports/attempts"> Report </a>
    <br/>
    <br/>
    <a href="/login/register"> Sign up here </a>
    </form>
</body>
</html>
    <?php require_once '../app/views/templates/footer.php' ?>
