{extends file='../layouts/main.tpl'}

{block name="content"}
    <a href="/cart" class="btn btn-primary">Back to cart</a>
    <br>
    <br>
    <form action="/confirm-order" method="post">
        <label for="customerFirstName">Your first name</label>
        <br>
        <input id="customerFirstName" name="customerFirstName" type="text" required>
        <br>
        <br>
        <label for="customerSecondName">Your second name</label>
        <br>
        <input id="customerSecondName" name="customerSecondName" type="text" required>
        <br>
        <br>
        <label for="customerEmail">Your email</label>
        <br>
        <input id="customerEmail" name="customerEmail" type="email" required>
        <br>
        <br>
        <label for="customerMobile">Your mobile number</label>
        <br>
        <input id="customerMobile" name="customerMobile" type="tel" required>
        <br>
        <br>
        total price: $ {$totalPrice}
        <br>
        total Amount: {$totalAmount}
        <br>
        <input type="submit" class="btn btn-success" value="Do order!">
    </form>
{/block}