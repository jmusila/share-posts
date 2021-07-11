<?php

// require_once "../libraries/DotEnv.php";

// $dotenv = new DotEnv(__DIR__ . "/.env");

// $dotenv->load();

/** DB Params */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123Postgres');
define('DB_NAME', 'shareposts');

/** App root */
define('APPROOT', dirname(dirname(__FILE__)));

/**URL root */
define('URLROOT', 'http://shareposts.com');

/** Site Name */
define('SITENAME', 'SharePosts');

/** App Version */
define('APP_VERSION', '1.0.0');