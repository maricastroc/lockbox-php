<?php

require "models/Gender.php";

require "models/User.php";

require "models/Movie.php";

require "models/Rating.php";

require "Flash.php";

session_start();

require "functions.php";

$config = require "config.php";

require 'Database.php';

require 'Validation.php';

require "routes.php";

