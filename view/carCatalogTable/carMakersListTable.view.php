<table>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><a href="/cars/<?= $row['class_id'] . "/" . $row['make_id'] ?>">
                    <b><?=$row['make_name'] ?></b></a></td>
        </tr>
    <?php endforeach; ?>
</table>
