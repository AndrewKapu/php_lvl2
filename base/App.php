<?php

namespace app\base;


use app\traits\TSingletone;

class App
{
    use TSingletone;

    public $config;
    /** @var Storage */
    private $components;

    public static function call(){
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    private function runController()
    {
        $controllerName = $this->request->getControllerName()?: $this->config['defaultController'];
        $actionName = $this->request->getActionName();
        $controllerClass = $this->config['controllerNamespaces'] . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)){
            /** @var \app\controllers\ProductController $controller */
            $controller = new $controllerClass(
                new \app\services\renderers\TemplateRenderer()
            );
            $controller->runAction($actionName);
        }
    }

    public function createComponent($name)
    {
        if ($params = $this->config['components'][$name]) {
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
            throw new \Exception("Не определён класс компонента");
        }
        throw new \Exception("Компонент {$name} не найден");
    }

    function __get($name)
    {
        return $this->components->get($name);
    }
}