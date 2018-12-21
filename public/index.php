<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

session_start();

\app\base\App::call()->run($config);
