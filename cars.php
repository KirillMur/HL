<?php include 'parts/header.php'; ?>
<?php require_once ('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>catalog.php!</h2>
        <?php
        $result = select("SELECT * FROM manufacturer");
        echo '<pre>';
        var_export($result);

        ?>
    </div>

<?php include 'parts/footer.php'; ?>