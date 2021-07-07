<?
session_start();

use app\engine\App;

//include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";
//spl_autoload_register([new Autoload(), 'loadClass']);

require_once '../vendor/autoload.php';
$config = include __DIR__ . "/../config/config.php";


try {
    App::call()->run($config);
} catch (\Exception $e) {
    echo '<pre>';
    var_dump($e);
    var_dump($e->getTrace());
}