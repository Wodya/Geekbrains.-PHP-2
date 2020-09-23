<?php
namespace app\controllers;

class BaseController
{
    protected $actionDefault = 'all';

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
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl(
            'layouts/main',
            [
                'content' => $content
            ]
        );
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