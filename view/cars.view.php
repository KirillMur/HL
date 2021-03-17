<?php include 'view/parts/header.php'; ?>

<div class="mainBock">
    <h2>cars.php!</h2>

    <?php

    !empty($result) ? include 'view/parts/сars.table.part.php' : print_r('no results <br>');
    $currentRouteName === 'carModelOnStock' ? include 'view/parts/cars.cart.part.php' : null;

    ?>

</div>

<?php include 'view/parts/footer.php'; ?>
