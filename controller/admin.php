<?php include 'parts/header.php'; ?>
<?php require_once('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>admin.php!</h2>

        <?php

        if(isset($_REQUEST['table']) && $_REQUEST['table'] === 'maker') {
            $lastId = DB::insert('manufacturr', 'name', trim($_REQUEST['brandName']));
            (strpos($lastId, 'Error') !== false) ? print_r($lastId) : print_r('Success');

        } elseif (isset($_REQUEST['table']) && $_REQUEST['table'] === 'model') {
            unset($_REQUEST['table']);
            $lastId = DB::insertMulti('model', $_REQUEST);
            (strpos($lastId, 'Error') !== false) ? print_r($lastId) : print_r('Success');

        } elseif (isset($_REQUEST['table']) && $_REQUEST['table'] === 'stock') {
            unset($_REQUEST['table']);
            $lastId = DB::insertMulti('stock', $_REQUEST);
            (strpos($lastId, 'Error') !== false) ? print_r($lastId) : print_r('Success');
        }

        $makers = DB::select('SELECT id, name FROM manufacturer');
        $classes = DB::select('SELECT id, name FROM class');
        $models = DB::select('SELECT id, concat(name, " ", modification) as name, brand_id FROM model');

        ?>


        <?php
//        $login = '';
//
//        if(!isset($login)) {
//            header("refresh:5;url=" . getLink('carClass'));
//            echo 'Access denied!. You must login. You\'ll be redirected in about 5 secs. If not, click <a href=' . getLink('main') . '>here</a>.';
//            return;
//        }
//        echo '343534465476586';

        ?>

        <div id="selector" data-makers='<?= json_encode($makers) ?>' data-classes='<?= json_encode($classes) ?>' data-models='<?= json_encode($models) ?>'>
            <label>
                <select name="option" id="option">
                    <option value="Maker">Maker</option>
                    <option value="Model">Model</option>
                    <option value="Stock">Stock</option>
                </select>Wats up?
            </label>
        </div>
    </div>

<?php include 'parts/footer.php'; ?>

<script src="/js/admin.js"></script>