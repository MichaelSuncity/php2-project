<?php

namespace app\engine;

use app\interfaces\IRenderer;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TwigRender implements IRenderer
{
  protected $twig;

  public function __construct()
  {
      $loader = new FilesystemLoader(TWIGTEMPLATES_DIR);
      $this->twig = new Environment ($loader);
  }
   
    public function renderTemplate ($template, $params=[])
    {
      return $this->twig->render($template. '.tmpl', $params);
    }
}