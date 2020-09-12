<?
include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([(new Autoload()), 'load']);

$bd = new DB();
$good = new Good($bd);
echo $good->getOne(12);
echo '<hr>';
echo $good->getAll();

