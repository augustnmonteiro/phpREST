<?php

include 'config.php';

define('CONTROLLERS', 'controllers/');
define('HELPERS', 'helpers/');
define('CORE', 'core/');

function __autoload($name)
{
    if (file_exists(CONTROLLERS . '/' . $name . '.php')) {
        require_once CONTROLLERS . '/' . $name . '.php';
        return true;
    } else if (file_exists(HELPERS . '/' . $name . '.php')) {
        require_once HELPERS . '/' . $name . '.php';
        return true;
    } else if (file_exists(CORE . '/' . $name . '.php')) {
        require_once CORE . '/' . $name . '.php';
        return true;
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
