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
            <form class="form-horizontal" action="/login/index" method="post">
			    <fieldset>
					<div class="form-group">
					  <label for="username" class="col-lg-2 control-label">Username</label>
					  <div class="col-lg-10">
						<input type="text" class="form-control" name="username" placeholder="Username">
					  </div>
					</div>
					<div class="form-group">
					  <label for="password" class="col-lg-2 control-label">Password</label>
					  <div class="col-lg-10">
						<input type="password" class="form-control" name="password" placeholder="Password">
					  </div>
					</div>
					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
						<button type="submit" class="btn btn-primary">Submit</button>
					  </div>
					</div>
			    </fieldset>
			</form>
			<a href="/login/register"> Sign up here </a>
        </div>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
