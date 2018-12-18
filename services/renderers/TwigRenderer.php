<?php

namespace app\services\renderers;


use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    protected $templater;

    public function __construct()
    {
        $loader = new  \Twig_Loader_Filesystem(TEMPLATES_DIR);
        $this->templater = new \Twig_Environment($loader);

    }

    public function render($template, $params = [])
    {
        $template = $this->templater->load($template . '.php');
        echo $template->render($params);
    }

}