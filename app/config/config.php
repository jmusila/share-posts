<?php

// require_once "../libraries/DotEnv.php";

// $dotenv = new DotEnv(__DIR__ . "/.env");

// $dotenv->load();

/** DB Params */
define('DB_HOST', 'localhost');
define('DB_USER', 'myuser');
define('DB_PASS', '123Me!@#');
define('DB_NAME', 'share_posts');

/** App root */
define('APPROOT', dirname(dirname(__FILE__)));

/**URL root */
define('URLROOT', 'http://shareposts.com');

/** Site Name */
define('SITENAME', 'SharePosts');