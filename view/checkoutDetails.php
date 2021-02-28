<!--<form action="--><?//= getLink('carClass') ?><!--" name="customerDetails" id="customerDetails">-->
    <p><span>Amount: </span><span id="amount"><?= $costSum ?></span></p>
    <label><input type="text" name="name" class="customerName" value="awawaw">Name</label>
    <label><input type="text" name="address">Address</label>
    <label><select form="customerDetails" name="gender">
        <option>Он</option>
        <option>Оно</option>
        <option>Не ясно</option>
    </select>Gender</label>
    <label><input type="text" name="contact">Contact</label>
    <noscript><button type="submit"><b>Send</b></button></noscript>
    <a href="#" id="sendLink"><b>Send</b></a>
<!--</form>-->




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
                "amount" : document.getElementById("amount").innerText
            },

        )

        // data.forEach(console.log)

        let httpRequest = await fetch("/checkoutRequest.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        });
        // console.log(JSON.stringify(data));
        let response = await httpRequest.text();
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
        }
        // console.log(response);

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