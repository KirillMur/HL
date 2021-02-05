<?php
return
[
    [
        'name' => 'main',
        'route_link' => '/',
        'route_pattern' => '_^/$_',
        'route' => 'main.php'
    ],
    [
        'name' => 'contactus',
        'route_link' => '/contactus/',
         'route_pattern' => '_^/contactus/$_',
        'route' => 'contactus.php'
    ],
    [
        'name' => 'about',
        'route_link' => '/about/',
        'route_pattern' => '_^/about/$_',
        'route' => 'about.php'
    ],
    [
        'name' => 'cars',
        'route_link' => '/cars/',
        'route_pattern' => '_^/cars/$_',
        'route' => 'cars.php'
    ],
    [
        'name' => '',
        'route_link' => '',
        'route_pattern' => '_^/cars/([\d+]*)[/]?([\d+]*)[/]?([\d+]*)[/]?$_',
        'route' => 'cars.php'
    ],
//    [
//        'name' => '',
//        'route_link' => '',
//        'route_pattern' => '_^/cars/model/([\d+]*)[/]?$_',
//        'route' => 'cars.php'
//    ]
];