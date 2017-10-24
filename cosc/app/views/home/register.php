<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Please create an account</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="/login/register" method="post">
                    Email:<br/>
                    <input type="text" name="Email"><br/>
                    Username:<br/>
                    <input type="text" name="Username"><br/>
                    Password<br/>
                    <input type="password" name="Password"><br/>
                    <br/>
                    <input type="submit" value="Regester">

                </form>
                <a href="/login/register"> Sign up here </a>
        </div>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
