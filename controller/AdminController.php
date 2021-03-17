<?php
require_once('functions/PDO.php');

//        $login = '';
//
//        if(!isset($login)) {
//            header("refresh:5;url=" . getLink('carClass'));
//            echo 'Access denied!. You must login. You\'ll be redirected in about 5 secs. If not, click <a href=' . getLink('main') . '>here</a>.';
//            return;
//        }
//        echo '343534465476586';

/** TODO добавить валидацию данных форм */

$table = $_REQUEST['table'] ?? null;

if ($table === 'maker') {
    $lastId = DB::insert('manufacture', 'name', trim($_REQUEST['brandName']));

} elseif ($table === 'model') {
    unset($_REQUEST['table']);
    $lastId = DB::insertMulti('model', $_REQUEST);

} elseif ($table === 'stock') {
    unset($_REQUEST['table']);
    $lastId = DB::insertMulti('stock', $_REQUEST);
}

$lastId = $lastId ?? false;
(strpos($lastId, 'Error') !== null) ? print_r($lastId) : print_r('Success');

$makers = DB::select('SELECT id, name FROM manufacturer');
$classes = DB::select('SELECT id, name FROM class');
$models = DB::select('SELECT id, concat(name, " ", modification) as name, brand_id FROM model');

include('view/admin.view.php');