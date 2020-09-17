<?
use app\services\Autoload;
use \app\models\Good;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([(new Autoload()), 'load']);

$user = new \app\models\User();
$userModel = $user->getOne(16);
var_dump($userModel);
echo '<hr>';
var_dump($user->getAll());

$user = new \app\models\User();
$user->name = 'Tim';
$user->login = 'Tim007';
$user->password = '123456';
//$user->insert();
$user->save();

$user = new \app\models\Good();
$user->id = 2;
$user->name = 'Tim';
$user->price = 'Tim007';
$user->info = '123456';
//$user->insert();
$user->save();

?>

<a href="?p=1">456</a>

<? var_dump($_GET);?>


