<?php

namespace app\services;


class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    public $params;
    protected $requestMethod;

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
        $this->params = $_REQUEST;
    }

    private function parseRequest()
    {
        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)?#ui";
        if(preg_match_all($pattern, $this->requestString, $matches)){
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    protected function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isPost()
    {
        return $this->getRequestMethod() === 'POST';
    }

    public function isGet()
    {
        return $this->getRequestMethod() === 'GET';
    }

    public function isAjax()
    {
       return $_SERVER['HTTP_X_REQUEST_WITH'] === 'XMLHttpRequest';
    }

    public function getRequestParam($param)
    {
        return $this->params[$param];
    }
}