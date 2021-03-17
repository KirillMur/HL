<?php
require_once('functions/PDO.php');

$post = $_POST['cartData'] ?? null;
$data = json_decode($post, true);//$data is now a php array

if (empty($data))
{
    header( "refresh:5;url=" . getLink('carClass'));
    echo 'Data is empty. You\'ll be redirected in about 5 secs. If not, click <a href=' . getLink('carClass') . '>here</a>.';
    return;
}

$idlist = array_column($data, 'stock_id');
$idlistForRequest = implode(',', $idlist);
array_multisort($idlist,SORT_ASC, $data);
$countlist = array_column($data, 'count');

$request = "SELECT s.color, s.cost, s.id stock_id, m.id model_id, mn.name maker_name, m.modification FROM model m
           JOIN stock s ON m.id=model_id
           JOIN manufacturer mn ON mn.id=m.brand_id
           WHERE s.id IN({$idlistForRequest})
           ORDER BY s.id ASC";

$result = DB::select($request);
$orderAmount = null;
$keyed = array_column($data, NULL, 'stock_id'); // присваиваем ключам значения поля stock_id
foreach ($result as &$item) { // чудо-функция
    if (isset($keyed[$item['stock_id']])) {
        $item += $keyed[$item['stock_id']];
        $orderAmount += $item['cost'] * $item['count'];
    }
}

include 'view/checkout.view.php';