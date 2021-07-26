<?php

    // create file directory
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'php-projects' . DS .'user-management');
    defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'includes');
    defined('UPLOADS_PATH') ? null : define('UPLOADS_PATH', SITE_ROOT . DS . 'uploads'. DS);


    // initialize all require one file

    require_once('config.php');



?>