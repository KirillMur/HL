<?php include 'view/parts/header.php'; ?>

    <div class="mainBock">
        <h2>admin.php!</h2>

        <div id="selector" data-makers='<?= json_encode($makers) ?>'
             data-classes='<?= json_encode($classes) ?>'
             data-models='<?= json_encode($models) ?>'>
            <label>
                <select name="option" id="option">
                    <option value="Maker">Maker</option>
                    <option value="Model">Model</option>
                    <option value="Stock">Stock</option>
                </select>Wats up?
            </label>
        </div>
    </div>

<?php include 'view/parts/footer.php'; ?>

<script src="/js/admin.js"></script>