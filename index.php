<?php

session_start();

require_once __DIR__."/configs/app.config.php";
require_once __DIR__."/configs/db.config.php";
require_once __DIR__ . "/helpers/functions.php";
       

// Auto load project
function customAutoloader($className)
{
    require_once __DIR__ . "/" . $className . '.php';
}
spl_autoload_register('customAutoloader');

// Router
require_once __DIR__ . "/routes/index.php";
