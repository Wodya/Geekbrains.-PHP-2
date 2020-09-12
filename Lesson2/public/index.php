<?php
namespace app;
use app\services\Autoload;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([(new Autoload()), 'load']);

$bd = new services\DB();
$good = new models\Good($bd);
echo $good->getOne(12);
echo '<hr>';
echo $good->getAll();
