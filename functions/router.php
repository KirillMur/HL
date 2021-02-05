<?php
//echo '<pre>';
//var_export($_SERVER);
require_once('functions/title.php');

function router()
{
    $routes = include 'routes.php';

    ob_start();

    foreach ($routes as $res) {
        if (preg_match($res['route_pattern'], $_SERVER['REQUEST_URI'], $match) === 1) {
            if (!isset($match[1]) && !isset($match[2]) && !isset($match[3])) {
                $flag = 0;
                include($res['route']);
                break;
            } elseif (isset($match[1]) && empty($match[2]) && empty($match[3]) && isset($match[2]) && isset($match[3])) {
                $flag = 1;
                include($res['route']);
                break;
            } elseif (isset($match[1]) && isset($match[2]) && empty($match[3])) {
                $flag = 2;
                include($res['route']);
                break;
            } elseif (isset($match[1]) && isset($match[2]) && isset($match[3])) {
                $flag = 3;
                include($res['route']);
                break;
            } elseif (isset($match[1]) && !isset($match[2]) && !isset($match[3])) {
                $flag = 4;
                include($res['route']);
                break;
            }
        }
    }

    $result = [
        'title' => title(),
        'content' => ob_get_clean()
    ];

    if (empty($result['content'])) {
        $result['error'] = 'Route doesn\'t exist';
        header("HTTP/1.0 404 Not Found");
    }

    return $result;
}


//function extractRoute()  //выводит всю строку до знака ?
//{
//    $uri = $_SERVER['REQUEST_URI'];
//    if (strpos($uri, '?') !== false) { //если строка #url содержит ?
//        $uri = substr($uri, 0, strpos($uri, '?')); //записываем в $url строку от начала (0) до знака ?
//    }
//    return $uri;
//}