<?php
$items =
    array (
        0 =>
            array (
                'count' => '72',
                'stock_id' => 2,
            ),
        1 =>
            array (
                'count' => '65',
                'stock_id' => 5,
            ),
        2 =>
            array (
                'count' => '88',
                'stock_id' => 8,
            ),
        3 =>
            array (
                'count' => '93',
                'stock_id' => 3,
            ),
        4 =>
            array (
                'count' => '17',
                'stock_id' => 7,
            )
    );

$cost = array (
    0 =>
        array (
            'cost' => '124003',
            'stock_id' => '3',
        ),
    1 =>
        array (
            'cost' => '124002',
            'stock_id' => '2',
        ),
    2 =>
        array (
            'cost' => '124008',
            'stock_id' => '8',
        ),
    3 =>
        array (
            'cost' => '124007',
            'stock_id' => '7',
        ),
    4 =>
        array (
            'cost' => '124005',
            'stock_id' => '5',
        )
);

// $keyed - массив $cost с дополнительными данными с ключами = значению поля stock_id
array (
    3 =>
        array (
            'cost' => '124003',
            'stock_id' => '3',
        ),
    2 =>
        array (
            'cost' => '124002',
            'stock_id' => '2',
        ),
    8 =>
        array (
            'cost' => '124008',
            'stock_id' => '8',
        ),
    7 =>
        array (
            'cost' => '124007',
            'stock_id' => '7',
        ),
    5 =>
        array (
            'cost' => '124005',
            'stock_id' => '5',
        ),
);

$keyed = array_column($cost, NULL, 'stock_id'); // присваиваем ключам значения поля stock_id
foreach ($items as &$row) { // чудо-функция
    if (isset($keyed[$row['stock_id']])) {
        $row += $keyed[$row['stock_id']];
    }
}


foreach ($items as &$row) {
    $stockId = $row['stock_id']; // $stockId = 2
    if (isset($keyed[$stockId])) { //  if (isset($keyed[2])
        $cost = $keyed[$stockId]['cost']; // $count = $keyed[2]['cost'] // $count = 124001
        $row['cost'] = $cost; // $row['cost'] = 124001
    }
}

array ( // результат - измененный $items
    0 =>
        array (
            'count' => '2',
            'stock_id' => 2,
            'cost' => '124002',
        ),
    1 =>
        array (
            'count' => '5',
            'stock_id' => 5,
            'cost' => '124005',
        ),
    2 =>
        array (
            'count' => '8',
            'stock_id' => 8,
            'cost' => '124008',
        ),
    3 =>
        array (
            'count' => '3',
            'stock_id' => 3,
            'cost' => '124003',
        ),
    4 =>
        array (
            'count' => '7',
            'stock_id' => 7,
            'cost' => '124007',
        ),
);
