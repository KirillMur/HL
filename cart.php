
<a id='testButton' href="#" onclick="redirectPost(attrArr)" >SEND</a>

<script>
    var attrArr = [];

    function addItem(node, id)
    {
        var count = node.nextElementSibling.value;
        if (count === '' || parseInt(count) === 0) {
            return;
        }

        if (attrArr.find(x => x.id === id)) {
            let objIndex = attrArr.findIndex((x => x.id === id));
            attrArr[objIndex].count = count;
            return;
        }

        attrArr.push({"count" : count, "id" : id});

        console.log('attArr', attrArr);
    }

    function removeItem(id)
    {
        let objIndex = attrArr.findIndex((x => x.id === id));
        console.log();
        attrArr.splice(objIndex, 1);
        document.getElementById(id).value = 0;
        message(id, 'Removed', 300)
    }

    function message(elementId, msg, delay)
    {
        var id = elementId+'.warn';
        if (document.getElementById(id)) {
            // console.log(document.getElementById(id).textContent.includes(msg));
            return;
        }

        let prevElement = document.getElementById(elementId).nextElementSibling;
        let warn = document.createElement("span");
            warn.style.paddingLeft = '10px';
            warn.style.color = 'darkorange';
            warn.style.transition = 'opacity 1s';
            warn.id = id;
            warn.innerText = msg;
            // let prevElement = document.getElementById(elementId);
            prevElement.parentNode.insertBefore(warn, prevElement.nextElementSibling)
            setTimeout(function () {warn.style.opacity = '0'}, delay)
            warn.addEventListener('transitionend', () => warn.remove());
    }

    function redirectPost(data)
    {
        if (attrArr.length === 0)
        {
            message('testButton', 'No data', 2000);
            return;
        }

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
