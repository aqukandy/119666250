<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>You are not logged in! haha</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form method ="post" action="index.php">
                <label for ="Username">Username:</label><br/>
                <input type="text" name="username" id="username"><br/>
                <label for ="password">Password:</label><br/>
                <input type="password" name="password" id="password"><br/>
                <input type="submit" value="Log In">
            </form>

            <form method ="post" action="attempts counts.php">
                <input type="submit" value="attempts numbers">
            </form>

            <form method ="post" action="create account.php">
                <input type="submit" value="create account">
            </form>

            <a href="/login/register"> Sign up here </a>
        </div>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
