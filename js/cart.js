var attrArr = [];
if (attrArr.length === 0 && localStorage.getItem("cartItem")) {
    attrArr = JSON.parse(localStorage.getItem("cartItem"));
}

if (attrArr.length > 0) {
    attrArr.forEach(element => {
        showAddedToCart(element.stock_id);
    })
}

function addItem(id, count)
{
    var countInput = document.getElementById('countInput' + id) || false;

    if (attrArr.length !== 0 && attrArr.find(x => x.stock_id === id)) {
        var objIndex = attrArr.findIndex((x => x.stock_id === id));

        if (attrArr[objIndex].count < count ) {
            if (countInput && countInput.value !== attrArr[objIndex].count && (attrArr[objIndex].count + parseInt(countInput.value)) <= count) {
                attrArr[objIndex].count += parseInt(countInput.value);
                message(id, countInput.value + ' added', 200);
            } else if (countInput && (attrArr[objIndex].count + parseInt(countInput.value)) > count) {
                message(id, 'Wrong quantity', 1000);
                return;
            } else if (!countInput) {
                attrArr[objIndex].count += 1;
                message(id, '1 added', 200);
            }
        } else {
            message(id, 'max count reached', 1000);
            return;
        }
    } else {
        if (countInput.value) {
            if (countInput.value <= count) {
                attrArr.push({"count": parseInt(countInput.value), "stock_id": id});
                setTimeout(message, 1, id, countInput.value + ' added', 200);
            } else {
                message(id, 'Wrong quantity', 1000);
                return;
            }

        } else {
            attrArr.push({"count": 1, "stock_id": id});
            setTimeout(message, 1, id, '1 added', 200);
        }

    }

    showAddedToCart(id);
    storageCartItemsSet(JSON.stringify(attrArr));
}

function removeItem(id)
{
    let objIndex = attrArr.findIndex((x => x.stock_id === id));

    if(!attrArr[objIndex]) {
        return;
    }

    attrArr.splice(objIndex, 1);

    storageCartItemsSet(JSON.stringify(attrArr));
    showAddedToCart(id, true);
    message(id, 'Removed', 300)
}

function message(elementId, msg, delay)
{
    var id = elementId + '.warn';

    if (document.getElementById(id)) {
        document.getElementById(id).remove();
    }

    let warn = document.createElement("span");
    warn.style.paddingLeft = '10px';
    warn.style.color = 'darkorange';
    warn.style.transition = 'opacity 1s';
    warn.id = id;
    warn.innerText = msg;
    if(document.getElementById(elementId).childElementCount !== 0) {
        document.getElementById(elementId).lastElementChild.after(warn);
    } else {
        document.getElementById(elementId).after(warn);
    }
    setTimeout(function () {warn.style.opacity = '0'}, delay)
    warn.addEventListener('transitionend', () => warn.remove());
}

function showAddedToCart(elementId, remove = null)
{
    var id = elementId + '.addedMsg';
    if(remove) {
        if (document.getElementById(id))
            document.getElementById(id).remove();
            return;
    }

    if (document.getElementById(id)) {
        return;
    }
    let addedMsg = document.createElement("span");
    addedMsg.style.paddingLeft = '10px';
    addedMsg.style.color = 'white';
    addedMsg.id = id;
    addedMsg.innerText = 'Added to cart';
    document.getElementById(elementId).lastElementChild.after(addedMsg);
}