<?
use app\services\Autoload;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([(new Autoload()), 'load']);

$controllerName = 'user';
if (!empty(trim($_GET['c']))) {
    $controllerName = trim($_GET['c']);
}

$actionName = '';
if (!empty(trim($_GET['a']))) {
    $actionName = trim($_GET['a']);
}

$controllerClass = 'app\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /** @var \app\controllers\UserController $controller */
    $controller = new $controllerClass();
    echo $controller->run($actionName);
} else {
    echo '404';
}



