<?php

namespace Hm5\Views;

use Pug;

/**
 * Class View
 * @package Hm5\Views
 */
class View
{
    /**
     * @var
     */
    private $path;

    /**
     * View constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
        // __DIR__ . '/../../public/'
    }

    /**
     * @param $uri
     * @param array $data
     */
    public function open_view($uri, $data = [])
    {

//        echo (new Pug())->render( $this->path . "views/$uri.pug", $data);
        $loader = new Twig_Loader_Filesystem($this->path);
        $twig = new Twig_Environment($loader, array(
//            'cache' => '/path/to/compilation_cache',
        ));
        echo $twig->render("$uri.html", $data);
        die();
    }
}