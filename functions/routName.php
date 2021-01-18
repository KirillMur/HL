<?php

    function routeName($name)
    {
        $routes = [
            [
                'route' => 'main'
            ],
            [
                'route' => 'contactus'
            ],
            [
                'route' => 'about'
            ]
        ];

        foreach ($routes as $route) {
            if ($name === $route['route']) {
                return $_SERVER['PHP_SELF'].'?route='.$route['route'];
            }
        }
    }
