    <p><span>Amount: </span><span id="amount"><?= $orderAmount ?></span></p>
    <p><label><input type="text" name="name" class="customerName" value="Type name" onfocus="this.value=''">Name</label></p>
    <p><label><input type="text" name="address" value="Type address" onfocus="this.value=''">Address</label></p>
    <p><label><select name="gender">
        <option>Он</option>
        <option>Она</option>
    </select>Gender</label></p>
    <p><label><input type="text" name="contact" value="Your contact" onfocus="this.value=''">Contact</label></p>
    <noscript><button type="submit"><b>Send</b></button></noscript>
    <a href="#" id="sendLink"><b>Send</b></a>

    <script src="/js/checkoutDetails.js"></script>