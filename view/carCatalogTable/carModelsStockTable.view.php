<table>
    <tr>
        <th>Бренд</th><th>Комплектация</th><th>Цвет</th><th>Цена</th><th>Доступно</th>
    </tr>
    <?php foreach ($result as $row) : ?>
        <tr class="tdRight" id="<?= $row['stock_id'] ?>">
            <td ><b><?= $row['maker_name'] ?></b></td>
            <td><i><a href="/cars/model/<?=
                    $row['model_id'] ?>"><?= $row['modification'] ?></a></i></td>
            <td><?= $row['color'] ?></td>
            <td><span>$</span><span id="cost"><?= $row['cost'] ?></span></td>
            <td><?= $row['stock_count'] ?></td>
            <td>
                <a href="#"
                   onclick="addItem(<?= $row['stock_id'] ?>, <?= $row['stock_count'] ?>); return false"><b>Add</b>
                </a>
                <a href="#"
                   onclick="removeItem(<?= $row['stock_id'] ?>); return false"><b>Remove</b>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="#" onclick="gotoCart(localStorage.getItem('cartItem'))" >To CART</a>
Это вьюха CarModelsStock.php, где можно добавить и удалить товар из localStorage
<script src="/js/cart.js"></script>