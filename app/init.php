<?php
fSession::setPath(SESSION_PATH);
fSession::setLength("1 day");
fORMDatabase::attach(new fDatabase("mysql", DB_NAME, DB_USER, DB_PASS, DB_HOST));
fAuthorization::setLoginPage(HOST_URL.'/user/login/');
Twig_Autoloader::register();

fAuthorization::setAuthLevels(
    array(
        'user'  => 50,
        'guest' => 25
    )
);
