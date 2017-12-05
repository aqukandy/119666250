<?php

define('VERSION', '0.7.0');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('APPS', ROOT . DS . 'app');
define('CORE', ROOT . DS . 'core');
define('LIBS', ROOT . DS . 'lib');
define('MODELS', ROOT . DS . 'models');
define('VIEWS', ROOT . DS . 'views');
define('CONTROLLERS', ROOT . DS . 'controllers');
define('LOGS', ROOT . DS . 'logs');	
define('FILES', ROOT . DS. 'files');

//Make sure always redirect to home '119666250'
define('HOME'           , '/119666250/public');
define('LOGIN_REGISTER' , HOME . DS . 'login/register');
define('LOGIN_INDEX'    , HOME . DS . 'login/index');
define('LOG_OUT'        , HOME . DS . 'logout');
define('PROFILE'        , HOME . DS . 'userController/profile');
define('UPDATE_PROFILE'        , HOME . DS . 'userController/updateprofile');

//REMINDER
define('REMINDER_CREATE', HOME . DS . 'remind/create');
define('REMINDER_UPDATE', HOME . DS . 'remind/update');
define('REMINDER_DELETE', HOME . DS . 'remind/remove');

//REPORT
define('REPORT', HOME . DS . 'reports/attempts');
define('USER_REPORT', HOME . DS . 'userController/report');

define('EXPORT', HOME . DS . 'api/export');

// ---------------------  NEW FENIX DATABASE TABLE -------------------------
define('DB_HOST',         '127.0.0.1');
define('DB_USER',         'root'); 
define('DB_PASS',         '');
define('DB_DATABASE',     '119666250');
define('DB_PORT',         '3306');