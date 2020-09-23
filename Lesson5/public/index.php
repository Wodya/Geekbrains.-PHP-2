<?php
use app\services\Autoload;

//include dirname(__DIR__) . "/services/Autoload.php";
//spl_autoload_register([(new Autoload()), 'load']);
$loader = include dirname(__DIR__) . "/vendor/autoload.php";
$loader->setPsr4("app\\",dirname(__DIR__));

$controllerName = 'user';
if (!empty($_GET['c'])) {
    $controllerName = trim($_GET['c']);
}

$actionName = '';
if (!empty($_GET['a'])) {
    $actionName = trim($_GET['a']);
}

/*
$user = \app\models\User::getOne(3);
$user->login = 'login11';
$user->name = 'Пользователь 11';
$user->save();
exit;
*/

$controllerClass = 'app\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /** @var \app\controllers\UserController $controller */
    $controller = new $controllerClass();
    echo $controller->run($actionName);
} else {
    echo '404';
}



