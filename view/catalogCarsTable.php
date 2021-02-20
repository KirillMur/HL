     <table>
            <?php

            switch ($currentRouteName) :
                case 'carClass': ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><a href="/cars/<?= $row['id'] ?>"><b><?= $row['name'] ?></b></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php break;
                case 'carMaker': ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><a href="/cars/<?= $row['class_id'] . "/" . $row['make_id'] ?>">
                            <b><?=$row['make_name'] ?></b></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php break;
                case 'carModel': ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><a href="/cars/<?= $row['class_id'] . "/" . $row['brand_id'] . "/"
                            . $row['id'] ?>"><b><?= $row['modification'] ?></b></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php break;
                case 'carModelOnStock': ?>
                        <tr>
                            <th>Бренд</th><th>Комплектация</th><th>Цвет</th><th>Цена</th>
                        </tr>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td ><b><?= $row['maker_name'] ?></b></td>
                            <td><i><a href="/cars/model/<?=
                            $row['model_id'] ?>"><?= $row['modification'] ?></a></i></td>
                            <td><?= $row['color'] ?></td><td><?= '$'. $row['cost'] ?></td>
                            <td><a href="#" data-id='<?= $row['stock_id'] ?>'
                                   onclick="addItem(this, <?= $row['stock_id'] ?>); return false"><b>Buy</b></a>
                                <input type="number" class="buyCount" id="<?= $row['stock_id'] ?>" value="1" min="1" pattern="^[0-9]+$">
                                <a href="#" data-id='<?= $row['stock_id'] ?>'
                                onclick="removeItem(<?= $row['stock_id'] ?>); return false"><b>X</b></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php break;
                case 'carModelDetail': ?>
                        <tr>
                            <th>Цена</th><th>Комплектация</th><th>Цвет</th><th>Доступное кол-во</th>
                        </tr>
                    <?php foreach ($result as $row) : ?>
                         <tr>
                             <td><?= '$' . $row['cost']  ?></td><td><b><?= $row['modification'] ?></td>
                             <td><?= $row['color'] ?></td><td><?= $row['count'] ?></td>
                         </tr>
                    <?php endforeach; ?>
                    <?php break; ?>

                <?php
            endswitch;
            ?>
     </table>