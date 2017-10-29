<?php require_once '../app/views/templates/headerPublic.php' ?>
<html>
<body>
<br/>Please create an account<br/>
<p class="lead"> <?= date("F jS, Y"); ?></p>
    <form method="post" action="/login/register">
        Email:<br/>
        <input type="text" name="Email"><br/>
        Username:<br/>
        <input type="text" name="Username"><br/>
        Password<br/>
        <input type="password" name="Password"><br/>
        <br/>
        <button type="submit" > submit </button> <br/>
        <br/>
    </form>
</body>
</html>
        <a href="/login/index"> Sign up here </a>
    <?php require_once '../app/views/templates/footer.php' ?>
