<?php
require_once('functions/PDO.php');

$answ = file_get_contents('php://input');
$answ = json_decode($answ, true);
$answ = array_shift($answ);
$userData = $answ['userdata'];
$itemsList = $answ['itemlist'];
$costSum = $answ['amount'];

insertMulti('customers', $userData);
$lastIdCustomers = select('SELECT MAX(id) FROM `customers`', true); // last id in customers
insert('orders', 'amount, client_id', "$costSum, $lastIdCustomers");
$lastIdOrder = select('SELECT MAX(id) FROM `orders`', true);

foreach ($itemsList as $item) {
    $item['order_id'] = $lastIdOrder;
    $itemsListWithOrderid [] = $item;
}

insertMulti('order_info', $itemsListWithOrderid);



 var_export($lastIdOrder);
//insert('customers', implode(',', array_keys($userData)), implode(',', array_values($userData)));

//echo 'Success';