<?php

$authenticate = function () {
    return function () {
        if (!fAuthorization::checkLoggedIn()) {
            $app = \Slim\Slim::getInstance();
            $app->redirect($app->urlFor('user_login'));
        }
    };
};

$app = new Slim();

$app->get('/', $authenticate, function() {
    require_once(__DIR__.'/controller/UserController.php');
    $controller = new UserController();
    $controller->showHomePage();
})->name('base');

$app->get('/user/login/', function() {
    require_once(__DIR__.'/controller/UserController.php');
    $controller = new UserController();
    $controller->showLogInPage();
});

$app->get('/user/logout/', function() use ($app) {
    fAuthorization::destroyUserInfo();
    $app->redirect($app->urlFor('base'));
});

$app->post('/user/login/', function() use ($app) {
    require_once(__DIR__.'/controller/UserController.php');
    $req = $app->request();
    $controller = new UserController();

    $controller->login(0, $req->post('email'), $req->post('password'));
})->name('user_login');

$app->post('/deliver/login/', function() use ($app) {
    require_once(__DIR__.'/controller/UserController.php');
    $req = $app->request();
    $controller = new UserController();

    $controller->login(1, $req->post('email'), $req->post('password'));
});

$app->run();
