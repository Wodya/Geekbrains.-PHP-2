<?php
session_start();
include dirname(__DIR__) . '/vendor/autoload.php';
$request = new \app\services\Request();
$controllerName = 'user';
if (!empty($request->getActionName())) {
    $controllerName = $request->getControllerName();
}

$controllerClass = 'app\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $renderer = new \app\services\TwigRenderServices();
    /** @var \app\controllers\Controller $controller */
    $controller = new $controllerClass($renderer, $request);
    echo $controller->run($request->getActionName());
} else {
    echo '404';
}



