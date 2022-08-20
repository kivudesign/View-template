<?php
include "vendor/autoload.php";
use Wepesi\Routing\Router;
use Wepesi\View;


$router = new Router();

$router->get('/', function () {
    $view = new View();
    $view->display('home');
});
/**
 * with sub folder
 */
$router->get('/child', function () {
    $view = new View();
    $view->display('child/hello.html');
});
/**
 * with an other root folder
 */
$router->get('/other-root', function () {
    $view = new View();
    $view->setRoot('/demo');
    $view->assign('users', [
        ['name' => 'John Doe'],
        ['name' => 'Jane Doe']
    ]);
    $view->display('users.php');
});

$router->run();