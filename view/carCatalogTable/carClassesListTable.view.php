<table>
    <?php foreach ($result as $row) : ?>
    <tr>
        <td><a href="/cars/<?= $row['id'] ?>"><b><?= $row['name'] ?></b></a></td>
    </tr>
    <?php endforeach; ?>
</table>
