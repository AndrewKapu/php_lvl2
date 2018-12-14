<?php

namespace app\controllers;


use app\interfaces\IController;
use app\interfaces\IRenderer;
use app\services\renderers\TemplateRenderer;
use app\services\renderers\TwigRenderer;

abstract class Controller implements IController
{

    protected $action;
    protected $defaultAction = "index";
    protected $useLayout = true;
    protected $layout = 'main';

    protected $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
        if ($renderer instanceof TwigRenderer) {
            $this->useLayout = false;
        }
    }


    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
        }
    }

    public function getCorrectTplPath($template) :string
    {
        $tplFolderName = $this->getTplFolderName();
        return $template = $tplFolderName . $template;
    }

    protected function render($template, $params)
    {
        $template = $this->getCorrectTplPath($template);
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", ['content' => $this->renderTemplate($template, $params)]);
        }
        return $this->renderTemplate($template, $params);
    }

    /**
     * Составляет наши шаблоны
     * @param $template string имя шаблона
     * @param $params array параметры
     * @return false|string
     */
    protected function renderTemplate($template, $params)
    {
       return $this->renderer->render($template, $params);
    }

}