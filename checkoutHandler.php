<?php
require_once('functions/PDO.php');

$answ = file_get_contents('php://input');
$answ = json_decode($answ, true);
$answ = array_shift($answ);
$userData = $answ['userdata'];
$itemsList = $answ['itemlist']; // count, stock_id

$itemsListString = implode(',', array_column($itemsList, 'stock_id'));
$cost = DB::select("SELECT cost, id stock_id FROM stock WHERE id IN($itemsListString)"); // выбираем из stock стоимость (и id) всех позиций в заказе
$orderAmount = NULL;
$keyed = array_column($cost, NULL, 'stock_id'); // присваиваем ключам значения поля stock_id
foreach ($itemsList as &$item) { // модифицирует $itemsList
    if (isset($keyed[$item['stock_id']])) {
        $item['cost'] = $keyed[$item['stock_id']]['cost']; // дополняем подмассив стоимостью товара по id
        $item['amount'] = $item['cost'] * $item['count']; // дополняем подмассив суммарной стоимостью товара по cost и count
        $orderAmount += $item['cost'] * $item['count']; // получаем суммарную стоимость заказа
    }
}

// 1. Записываем customers, получаем id клиента
$lastIdCustomers = DB::insertMulti('customers', $userData); // записываем в базу данные о пользователе $userData и получаем последний id записи

// 2. Записываем orders, получаем id заказа
$lastIdOrder = DB::insertMulti('orders', [ // записываем в orders amount и client_id
    'amount' => $orderAmount,
    'client_id' => $lastIdCustomers
]);
foreach ($itemsList as &$item) {
    $item['order_id'] = $lastIdOrder;
}

// 3. Записываем order_info, все позиции заказа отдельными строками
DB::insertMulti('order_info', $itemsList);

settype($lastIdOrder, "integer");
var_export($lastIdOrder);