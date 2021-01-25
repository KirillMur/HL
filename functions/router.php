<?php

require_once('functions/title.php');

function router()
{
    $routes = include 'routes.php';

    $defaultRoute = 'main.php';

    ob_start();
    if (!isset($_REQUEST['route'])) {
        include(PATH . $defaultRoute);
        $matchedRouteName = true;

    } else {
        foreach ($routes as $route) {
            if ($_REQUEST['route'] === $route['name']) {
                include(PATH . $route['route']);
                $matchedRouteName = true;
                break;
            }
        }
    }

    $result = [
        'title' => title(),
        'content' => ob_get_clean(),
    ];

    if (!isset($matchedRouteName)) {
        $result['error'] = 'Route doesn\'t exist';
        header("HTTP/1.0 404 Not Found");
    }

    return $result;
}