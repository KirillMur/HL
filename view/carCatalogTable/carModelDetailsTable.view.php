<table>
    <tr>
        <th>Цена</th><th>Комплектация</th><th>Цвет</th><th>Доступное кол-во</th>
    </tr>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?= '$' . $row['cost']  ?></td>
            <td><b><?= $row['modification'] ?></td>
            <td><?= $row['color'] ?></td>
            <td><?= $row['count'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
