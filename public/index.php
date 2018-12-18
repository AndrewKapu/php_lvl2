<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ROOT_DIR . 'vendor/autoload.php';


$request = new \app\services\Request();
$controllerName = $request->getControllerName()?: DEFAULT_CONTROLLER;
$actionName = $request->getActionName();

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)){

    /** @var \app\controllers\ProductController $controller */
    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
    );
    $controller->runAction($actionName);
}
