document.getElementById("sendLink").onclick = collectData;

async function collectData() {

    let data = {
            "userdata":
                {
                    "name": document.querySelector('[name="name"]').value,
                    "address": document.querySelector('[name="address"]').value,
                    "gender": document.querySelector('[name="gender"]').value,
                    "contact": document.querySelector('[name="contact"]').value
                },
            "itemlist": JSON.parse(localStorage.getItem('cartItem')),
        }

    orderConfirm(data)
    storageCartItemsSet('[]');
}


//     let httpRequest = await fetch("/controller/CartController.php", {
//     method: 'POST',
//     headers: {
//     'Content-Type': 'application/json;charset=utf-8'
// },
//     body: JSON.stringify(data)
// });
//     let response = await httpRequest.text();
//     console.log(response);
//     if (httpRequest.ok) {
//     document.getElementsByClassName('mainBock')[0].remove();
//     let div = document.createElement("div");
//     document.body.appendChild(div);
//     div.className = 'mainBock';
//     let message = document.createElement("span");
//     message.id = 'msg';
//     message.style.color = 'darkorange';
//     message.style.fontWeight = 'bold';
//     document.body.appendChild(message);
//     document.getElementById('msg').innerHTML = 'Congrats! Your order id: ' + response;
//     console.log(response);
//     localStorage.clear();
//     cartCountSet();
// }
