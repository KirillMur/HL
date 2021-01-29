<?php
return
[
    [
        'name' => 'main',
        'route_template' => null,
        'route' => 'main.php'
    ],
    [
        'name' => 'contactus',
        'route_template' => null,
        'route' => 'contactus.php'
    ],
    [
        'name' => 'about',
        'route_template' => null,
        'route' => 'about.php'
    ],
    [
        'name' => 'carclass',
        'route_template' => null,
        'route' => 'carClass.php'
    ],
    [
        'name' => 'manufacturer',
        'route_template' => '/cars/class/{class_id}',
        'route' => 'carManufacturer.php'
    ],
    [
        'name' => 'model',
        'route_template' => null,
        'route' => 'carModel.php'
    ],
    [
        'name' => 'modeldetail',
        'route_template' => null,
        'route' => 'carModelDetailed.php'
    ]
];