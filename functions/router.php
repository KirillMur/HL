<?php

require_once('functions/title.php');

function router()
{
    $newStyleRoute = extractRoute();
    $oldStyleRoute = $_REQUEST['route'] ?? null;
    $routes = include 'routes.php';

    $defaultRoute = 'main.php';
//    var_export(extractRoute());

//    ob_start();
//    if (!isset($_REQUEST['route'])) {
//        include(PATH . $defaultRoute);
//        $matchedRouteName = true;
//
//    } else {

        foreach ($routes as $route) {
            if (isRightRoute($route['route_template'], $newStyleRoute)) { //проверяется, если имя роут_темплейт совпадает с фактическим
                $theRouterParams = isRightRoute($route['route_template'], $newStyleRoute);
//                ob_start();
                include(PATH . $route['route']);
//                $incl = ob_get_contents();
////                var_dump($incl);
                $matchedRouteName = true;
                break;

            } elseif ($oldStyleRoute === $route['name']) {
                include(PATH . $route['route']);
                $matchedRouteName = true;
                break;

            }
        }
//    }

    $result = [
        'title' => title(),
        'content' => ob_get_clean(),
    ];

    if (!isset($matchedRouteName)) {
        $result['error'] = 'Route doesn\'t exist';
        header("HTTP/1.0 404 Not Found");
    }
//    echo '<pre>';
//    var_export($theRouterParams);
    return $result;
}

/*
 * динамический роутинг должен делать 2 дела
 * 1 найти нужный роут (подключить нужный файл)
 * 2 получить динамические данные, например /car/model/{id} - шаблон
 * /car/model/234 - конкретный адрес с id. ID надо извлечь и по нему из базы найти модель
 *
 * isRightRoute()
 * getMatchedRouteDynamicVars()
 * --
 * другими словами
 * в браузере ввели /car/model/234
 * найти что это совпадает с шаблоном /car/model/{id} и подключить правильный файл
 * извлечь из /car/model/234 цифры 234 и на основе их выполнить запрос в базу
 * ---
 * в браузере ввели /car/model/234/manufacturer/23
 * найти что это совпадает с шаблоном /car/model/{car_id}/manufacturer/{man_id} и подключить правильный файл
 * извлечь из роута извдечь цифры $car_id = 234 и $man_id = 23. На основе их выполнить запрос в базу
 *
 */
function isRightRoute($routeTemplate, $concretUri) //проверяет на соответствие адреса из массива фактическому, возвращает значение параметра (класса),
    // true если адрес совпал но нет параметров или false если адрес из массива не равен фактическому
{
    //готовим два массива для сравнения их значений
    $rtmp = explode('/', $routeTemplate); //записывает разбитую строку из массива $routes route_template
    $conUri = explode('/', $concretUri); //записывает разбитую адресную строку URI до (приходит строка до знака ?)
//var_export($conUri);
    //проверяем совпадает ли кол-во значений в массивах
    if (count($rtmp) !== count($conUri)) { //если количество значений route_template массива $routes не равно фактической адресной строки
        return false;                      //возвращаем фолс
    }

    foreach($rtmp as $pos => $element) { //перебираем значения из адресной строки
//        $a [] = $element;
//var_export($a);
        if (substr($element, 0, 1) === '{' && substr($element, -1, 1) === '}') { //если строка начинается и кончается на фигурные скобки
            $paramName = trim($element, '{}'); //записываем данные из этой строки, без фигурных скобок в $paramName
            $routeParameterssss[$paramName] = urldecode($conUri[$pos]); //в $routeParametressss записываем параметр (class)

        }
// elseif($element !== $conUri[$pos]) { //если значение route_template массива $routes не равно фактической адресной строки
//            return false;
//        }
    }

//var_export($routeParameterssss);
    return $routeParameterssss ?? true;
}

function extractRoute()  //выводит всю строку до знака ?
{
    $uri = $_SERVER['REQUEST_URI'];
    if (strpos($uri, '?') !== false) { //если строка #url содержит ?
        $uri = substr($uri, 0, strpos($uri, '?')); //записываем в $url строку от начала (0) до знака ?
    }
    return $uri;
}