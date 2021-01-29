<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>carClass.php!</h2>
        <?php
        $params = []; //это мне для усложнения кода)))

        $request = "SELECT name FROM class";
        $result = select($request);
        ?>

        <table style="width:auto%">
            <?php
            foreach ($result as $row) {
                echo  "<tr>
            <td><a href=" . $_SERVER['PHP_SELF'] . '?route=manufacturer&class=' . urlencode($row['name']) .
                    "> ". $_SERVER['PHP_SELF'] . '?route=manufacturer&class=<b>' . $row['name'] ." </b></a></td>
            </tr>";
            }
            ?>
            <span><?php echo PATH . 'aaa' ?></span>
        </table>
    </div>

<?php include 'parts/footer.php'; ?>


<!--на каждом этапе записывать класс, производителя и модель в переменную и использовать в последующем запросе-->