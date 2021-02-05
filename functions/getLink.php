<?php
    function getLink($name)
    {
        $routes = include 'routes.php';

        foreach ($routes as $route) {
            if ($name === $route['name']) {
                return $route['route_link'];
            }
        }
    }
