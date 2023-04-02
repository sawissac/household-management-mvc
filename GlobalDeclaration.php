<?php

const BASE_PATH = __DIR__ . '/';
const VIEW_PATH = BASE_PATH . 'View/';
const CORE_PATH = BASE_PATH . 'Core/';
const CONTROLLER_PATH = BASE_PATH . 'Controller/';
const MODEL_PATH = BASE_PATH . 'Models/';
const MIDDLEWARE_PATH = BASE_PATH . 'Middleware/';

function debug_die($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function view($path, $dependency = [])
{
    extract($dependency);
    require(VIEW_PATH . $path . '.view.php');
}

function controller($path)
{
    require(CONTROLLER_PATH . $path . '.php');
}

function middleware($path)
{
    return require(MIDDLEWARE_PATH . $path . '.php');
}

function document($callback)
{
    view("document", ['insertComponent' => $callback]);
}

function redirect($route)
{
    header('location: ' . $route);
}

function autoLoadDir($PATH)
{
    $files = scandir($PATH);

    foreach ($files as $file) {
        // ignore special directories . and ..
        if ($file == '.' || $file == '..') {
            continue;
        }

        // require the file name
        require($PATH . $file);
    }
}