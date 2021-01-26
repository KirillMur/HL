<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>carClass.php!</h2>
        <?php
        $params = []; //это мне для усложнения кода)))

        $request = "SELECT name FROM class";
        $result = select($request);
        ?>

        <table style="width:20%">
        <?php
            foreach ($result as $row) {
            echo  "<tr>
            <td><a href=" . $_SERVER['PHP_SELF'] . '?route=manufacturer&class=' . urlencode($row['name']) .
                ">{$row['name']}</a></td>
            </tr>";
            }
        ?>
        </table>
    </div>

<?php include 'parts/footer.php'; ?>


<!--SELECT model.name FROM model-->
<!--JOIN `class` cl ON cl.id = model.class_id-->
<!--WHERE cl.name = '" . $class . "'-->