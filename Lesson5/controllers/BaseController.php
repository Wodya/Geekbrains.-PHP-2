<?php
namespace app\controllers;

use app\services\IRender;
use app\services\TwigRender;

class BaseController
{
    /**
     * @var IRender $render;
     */
    protected $actionDefault = 'all';
    protected static $render;

    public function __construct()
    {
        self::$render = new TwigRender();
    }

    public function run($action)
    {
        if (empty($action)) {
            $action = $this->actionDefault;
        }

        $action .= "Action";

        if (!method_exists($this, $action)) {
            return '404';
        }

        return $this->$action();
    }
    public function render($template, $params = [])
    {
        self::$render->render($template, $params);
        /*
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl(
            'layouts/main',
            [
                'content' => $content
            ]
        );
        */
    }
    public function renderTmpl($template, $params = [])
    {
        extract($params);
        ob_start();
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
    protected function getId()
    {
        if (empty($_GET['id'])) {
            return 0;
        }

        return (int)$_GET['id'];
    }
}