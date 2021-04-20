<?php
require_once('model/CarsModel.php');

!$action ?: $result = $action($match);

function showCarClassList()
{
    $result = getCarClassList();
    !empty($result) ? $view = 'view/carCatalogTable/carClassesListTable.view.php' : $message = 'no results <br>';
    include 'view/base.view.php';
}

function showCarMakersPageByClass(array $match)
{
    $result = getCarMakersPageByClass($match[1]);
    !empty($result) ? $view = 'view/carCatalogTable/carMakersListTable.view.php' : $message = 'no results <br>';
    include 'view/base.view.php';
}

function showCarMakersPageByClassAndMaker(array $match)
{
    $result = getCarMakersPageByClassAndMaker($match[2], $match[1]);
    !empty($result) ? $view = 'view/carCatalogTable/carModelsListTable.view.php' : $message = 'no results <br>';
    include 'view/base.view.php';
}

function showCarsStockById(array $match)
{
    $result = getCarsStockById($match[3]);
    !empty($result) ? $view = 'view/carCatalogTable/carModelsStockTable.view.php' : $message = 'no results <br>';
    include 'view/base.view.php';
}

function showCarModelDetails(array $match)
{
    $result = getCarModelDetails($match[1]);
    !empty($result) ? $view = 'view/carCatalogTable/CarModelDetail.php' : $message = 'no results <br>';
    include 'view/base.view.php';
}