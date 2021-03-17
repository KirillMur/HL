<?php
return
[
    [
        'name' => 'admin',
        'page_title' => 'Admin',
        'route_link' => '/admin',
        'route_pattern' => '_^/admin/?$_',
        'controller' => 'controller/AdminController.php'
    ],
    [
        'name' => 'main',
        'page_title' => 'MAIN',
        'route_link' => '/',
        'route_pattern' => '_^/$_',
        'controller' => 'controller/StaticPageController.php',
        'action' => 'main'
    ],
    [
        'name' => 'contactus',
        'page_title' => 'Contact Us',
        'route_link' => '/contactus/',
        'route_pattern' => '_^/contactus/$_',
        'controller' => 'controller/StaticPageController.php',
        'action' => 'contactus'
    ],
    [
        'name' => 'about',
        'route_link' => '/about/',
        'page_title' => 'About Us',
        'route_pattern' => '_^/about/?$_',
        'controller' => 'controller/StaticPageController.php',
        'action' => 'about'
    ],
    [
        'name' => 'carClass',
        'page_title' => 'Cars',
        'route_link' => '/cars/',
        'route_pattern' => '_^/cars/$_',
        'controller' => 'controller/CarsController.php',
    ],
    [
        'name' => 'carMaker',
        'page_title' => 'Cars',
        'route_link' => '',
        'route_pattern' => '_^/cars/(\d+)[/]?$_',
        'controller' => 'controller/CarsController.php',
    ],
    [
        'name' => 'carModel',
        'page_title' => 'Cars',
        'route_link' => '',
        'route_pattern' => '_^/cars/(\d+)/(\d+)[/]?$_',
        'controller' => 'controller/CarsController.php',
    ],
    [
        'name' => 'carModelOnStock',
        'page_title' => 'Cars',
        'route_link' => '',
        'route_pattern' => '_^/cars/(\d+)/(\d+)/(\d+)[/]?$_',
        'controller' => 'controller/CarsController.php',
    ],
    [
        'name' => 'carModelDetail',
        'page_title' => 'Model Detail',
        'route_link' => '',
        'route_pattern' => '_^/cars/model/(\d+)[/]?$_',
        'controller' => 'controller/CarsController.php',
    ],
    [
        'name' => 'checkout',
        'page_title' => 'Check out',
        'route_link' => '/checkout',
        'route_pattern' => '_^/checkout/?$_',
        'controller' => 'controller/CheckoutController.php'
    ]
];