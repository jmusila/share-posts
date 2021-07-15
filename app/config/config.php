<?php

require_once '../app/libraries/DotEnv.php';

(new DotEnv(__DIR__ . '/.env'))->load();

/** DB Params */
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USERNAME'));
define('DB_PASS', getenv('DB_PASSWORD'));
define('DB_NAME', getenv('DB_DATABASE'));

/** App root */
define('APPROOT', dirname(dirname(__FILE__)));

/**URL root */
define('URLROOT', 'http://shareposts.com');

/** Site Name */
define('SITENAME', 'SharePosts');

/** App Version */
define('APP_VERSION', '1.0.0');