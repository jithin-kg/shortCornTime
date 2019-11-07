<?php
require_once 'config/config.php';

//load helpers
require_once 'helpers/urlHelper.php';
require_once 'helpers/sessionHelper.php';


//load libraries

ini_set("display_errors",1);
error_reporting(E_ALL);

// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';
spl_autoload_register(function($class){
    require_once 'libraries/'.$class.'.php';
});
