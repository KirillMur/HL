<?php

function router()
{
    $routes = include 'routes.php';

    ob_start();

    foreach ($routes as $res) {
        if (preg_match($res['route_pattern'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), $match) === 1) {
            $currentRouteName = $res['name'];
            $currentPageTitle = $res['page_title'];
            include($res['route']);
        }
    }

    $result = [
        'title' => $currentPageTitle ?? NULL,
        'content' => ob_get_clean()
    ];

    if (empty($result['content'])) {
        $result['error'] = "Route doesn't exist";
        header("HTTP/1.0 404 Not Found");
    }

    return $result;
}
//
//
//function extractRoute()  //выводит всю строку до знака ?
//{
//    echo '<pre>';
//    var_export($_GET); die;
//    $uri = $_SERVER['REQUEST_URI'];
//    if (strpos($uri, '?') !== false) { //если строка #url содержит ?
//        $uri = substr($uri, 0, strpos($uri, '?')); //записываем в $url строку от начала (0) до знака ?
//    }
//    return $uri;
//}