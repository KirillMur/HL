<table>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><a href="/cars/<?= $row['class_id'] . "/" . $row['brand_id'] . "/"
                . $row['id'] ?>"><b><?= $row['modification'] ?></b></a></td>
        </tr>
    <?php endforeach; ?>
</table>
