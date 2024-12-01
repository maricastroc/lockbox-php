<?php

use function Core\base_path;

require "../models/User.php";

spl_autoload_register(function($class) {
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  
  require base_path($class . '.php');
});

session_start();

require "../Core/functions.php";

$config = require "../config.php";

require "../routes.php";

