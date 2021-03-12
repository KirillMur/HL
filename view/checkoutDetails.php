<!--<form action="--><?//= getLink('carClass') ?><!--" name="customerDetails" id="customerDetails">-->
    <p><span>Amount: </span><span id="amount"><?= $orderAmount ?></span></p>
    <p><label><input type="text" name="name" class="customerName" value="awawaw">Name</label></p>
    <p><label><input type="text" name="address">Address</label></p>
    <p><label><select name="gender">
        <option>Он</option>
        <option>Оно</option>
        <option>Не ясно</option>
    </select>Gender</label></p>
    <p><label><input type="text" name="contact">Contact</label></p>
    <noscript><button type="submit"><b>Send</b></button></noscript>
    <a href="#" id="sendLink"><b>Send</b></a>
<!--</form>--> <p></p>




<script>
    // document.getElementById("sendLink").onclick = function() {
    //     document.getElementById("customerDetails").submit();
    // }

    document.getElementById("sendLink").onclick = collectData;

    console.log(localStorage.getItem('cartItem'));

    async function collectData() {
        let data = [];
        data.push({"userdata" :
            {
            "name": document.querySelector('[name="name"]').value,
            "address": document.querySelector('[name="address"]').value,
            "gender": document.querySelector('[name="gender"]').value,
            "contact": document.querySelector('[name="contact"]').value
            },
                "itemlist" : JSON.parse(localStorage.getItem('cartItem')),
                // "amount" : document.getElementById("amount").innerText // удалено из соображений безопасности
            },

        )

        let httpRequest = await fetch("/checkoutRequest.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        });
        let response = await httpRequest.text();
        console.log(response);
        if (httpRequest.ok) {
            document.getElementsByClassName('mainBock')[0].remove();
            let div = document.createElement("div");
            document.body.appendChild(div);
            div.className = 'mainBock';
            let message = document.createElement("span");
            message.id = 'msg';
            message.style.color = 'darkorange';
            message.style.fontWeight = 'bold';
            document.body.appendChild(message);
            document.getElementById('msg').innerHTML = 'Congrats! Your order id: ' + response;
            console.log(response);
            localStorage.clear();
            cartCountSet();
        }

        // var XMLHttpRequest = new XMLHttpRequest();
        // XMLHttpRequest.open('post', '/checkoutRequest.php')


        // var req = new XMLHttpRequest();
        // req.open('post', '/checkoutRequest.php', true);
        // req.onreadystatechange = function (aEvt) {
        //     if (req.readyState === 4) {
        //         if(req.status === 200)
        //             console.log(req.responseText);
        //         else
        //             console.log("Error loading page\n");
        //     }
        //
        // };
        // req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        // req.send(JSON.stringify(data));
    }

</script>