<?php

// require_once "../libraries/DotEnv.php";

// $dotenv = new DotEnv(__DIR__ . "/.env");

// $dotenv->load();

/** DB Params */
define('DB_HOST', 'DB_HOST');
define('DB_USER', 'DB_USER');
define('DB_PASS', 'DB_PASSWORD');
define('DB_NAME', 'DB_NAME');

/** App root */
define('APPROOT', dirname(dirname(__FILE__)));

/**URL root */
define('URLROOT', 'APP_URL');

/** Site Name */
define('SITENAME', 'APP_NAME');