<?php
function router ()
{
//    $routes = [
//        [
//            'name' => 'main',
//            'route' => 'main.php'
//        ],
//        [
//            'name' => 'contactus',
//            'route' => 'contactus.php'
//        ],
//        [
//            'name' => 'about',
//            'route' => 'about.php'
//        ],
//        [
    //        'name' => 'carscat',
    //        'route' => 'cars.php'
//        ]
//    ];
//    $defaultRoute = 'main.php';
//
//    if (!isset($_REQUEST['route'])) {
//
//        include(PATH. $defaultRoute);
//        exit;
//    } else {
//        foreach ($routes as $route) {
//            if ($_REQUEST['route'] == $route['name']) {
//                include(PATH. $route['route']);
//                die;
//            }
//        }
//    }
//    die('Route doesn\'t exist');

    switch ($_REQUEST['route'] ?? 'main')
    {
        case 'main':
            include(PATH . 'main.php');
            break;
        case 'contactus':
            include(PATH . 'contactus.php');
            break;
        case 'about':
            include(PATH . 'about.php');
            break;
        case 'carscat':
            include(PATH . 'cars.php');
            break;
        default:
            echo 'Route doesn\'t exist';
            die;
    }
}
