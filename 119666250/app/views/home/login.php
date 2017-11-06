<?php require_once '../app/views/templates/headerPublic.php' ?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: Maroon;
    background-color: rgb(93, 0, 0);
    color: rgb(255, 255, 255);
}
</style>
<style> 
input[type=text],[type=password] {
    width: 15%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
</style>
<style> 
input[type=submit] {
    background-color: blue;
    border: none;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
    margin: 3px 1px;
}
</style>

</head>
<body>

<h1>Please Login!</h1>

</body>
</html>
<body> 
    <form method ="post" action="/login/index">
    <label for ="username">Username:</label><br/>
    <input type="text" name="username" id="username"><br/>
    <label for ="password">Password:</label><br/>
    <input type="password" name="password" id="password"><br/>
    <input type="submit" value="LogIn">
	<br/>
    <br/>
    <a href="/Reports/attempt"> Report </a>
    <br/>
    <a href="/login/register"> Create account </a>
    </form>
</html>
    <?php require_once '../app/views/templates/footer.php' ?>
