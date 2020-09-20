<?php
use app\services\Autoload;
use \app\models\Good;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([(new Autoload()), 'load']);

$user = new \app\models\User();
var_dump($user->getOne(3));
var_dump($user->getAll());

$user = new \app\models\User();
$user->name = 'Пользователь 333';
$user->login = 'login33';
$user->password = 'pass 22';
$user->save();

$user->id = 3;
$user->name = 'Пользователь 333';
$user->login = 'login33';
$user->password = 'pass 22';
$user->save();
?>



