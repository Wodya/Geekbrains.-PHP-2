<?php
namespace app\services;

class TwigRender implements IRender
{
    static $twig;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) .'/views');
        self::$twig = new \Twig\Environment($loader);
    }
    public function render($template, $params = [])
    {
        ob_start();
        echo self::$twig->render($template . '.twig', $params);
        $content = ob_get_clean();
        echo self::$twig->render('layouts/main.twig', ['content' => $content]);
    }
}