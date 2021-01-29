<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>carModel.php!</h2>
        <?php
        $params = [];

        if (isset($_GET['manufacturer']) && isset($_GET['class'])) {
            $make = $_GET['manufacturer'];
            $class = $_GET['class'];
            $request = "
                SELECT md.id, md.name, md.modification FROM model md
                RIGHT JOIN manufacturer m ON m.id=md.brand_id
                RIGHT JOIN class c ON md.class_id=c.id
                WHERE m.name='{$make}' AND c.name='{$class}'
            ";
        }

        $result = select($request);
        ?>

        <table style="width:20%">
            <?php
            foreach ($result as $row) {
                echo  "<tr>
            <td><a href=" . $_SERVER['PHP_SELF'] . '?route=modeldetail&modelid=' . urlencode($row['id']) .
                    "> " . $row['name'] . " - " . $row['modification'] . "</a></td>
            </tr>";
            }
            ?>
        </table>
    </div>

<?php include 'parts/footer.php'; ?>