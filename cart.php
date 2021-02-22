
<a id='testButton' href="#" onclick="sendPostToCheckout(attrArr)" >SEND</a>

<script>
    var attrArr = [];
    if (attrArr.length === 0 && localStorage.getItem("cartItem")) {
        attrArr = JSON.parse(localStorage.getItem("cartItem"));
    }

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

        storageSet();

        // console.log('attArr', attrArr);
    }

    function removeItem(id)
    {
        let objIndex = attrArr.findIndex((x => x.id === id));
        console.log();
        attrArr.splice(objIndex, 1);
        document.getElementById(id).value = 0;

        storageSet();

        message(id, 'Removed', 300)
    }

    function message(elementId, msg, delay)
    {
        var id = elementId+'.warn';
        if (document.getElementById(id)) {
            // console.log(document.getElementById(id).textContent.includes(msg));
            return;
        }

        let warn = document.createElement("span");
        warn.style.paddingLeft = '10px';
        warn.style.color = 'darkorange';
        warn.style.transition = 'opacity 1s';
        warn.id = id;
        warn.innerText = msg;
        // let element = document.getElementById(elementId).nextElementSibling;
        // element.parentNode.insertBefore(warn, element.nextElementSibling)
        document.getElementById(elementId).nextElementSibling.after(warn);
        setTimeout(function () {warn.style.opacity = '0'}, delay)
        warn.addEventListener('transitionend', () => warn.remove());
    }

    function sendPostToCheckout(data)
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
