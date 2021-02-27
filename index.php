<?php

require_once('functions/router.php');
require_once('functions/getLink.php');
require_once('functions/PDO.php');

define ('PATH', __DIR__.'/');

$page = router();

?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/stylesheet/style.css">
    <title>
        <?= $page['title']; ?>
    </title>
</head>
<body>
<?php

echo $page['content'];

echo $page['error'] ?? null;

//$data = array (
//    'userdata' =>
//        array (
//            'name' => 'awawaw',
//            'address' => 'addr',
//            'gender' => 'Он',
//            'contact' => 'cntct',
//        ),
//    'itemlist' =>
//        array (
//            0 =>
//                array (
//                    'count' => '1',
//                    'cost' => 100500,
//                    'stock_id' => 2,
//                ),
//            1 =>
//                array (
//                    'count' => '3',
//                    'cost' => 100501,
//                    'stock_id' => 4,
//                ),
//            8 =>
//                array (
//                    'count' => '5',
//                    'cost' => 100502,
//                    'stock_id' => 4,
//                ),
//            5 =>
//                array (
//                    'count' => '7',
//                    'cost' => 100503,
//                    'stock_id' => 4,
//                )
//        ),
//);

?>

</body>
</html>