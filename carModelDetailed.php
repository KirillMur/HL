<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>carModelDetailed.php!</h2>
        <?php
        $params = [];

        if (isset($_GET['modelid'])) {
            $modelId = $_GET['modelid'];
            $request = "
                SELECT * FROM model m
                RIGHT JOIN stock s ON m.id=model_id
                WHERE m.id={$modelId}
            ";
        }

        $result = select($request);

        if (empty($result)) {
            echo 'Out of stock!';
            return;
        }
        ?>

        <table style="width:20%">
            <?php
            foreach ($result as $row) {
                echo  "<tr>
            <td> " . $row['name'] . " </td><td> " . $row['modification'] . " </td><td> " . $row['color'] . " </td>
            <td>Price: $ " . $row['cost'] . " </td>
            </tr>";
            }
            ?>
        </table>
    </div>

<?php include 'parts/footer.php'; ?>