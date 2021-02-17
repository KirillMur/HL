<?php include 'parts/header.php'; ?>

<div class="mainBock">
    <h2>checkout.php!</h2>
<pre>
<?php

    $data = json_decode($_POST['cartData'], true); //$data is now a php array

    var_export($data);

    ?>
</pre>
<?php include 'parts/footer.php'; ?>

