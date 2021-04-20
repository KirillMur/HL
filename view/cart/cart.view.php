<table>
    <tr>
        <th>Бренд</th><th>Комплектация</th><th>Цвет</th><th>Цена</th><th>Доступно</th><th>В заказе</th>
    </tr>
    <?php foreach ($result['data'] as $row) : ?>
        <tr class="tdRight" id="<?= $row['stock_id'] ?>">
            <td ><b><?= $row['maker_name'] ?></b></td>
            <td><i><a href="/cars/model/<?=
                    $row['model_id'] ?>"><?= $row['modification'] ?></a></i></td>
            <td><?= $row['color'] ?></td>
            <td><span>$</span><span id="cost"><?= $row['cost'] ?></span></td>
            <td><?= $row['stock_count'] ?></td>
            <td><?= $row['count'] ?></td>
            <td>
                <a href="#"
                   onclick="addItem(<?= $row['stock_id'] ?>, <?= $row['stock_count'] ?>); return false"><b>Add</b>
                </a>
                <input type="number" class="buyCount" id="<?= 'countInput' . $row['stock_id'] ?>" value="1" min="1"
                       max="<?= $row['stock_count'] ?>" pattern="^[0-9]+$">
                <a href="#"
                   onclick="removeItem(<?= $row['stock_id'] ?>); return false"><b>Remove from cart</b>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p><span>Amount: </span><span id="amount"><?= $result['amount'] ?></span></p>
<p><a href="#" onclick="gotoCart(localStorage.getItem('cartItem'))">Обновить корзину</a></p>
<p><a href="#" onclick="gotoCheckout(localStorage.getItem('cartItem'))" ><b>To checkout!</b></a></p>
Это cart.view.php, страница со всеми товарами в корзине, данные в которой взяты из БД по id из localStorage через $_SESSION
<script src="/js/cart.js"></script>
<script src="/js/gotoCart.js"></script>