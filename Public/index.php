<?php

session_start();

require('../requirer.php');

use Core\RoutesProvider;
use Core\SessionProvider;

SessionProvider::build('user', []);
SessionProvider::build('routes', []);
SessionProvider::build('app', [
    'view' => 'overall'
]);

document(function () {

    $routes = [];

    RoutesProvider::is('/', function () {
        redirect('/login');
    }, $routes);

    RoutesProvider::is('/signup', function () {
        controller('Signup');
    }, $routes);

    RoutesProvider::is('/login', function () {
        controller('Login');
    }, $routes);

    RoutesProvider::is('/app', function () {
        controller('App');
    }, $routes);

    RoutesProvider::is('/logout', function () {
        controller('Logout');
    }, $routes);

    RoutesProvider::is('/auth-signup', function () {
        controller('AuthSignup');
    }, $routes);

    RoutesProvider::is('/auth-login', function () {
        controller('AuthLogin');
    }, $routes);

    RoutesProvider::is('/hash', function () {
        controller('Hash');
    }, $routes);

    RoutesProvider::is('/page404', function () {
        view('page404');
    }, $routes);

    RoutesProvider::end(function () {
        view('page404');
    }, $routes);

    SessionProvider::set('routes', $routes);
});
