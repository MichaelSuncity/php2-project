<?php

namespace app\engine;

use app\interfaces\IRenderer;
use app\engine\App;


class Render implements IRenderer
{
    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templates_dir'] . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}