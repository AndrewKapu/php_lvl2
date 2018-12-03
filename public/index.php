<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR  . "services/Autoloader.php";

spl_autoload_register([new php_lvl2\services\Autoloader(), 'loadClass']);


