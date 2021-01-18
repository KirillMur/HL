<?php
function router()
{
    $routes = [
        [
            'name' => 'main',
            'route' => 'main.php'
        ],
        [
            'name' => 'contactus',
            'route' => 'contactus.php'
        ],
        [
            'name' => 'about',
            'route' => 'about.php'
        ]
    ];
    $defaultRoute = 'main.php';

    if (!isset($_REQUEST['route'])) {

        include(ROOT. $defaultRoute);
        exit;
    } else {
        foreach ($routes as $route) {
            if ($_REQUEST['route'] == $route['name']) {
                include(ROOT. $route['route']);
                die;
            }
        }
    }
    die('Route doesn\'t exist');
}
