<?php include 'parts/header.php'; ?>
<?php require_once('model/cars.model.php'); ?>
<?php require_once('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>cars.php!</h2>

        <?php
        $result = carsRequest($currentRouteName, $match);

        include('view/catalogCarsTable.php');
        ?>

        <br>
        <br>

        <?php ($currentRouteName === 'carModelOnStock') ? (include 'cart.php') : null; ?>

    </div>

<?php include 'parts/footer.php'; ?>
