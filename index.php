<?php
session_start();

require_once('controller/RouterController.php');
include_once ('config.php');

//session_id('68hnt1eitva02rpfsd20e561sc');
//session_start();
//
//// Удаляем все переменные сессии.
//$_SESSION = array();
//
//// Если требуется уничтожить сессию, также необходимо удалить сессионные cookie.
//// Замечание: Это уничтожит сессию, а не только данные сессии!
//if (ini_get("session.use_cookies")) {
//    $params = session_get_cookie_params();
//    setcookie(session_name(), '', time() - 42000,
//        $params["path"], $params["domain"],
//        $params["secure"], $params["httponly"]
//    );
//}
//
//// Наконец, уничтожаем сессию.
//session_destroy();

define ('PATH', __DIR__.'/');

$page = router();

?><!DOCTYPE html>
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

?>
</body>
</html>