<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>
    <div class="mainBock">
        <h2>carManufacturer.php!</h2>
        <?php
        $params = [];

        if (isset($_GET['class'])) {
            $class = $_GET['class'];
            $request = "
                SELECT m.name FROM manufacturer m
                RIGHT JOIN model md ON m.id=md.brand_id
                RIGHT JOIN class c ON md.class_id=c.id
                WHERE c.name='{$class}' GROUP BY name
            ";
        }

        $result = select($request);
        ?>

        <table style="width:20%">
            <?php
            foreach ($result as $row) {
                echo  "<tr>
            <td><a href=" . $_SERVER['PHP_SELF'] . '?route=model&manufacturer=' . urlencode($row['name']) .
                    '&class=' . urlencode($class) . ">{$row['name']}</a></td>
            </tr>";
            }
            ?>
        </table>
    </div>

<?php include 'parts/footer.php'; ?>