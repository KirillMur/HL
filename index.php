<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>
        <?php
        require_once ('functions/title.php');
        title();
        ?>
    </title>
</head>
<body>
<?php
require_once ('config.php');
require_once ('functions/router.php');
require_once ('functions/routName.php');


define ('PATH', __DIR__.'/');

router(); //так как в функции выполняется die, все, что после нее не выполняется. И это мне не нравится! - уже нет!

echo '<h3>Эта надпись ниже - везде!</h3>
Получилось убрать то, что мне не нравилось в роутере с ифами и форичем: так как форыч не зависит от ретурна иф, то
приходилось в ифе и элсе ставить экзит, чтоб форыч не выполнялся далее. Здесь же, за счет break, этого удалось избежать
и сократить код в 2 раза! (break с форычем использовать не удалось)';
?>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"-->
<!--        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">-->
<!--</script>-->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>
