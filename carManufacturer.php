<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>
<?php
//к этому файлу ведет роут /cars/class/{class_id}
?>
    <div class="mainBock">
        <h2>carManufacturer.php!</h2>
<!--        --><?php
//        $params = [];
//
//        $query = $_SERVER['REQUEST_URI'];
////        var_export(explode('/', $query));
////        $q = '/\w$/';
////        var_dump(preg_match($q, $query));
////        var_export($q);
////        $query = explode('&', $query);
////        echo '<pre>';
//////        var_export($query);
////        foreach ($query as $row) {
////            $res [] = explode('=', $row);
////        }
////        var_export($res);
//////        echo $query['class'];
//
//        $classNameFromRoute = $theRouterParams['class_id'];
//        $request = "
//            SELECT m.name FROM manufacturer m
//            RIGHT JOIN model md ON m.id=md.brand_id
//            RIGHT JOIN class c ON md.class_id=c.id
//            WHERE c.name='" . $classNameFromRoute . "' GROUP BY name
//        ";
//
//        $result = select($request);
//        ?>
<!---->
<!--        <table style="width:20%">-->
<!--            --><?php
//            foreach ($result as $row) {
//                echo  "<tr>
//            <td><a href=" . $_SERVER['PHP_SELF'] . '?route=model&manufacturer=' . urlencode($row['name']) .
//                    '&class=' . urlencode($classNameFromRoute) . ">{$row['name']}</a></td>
//            </tr>";
//            }
//            ?>
<!--        </table>-->
    </div>

<?php include 'parts/footer.php'; ?>