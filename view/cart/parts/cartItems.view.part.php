<table>
<tr>
    <th>Бренд</th><th>Комплектация</th><th>Цвет</th><th>Цена</th><th>В заказе</th>
</tr>
<?php
    foreach ($result['data'] as $key => $row) : ?>
    <tr class="tdRight">
        <td ><b><?= $row['maker_name'] ?></b></td>
        <td><i><a href="/cars/model/<?=
                $row['model_id'] ?>"><?= $row['modification'] ?></a></i></td>
        <td><?= $row['color'] ?></td><td><?= '$'. $row['cost'] ?></td>
        <td><?= $row['count'] ?></td>
    </tr>
<?php endforeach; ?>
</table>
<!-- вывод перед подтверждением заказа -->