<?php include 'parts/header.php'; ?>
<?php require_once('functions/PDO.php'); ?>

    <div class="mainBock">
        <h2>admin.php!</h2>


        <div id="selector">
            <label>
                <select name="option" id="option">
                    <option value="Maker">Maker</option>
                    <option value="Model">Model</option>
                    <option value="Stock">Stock</option>
                </select>Wats up?
            </label>
        </div>

        <?php

        if(isset($_REQUEST['table']) && $_REQUEST['table'] === 'maker') {
            $lastId = DB::insert('manufacturer', 'name', trim($_REQUEST['brandName']));
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
    </div>

<?php include 'parts/footer.php'; ?>

<script>

    document.getElementById('option').onchange = function() {
        createForm();
        sessionSet('selectStatus', document.getElementById('option').value);
    }

    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "http://lp.com/admin");
    }

    window.onload = function ()
    {
        let inputsList = document.createElement('div');
        inputsList.id = 'formDiv';
        document.getElementsByClassName('mainBock')[0].appendChild(inputsList);

        if(sessionGet('selectStatus')) {
            document.getElementById('option').value = sessionGet('selectStatus');
        }
        createForm();
        //createSelect('form', <?//= json_encode($makers) ?>//); а здесь находит
    }

    //createSelect('form', <?//= json_encode($makers) ?>//);  //здесь не находит id form

    function createForm()
    {
        if(document.getElementById('form')) {
            document.getElementById('form').remove();
        }
        document.getElementById('formDiv').innerHTML = '<form action="" method="post" id="form"></form>';
        createInputs();
        createSubmit('form');
    }

    function createSubmit()
    {
        if(document.getElementsByClassName("submit")[0]){
            document.getElementsByClassName("submit")[0].remove();
        }
        // document.getElementById('form').innerHTML += '<input class="submit" type="submit" value="ADD">';
        let submit = document.createElement('input');
        submit.type = 'submit';
        submit.className ="submit";
        submit.value = "ADD";
        document.getElementById('form').lastChild.after(submit);
    }

    function brandIdGet(selectId)
    {
        let brandId = document.getElementById(selectId).value;
        sessionSet('brand_id', brandId);
        return brandId;
    }

    function createInputs()
    {
        let value = document.getElementById('option').value;
        let tableName = document.createElement('input');
        tableName.name = 'table';
        tableName.type = 'text';
        tableName.defaultValue = value.toLowerCase();
        tableName.hidden = true;
        document.getElementById('form').appendChild(tableName);

        if (value === 'Maker') {
            console.log('Maker');

            document.getElementById('form').innerHTML +=
                '<p>' +
                '<input name="brandName" id="brandField" required>' +
                '<label for="brandField">brand</label>' +
                '</p>';

        } else if (value === 'Model') {
            console.log('Model');

            let fields = ["name", "modification"];
            createFields('form', fields);

            if(sessionGet('defaultOptionBrand')) {
                var selectIdBrand = createSelect('form', <?= json_encode($makers) ?>, 'brand_id', sessionGet('defaultOptionBrand'));
            } else {
                selectIdBrand = createSelect('form', <?= json_encode($makers) ?>, 'brand_id');
            }
            document.addEventListener('change', function(e) {
                if (e.target.id === selectIdBrand) {
                    sessionSet('defaultOptionBrand', document.getElementById(selectIdBrand).value);
                }
            });

            if(sessionGet('defaultOptionClass')) {
                var selectIdClass = createSelect('form', <?= json_encode($classes) ?>, 'class_id', sessionGet('defaultOptionClass'));
            } else {
                selectIdClass = createSelect('form', <?= json_encode($classes) ?>, 'class_id');
            }
            document.addEventListener('change', function(e) {
                if (e.target.id === selectIdClass) {
                    sessionSet('defaultOptionClass', document.getElementById(selectIdClass).value);
                }
            });

        } else if (value === 'Stock') {
            console.log('Stock');


            let fields = ["color", "count", "cost"];
            createFields('form', fields);

            if(sessionGet('defaultOption')) {
                var selectId = createSelect('form', <?= json_encode($makers) ?>, 'brand_id', sessionGet('defaultOption'));
            } else {
                selectId = createSelect('form', <?= json_encode($makers) ?>, 'brand_id');
            }
            document.addEventListener('change', function(e) {
                if (e.target.id === selectId) {
                    sessionSet('defaultOption', document.getElementById(selectId).value);
                }
            });

            let modelsData = <?= json_encode($models) ?> ;
            let brandId = brandIdGet(selectId);
            let currentBrandList = modelsData.filter(x => x.brand_id === brandId);

            createSelect('form', currentBrandList, 'model_id');
            document.addEventListener('change', function(e) {
                if (e.target.id === selectId) {
                    let brandId = brandIdGet(selectId);
                    let currentBrandList = modelsData.filter(x => x.brand_id === brandId);
                    createSelect('form', currentBrandList, 'model_id');
                    createSubmit('form');
                }
            });
        }
    }

    function createFields(elementId, fields)
    {
        for (let i = 0; i < fields.length; i++) {
            document.getElementById(elementId).innerHTML +=
                '<p>' +
                '<input name=' + fields[i] + ' id=' + fields[i] + ' required>' +
                '<label for=' + fields[i] + '>' + fields[i] + '</label>' +
                '</p>';
        }
    }

    function createSelect(elementId, data, columnName, selected = null)
    {
        let p = document.createElement('p');
        let select = document.createElement('select');
        let id = 'select' + columnName;

        if(document.getElementById(id)){
            document.getElementById(id).parentElement.remove()
        }

        select.name = columnName;
        select.id = id;
        let el = document.getElementById(elementId);

        p.appendChild(select);
        el.appendChild(p);

        data.forEach(element => {
            if(selected === element.id){
                select.innerHTML +=
                '<option selected value=' + element.id + '>' + element.name + '</option>';
            } else {
                select.innerHTML +=
                    '<option value=' + element.id + '>' + element.name + '</option>';
            }
        })

        let label = document.createElement('label');
        label.innerHTML = columnName;
        label.setAttribute('for', id);
        select.after(label);

        return id;
    }

    function sessionSet(key, value)
    {
        window.sessionStorage.setItem(key, value);
    }
    function sessionGet(key)
    {
        return window.sessionStorage.getItem(key);
    }

</script>