<?php

namespace app\services\renderers;


use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    public function render($template, $params = [])
    {
        $loader = new  \Twig_Loader_Filesystem(TEMPLATES_DIR);
        $twig = new \Twig_Environment($loader);
        $template = $twig->load($template . '.php');
        echo $template->render($params);
    }

}