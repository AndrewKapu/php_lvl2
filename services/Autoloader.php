<?php
namespace php_lvl2\services;

class Autoloader
{    
    public function loadClass($className)
    {
        include ROOT_DIR . '../' . $className . '.php';
    }
}
