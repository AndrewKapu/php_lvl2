<?php

namespace app\models;


use app\interfaces\IController;

abstract class Controller implements IController
{

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
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . '.php';
        include $templatePath;
        return ob_get_clean();
    }


}