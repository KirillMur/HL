<?php
require_once('functions/PDO.php');

function getCheckoutList($idlistForRequest)
{
    return DB::select("SELECT s.color, s.cost, s.count stock_count, s.id stock_id, m.id model_id, mn.name maker_name, m.modification FROM model m
           JOIN stock s ON m.id=model_id
           JOIN manufacturer mn ON mn.id=m.brand_id
           WHERE s.id IN({$idlistForRequest})
           ORDER BY s.id ASC");
}

function orderItemsDataCollect($itemsListString)
{
    return DB::select("SELECT cost, id stock_id FROM stock WHERE id IN($itemsListString)");
}

function insertUserData($userData)
{
    return DB::insertMulti('customers', $userData);
}

function insertOrder($orderAmount, $lastIdCustomers)
{
    return DB::insertMulti('orders', [
        'amount' => $orderAmount,
        'client_id' => $lastIdCustomers
    ]);
}

function insertOrderDetails($itemsList)
{
    DB::insertMulti('order_info', $itemsList);
}