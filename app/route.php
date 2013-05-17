<?php

$app = new Slim();

$app->get('/', function() {
    require_once(__DIR__.'/controller/UserController.php');
    $controller = new UserController();
    $controller->showHomePage();
});

$app->get('/login/', function() {
    require_once(__DIR__.'/controller/UserController.php');
    $controller = new UserController();
    $controller->showLogInPage();
});

$app->post('/submit/', function() {
    require_once(__DIR__.'/controller/SubmitController.php');
    $controller = new SubmitController();
    $controller->submit();
});

$app->post('/review/:id/ask/', function($id) {
    require_once(__DIR__.'/controller/ReviewController.php');
    $controller = new ReviewController();
    $controller->ask($id);
});

$app->post('/review/:id/answer/', function($id) {
    require_once(__DIR__.'/controller/ReviewController.php');
    $controller = new ReviewController();
    $controller->answer($id);
});

$app->post('/review/:id/answer/', function($id) {
    require_once(__DIR__.'/controller/ReviewController.php');
    $controller = new ReviewController();
    $controller->score($id);
});

$app->run();
