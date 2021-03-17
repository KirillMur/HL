<?php

require_once('model/cars.model.php');

$result = carsRequest($currentRouteName, $match);

include 'view/cars.view.php';