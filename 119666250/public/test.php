<?php
$hashPass = password_hash('admin', PASSWORD_DEFAULT);
echo $hashPass;
