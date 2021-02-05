<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>cars.php!</h2>
        <?php
        $params = []; //это мне для усложнения кода)))

        switch ($flag)
        {
            case 0:
                $request = "SELECT name, id FROM class"; break;
            case 1:
                $request = "SELECT m.name make_name, m.id make_id, c.id class_id FROM manufacturer m
                             RIGHT JOIN model md ON m.id=md.brand_id
                             RIGHT JOIN class c ON md.class_id=c.id
                             WHERE c.id='{$match[1]}' GROUP BY m.name"; break;
            case 2:
                $request = "SELECT md.*, c.name class_name FROM model md
                            RIGHT JOIN manufacturer m ON m.id=md.brand_id
                            RIGHT JOIN class c ON md.class_id=c.id
                            WHERE m.id='{$match[2]}' AND c.id='{$match[1]}'"; break;
            case 3:
                $request = "SELECT s.*, m.id model_id, m.modification FROM model m
                            RIGHT JOIN stock s ON m.id=model_id
                            WHERE m.id={$match[3]}"; break;
            case 4:
                $request = "SELECT * FROM model m
                            RIGHT JOIN stock s ON m.id=model_id
                            WHERE m.id={$match[1]}"; break;
        }

        if (empty($result = select($request))){
            echo 'no results';
        }

            ?>
        <table style="width:auto">
            <?php
            switch ($flag) {
                case 0:
                    foreach ($result as $row) {
                        echo "<tr><td><a href=" . "/cars/" . $row['id'] . ">
                    <b>" . $row['name'] . " </b></a></td></tr>";
                    }
                    break;
                case 1:
                    foreach ($result as $row) {
                        echo  "<tr><td><a href=" . "/cars/" . $row['class_id'] . "/" . $row['make_id'] . ">
                    <b>". $row['make_name'] ." </b></a></td></tr>";
                    } break;
                case 2:
                    foreach ($result as $row) {
                        echo  "<tr> <td><a href=" . "/cars/" . $row['class_id'] . "/" . $row['brand_id'] . "/"
                            . $row['id'] ."><b>". $row['modification'] . " </b></a></td></tr>";
                    } break;
                case 3:
                    foreach ($result as $row) {
                        echo  "<tr><th>Комплектация</th><th>Цвет</th><th>Цена</th></tr>
                        <tr><td><a href=" . "/cars/model/" . $row['model_id'] . ">" . $row['modification'] . "</a>
                        <td>" . $row['color'] . "</td><td>" . $row['cost'] . " </b></td></tr>";
                    } break;
                case 4:
                    foreach ($result as $row) {
                        echo  "<tr><th>Цена</th><th>Комплектация</th><th>Цвет</th><th>Доступное кол-во</th></tr>
                        <tr><td>$ " .  $row['cost']  . " </td><td><b> " . $row['modification'] . " </td>
                        <td> " . $row['color'] . " </td><td> " . $row['count'] . " </b></td></tr>";
                    } break;
            }
            ?>
        </table>
<!--        <br>-->
<!--        <br>-->
<!--        <a href="/cars/4/3/22">Link: /cars/4/3/</a>-->
<!--        <br>-->
<!--        --><?php //echo '<pre>'; print_r($match); ?>

    </div>
<?php include 'parts/footer.php'; ?>


<!--на каждом этапе записывать класс, производителя и модель в переменную и использовать в последующем запросе-->
<div style="visibility: hidden">

1. Если в ссылке /cars/(что-то)/(что-то)/(что-то)/
0 => /cars/что-то/что-то/что-то/
1 => что-то
2 => что-то
3 => что-то

- есть [0] - роут /cars/ - работаем дальше, если нет - завершаем работу
- есть [1] - выполняем запрос в SQL - выбрать все классы и вывести их
- есть [2] - выполняем запрос в SQL - выбрать все классы [1] и производителя [2], и вывести их
- есть [3] - выполняем запрос в SQL - выбрать все классы [1], производителя [2] и модель [3], и вывести их
</div>