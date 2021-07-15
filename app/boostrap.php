<?php

require_once '../app/config/config.php';

require_once '../app/helpers/url_helper.php';

require_once '../app/helpers/session_helper.php';

require_once '../app/helpers/time_helper.php';

// Autoload Core Libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});