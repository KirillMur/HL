<?php
require_once('model/CartModel.php');

if(!empty($_POST['cartData'])) {
    if($_POST['cartData'] === '[]') {
        unset($_SESSION['cartData']);
        emptyCartAction();
    } else {
        $_SESSION['cartData'] = json_decode($_POST['cartData'], true);
        showCart($_SESSION['cartData']);
    }
} elseif(!empty($_POST['checkout'])) {
    $_SESSION['cartData'] = json_decode($_POST['checkout'], true);
    orderCheck($_SESSION['cartData']);
} elseif(!empty($_POST['confirm'])) {
    $_SESSION['cartData'] ? orderConfirm($_POST['confirm']) : emptyCartAction();
} elseif($_SESSION['cartData']) {
    showCart($_SESSION['cartData']);
}  else {
    emptyCartAction();
}

function getCartList($data)
{
    $idlist = array_column($data, 'stock_id');
    $idlistForRequest = implode(',', $idlist);
    array_multisort($idlist,SORT_ASC, $data);

    $result = getCheckoutList($idlistForRequest);

    $orderAmount = null;
    $keyed = array_column($data, null, 'stock_id'); // присваиваем ключам значения поля stock_id
    foreach ($result as &$item) {
        if (isset($keyed[$item['stock_id']])) {
            $item += $keyed[$item['stock_id']];
            $orderAmount += $item['cost'] * $item['count'];
        }
    }

    return ['data' => $result] + ['amount' => $orderAmount];
}

function orderConfirm($data)
{
    $data = json_decode($data, true);
    $userData = $data['userdata'];
    $itemsList = $data['itemlist']; // count, stock_id

    $itemsListString = implode(',', array_column($itemsList, 'stock_id'));
    $cost = orderItemsDataCollect($itemsListString) ; // выбираем из stock стоимость (и id) всех позиций в заказе
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
    $lastIdCustomers = insertUserData($userData); // записываем в базу данные о пользователе $userData и получаем последний id записи

// 2. Записываем orders, получаем id заказа
    $lastIdOrder = insertOrder($orderAmount, $lastIdCustomers);

    foreach ($itemsList as &$item) {
        $item['order_id'] = $lastIdOrder;
    }

// 3. Записываем order_info, все позиции заказа отдельными строками
    insertOrderDetails($itemsList);

    settype($lastIdOrder, "integer"); //избавляемся от кавычек в выводе

    unset($_SESSION['cartData']);

    !empty($lastIdOrder) ? $view = 'view/cart/congrats.view.php' : returnToMainPage();
    include 'view/base.view.php';
}

function orderCheck($data)
{
    $result = getCartList($data);

    !empty($result) ? $view = 'view/cart/checkout.view.php' : returnToMainPage();
    include 'view/base.view.php';
}

function showCart($data)
{
    $result = getCartList($data);

    !empty($result) ? $view = 'view/cart/cart.view.php' : returnToMainPage();
    include 'view/base.view.php';
}

function emptyCartAction()
{
    $message = "Your cart is empty. Add some cool things to cart and come back!<br> 
    Checkout our cars catalog <a href=" . getLink('carClass') . ">here</a>.";
    include 'view/base.view.php';
}

function returnToMainPage()
{
    header( "refresh:5;url=" . getLink('carClass'));
    $message = 'We\'re so sorry!. You\'ll be redirected in about 5 secs. If not, click <a href=' . getLink('carClass') . '>here</a>.';
    include 'view/base.view.php';
}