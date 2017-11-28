<?php
if (!isset($_SESSION['username'])) {
    header('Location: ' . HOME);
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="with=device-width, scale=1">
        <title>Reminder Application</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"/>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <div class="float-right">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="navbar-brand" 
                               href="<?= HOME ?>"><h2>COSC</h2></a>
                        </li>
                        <?php if($_SESSION['username'] == 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=REPORT?>">Report</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="float-right">
                    <div class="dropdown">
                        <button type="button" 
                                class="btn btn-info dropdown-toggle"
                                data-toggle="dropdown">
                                    <?php echo "Welcome " . $_SESSION['username']; ?>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                               href="<?= PROFILE ?>">Profile</a>
                            <a class="dropdown-item" 
                               href="<?= LOG_OUT ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid" style="padding-top: 100px;">