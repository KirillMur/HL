function gotoCart(data)
{
    sendForm(data, 'cartData');
}

function gotoCheckout(data)
{
    sendForm(data, 'checkout');
}

function orderConfirm(data) {
    sendForm(JSON.stringify(data), 'confirm');
}

function sendForm(data, name) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = '/cart';
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = name;
    input.value = data;

    form.appendChild(input);
    form.submit();
}