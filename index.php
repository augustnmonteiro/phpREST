<?php

include 'config.php';

define('CONTROLLERS', 'controllers');
define('HELPERS', 'helpers');
define('CORE', 'core');

function __autoload($name)
{
    $paths = array(
        CONTROLLERS . '/' . $name . '.php',
        HELPERS . '/' . $name . '.php',
        CORE . '/' . $name . '.php'
    );

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }

    return false;
}

$url = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$method = $_SERVER['REQUEST_METHOD'];
$controller = $url[1];
$action = @$url[2];

if (!isset($controller) || $controller == '') {
    $controller = 'home';
}

if (!isset($action) || $action == '') {
    $action = 'index';
}

$action = strtolower($method) . '_' . $action;

if (class_exists($controller)) {

    $class = new $controller;

    if (method_exists($class, $action)) {

        echo json_encode($class->$action(array_slice($url, 3)));
    } else {

        http_response_code(412);

        $body = (object)[
            'error' => true,
            'msg' => '404 - Action',
            'controller' => $controller,
            'action' => $action
        ];

        echo json_encode($body);
    }
} else {
    http_response_code(412);

    $body = (object)[
        'error' => true,
        'msg' => '404 - Controller',
        'controller' => $controller,
        'action' => $action
    ];

    echo json_encode($body);
}

?>