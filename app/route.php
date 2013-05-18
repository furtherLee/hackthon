<?php

$authenticateForRole = function ( $role = 'member' ) {
    return function () use ( $role ) {
#        $user = User::fetchFromDatabaseSomehow();
#        if ( $user->belongsToRole($role) === false ) {
#            $app = \Slim\Slim::getInstance();
#            $app->flash('error', 'Login required');
#            $app->redirect('/login');
#        }
    };
};

$app = new Slim();

$app->get('/', $authenticateForRole('admin'), function() {
    require_once(__DIR__.'/controller/UserController.php');
    $controller = new UserController();
    $controller->showHomePage();
});

$app->get('/login/', function() {
    require_once(__DIR__.'/controller/UserController.php');
    $controller = new UserController();
    $controller->showLogInPage();
});

$app->post('/login/', function() {
    require_once(__DIR__.'/controller/UserController.php');
    $controller = new UserController();
    $controller->login($request.post('email'), $request.post('password'));
});

$app->run();
