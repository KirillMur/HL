
<a id='testButton' href="#" onclick="redirectPost(attrArr)" >SEND</a>

<script>
    var attrArr = [];

    function addItem(node, id)
    {
        var count = node.nextElementSibling.value;
        if (count === '' || parseInt(count) === 0) {
            return;
        }

        var objIndex;
        if (attrArr.find(x => x.id === id)) {
            objIndex = attrArr.findIndex((x => x.id === id));
            attrArr[objIndex].count = count;
            return;
        }

        attrArr.push({"count" : count, "id" : id});

        console.log('attArr', attrArr);
    }

    function removeItem(id)
    {
        objIndex = attrArr.findIndex((x => x.id === id));
        attrArr.splice(objIndex, 1);
    }

    function redirectPost(data) {
        var form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = '<?php echo getLink('checkout') ?>';

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'cartData';
        input.value = JSON.stringify(data);
        form.appendChild(input);
        form.submit();
    }

</script>
