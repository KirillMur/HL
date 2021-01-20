<?php
    function getLink($name)
    {
//        $routes = [
//            [
//                'route' => 'main'
//            ],
//            [
//                'route' => 'contactus'
//            ],
//            [
//                'route' => 'about'
//            ],
//            [
//                'route' => 'carscat'
//            ]
//        ];
//
//        foreach ($routes as $route) {
//            if ($name === $route['route']) {
//                return $_SERVER['PHP_SELF'].'?route='.$route['route'];
//            }
//        }
        switch ($name)
        {
            case 'contactus':
                return $_SERVER['PHP_SELF'].'?route=contactus';
            case 'about':
                return $_SERVER['PHP_SELF'].'?route=about';
            case 'carscat':
                return $_SERVER['PHP_SELF'].'?route=carscat';
            default:
                return $_SERVER['PHP_SELF'].'?route=main';
        }
    }
