    <p><span>Amount: </span><span id="amount"><?= $result['amount'] ?></span></p>
    <p><label><input type="text" name="name" class="customerName" placeholder="Type name">Name</label></p>
    <p><label><input type="text" name="address" placeholder="address">Address</label></p>
    <p><label><select name="gender">
        <option>Он</option>
        <option>Она</option>
    </select>Gender</label></p>
    <p><label><input type="text" name="contact" placeholder="Your contact">Contact</label></p>
    <noscript><button type="submit"><b>Send</b></button></noscript>
    <a href="#" id="sendLink"><b>Send</b></a>

    <script src="/js/orderConfirm.js"></script>
    <script src="/js/gotoCart.js"></script>