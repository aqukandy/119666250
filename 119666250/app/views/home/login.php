<?php require_once '../app/views/templates/headerPublic.php' ?>

<div>
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
    <h1>Please Login!</h1>
    <form method ="post" action="<?= LOGIN_INDEX ?>">
        <label for ="username">Username:</label><br/>
        <input type="text" name="username" id="username"><br/>
        <label for ="password">Password:</label><br/>
        <input type="password" name="password" id="password"><br/>
        <input type="submit" value="LogIn">
        <br/>
        <br/>
        <a href="/Reports/attempt"> Report </a>
        <br/>
        <a href="<?= LOGIN_REGISTER ?>"> Create account </a>
    </form>
</div>

<?php require_once '../app/views/templates/footer.php' ?>
