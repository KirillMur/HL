<?php
return
[
    [
        'name' => 'admin',
        'page_title' => 'Admin',
        'route_link' => '/admin',
        'route_pattern' => '_^/admin/?$_',
        'route' => 'controller/admin.php'
    ],
    [
        'name' => 'main',
        'page_title' => 'MAIN',
        'route_link' => '/',
        'route_pattern' => '_^/$_',
        'route' => 'main.php'
    ],
    [
        'name' => 'contactus',
        'page_title' => 'Contact Us',
        'route_link' => '/contactus/',
        'route_pattern' => '_^/contactus/$_',
        'route' => 'contactus.php'
    ],
    [
        'name' => 'about',
        'route_link' => '/about/',
        'page_title' => 'About Us',
        'route_pattern' => '_^/about/?$_',
        'route' => 'about.php'
    ],
    [
        'name' => 'carClass',
        'page_title' => 'Cars',
        'route_link' => '/cars/',
        'route_pattern' => '_^/cars/$_',
        'route' => 'controller/cars.php'
    ],
    [
        'name' => 'carMaker',
        'page_title' => 'Cars',
        'route_link' => '',
        'route_pattern' => '_^/cars/(\d+)[/]?$_',
        'route' => 'controller/cars.php'
    ],
    [
        'name' => 'carModel',
        'page_title' => 'Cars',
        'route_link' => '',
        'route_pattern' => '_^/cars/(\d+)/(\d+)[/]?$_',
        'route' => 'controller/cars.php'
    ],
    [
        'name' => 'carModelOnStock',
        'page_title' => 'Cars',
        'route_link' => '',
        'route_pattern' => '_^/cars/(\d+)/(\d+)/(\d+)[/]?$_',
        'route' => 'controller/cars.php'
    ],
    [
        'name' => 'carModelDetail',
        'page_title' => 'Model Detail',
        'route_link' => '',
        'route_pattern' => '_^/cars/model/(\d+)[/]?$_',
        'route' => 'controller/cars.php'
    ],
    [
        'name' => 'checkout',
        'page_title' => 'Check out',
        'route_link' => '/checkout',
        'route_pattern' => '_^/checkout/?$_',
        'route' => 'controller/checkout.php'
    ]
];