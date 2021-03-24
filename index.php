<?php
//if (!isset($_SESSION)) {
//ini_set('session.use_cookies', 1);
//    ini_set('session.cookie_secure', '0');
    session_start();
//}
//set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\k2');
require_once('functions/router.php');
//require_once('controller/AccessController.php');
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
//var_export($_SESSION);
//var_export($_COOKIE);

echo $page['content'];

echo $page['error'] ?? null;

?>
</body>
</html>