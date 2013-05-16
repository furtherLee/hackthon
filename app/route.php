<?php

$app = new Slim();

$app->get('/', function() {
    $controller = new UserController();
    $controller->showHomePage();
});

$app->get('/login/', function() {
    $controller = new UserController();
    $controller->showLogInPage();
});

$app->post('/submit/', function() {
    $controller = new SubmitController();
    $controller->submit();
});

$app->post('/review/:id/ask/', function($id) {
    $controller = new ReviewController();
    $controller->ask($id);
});

$app->post('/review/:id/answer/', function($id) {
    $controller = new ReviewController();
    $controller->answer($id);
});

$app->post('/review/:id/answer/', function($id) {
    $controller = new ReviewController();
    $controller->score($id);
});
