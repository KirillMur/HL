setCartCountColor("cart", "white");
cartCountSet();

function storageSet()
{
    localStorage.setItem("cartItem", JSON.stringify(attrArr))
    cartCountSet();
}

function cartCountSet()
{
    if (localStorage.getItem("cartItem")) {
        let localStorageLength = JSON.parse(localStorage.getItem("cartItem")).length;
        document.getElementById('cart').getElementsByTagName('span')[0].innerHTML = localStorageLength;
    } else {
        document.getElementById('cart').getElementsByTagName('span')[0].innerHTML = 0;
    }
    setCartCountColor("cart", "white");
}

function setCartCountColor(element, color = null)
{
    if (JSON.parse(localStorage.getItem("cartItem")) && JSON.parse(localStorage.getItem("cartItem")).length !== 0) {
        document.getElementById(element).getElementsByTagName('span')[0].style.fontWeight = "bold";
        document.getElementById(element).style.color = color;
    } else {
        document.getElementById(element).style.color = "unset";
        document.getElementById(element).getElementsByTagName('span')[0].style.fontWeight = "unset";
    }
}