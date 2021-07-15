<?php

require_once '../app/libraries/DotEnv.php';

$dir = $_SERVER['DOCUMENT_ROOT'];

(new DotEnv($dir . '/.env'))->load();

/** DB Params */
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USERNAME'));
define('DB_PASS', getenv('DB_PASSWORD'));
define('DB_NAME', getenv('DB_DATABASE'));

/** Time and Timezone */
define('APP_TIMEZONE', getenv('APP_TIMEZONE'));

/** App root */
define('APPROOT', dirname(dirname(__FILE__)));

/**URL root */
define('URLROOT', getenv('APP_URL'));

/** Site Name */
define('SITENAME', getenv('APP_NAME'));

/** App Version */
define('APP_VERSION', '1.0.0');