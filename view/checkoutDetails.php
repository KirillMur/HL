<form action="<?= getLink('carClass') ?>" name="customerDetails" id="customerDetails">
    <label><input type="text" name="customerName">Name</label>
    <label><input type="text" name="address">Address</label>
    <label><select form="customerDetails" name="gender">
        <option>Он</option>
        <option>Оно</option>
        <option>Не ясно</option>
    </select>Gender</label>
    <label><input type="text" name="contact">Contact</label>
    <noscript><button type="submit"><b>Send</b></button></noscript>
    <a href="#" id="sendLink"><b>Send</b></a>
</form>




<script>
    document.getElementById("sendLink").onclick = function() {
        document.getElementById("customerDetails").submit();
    }
</script>