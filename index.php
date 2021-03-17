<?php

require_once('functions/router.php');
include_once ('config.php');

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

?>
</body>
</html>