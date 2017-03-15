{extends file='../layouts/main.tpl'}

{block name="content"}
    <a href="/cart" class="btn btn-primary">{#text_back_to_cart#}</a>
    <br>
    <br>
    <form action="/confirm-order" method="post">
        <label for="customerFirstName">{#text_your_first_name#}</label>
        <br>
        <input id="customerFirstName" name="customerFirstName" type="text" required>
        <br>
        <br>
        <label for="customerSecondName">{#text_your_last_name#}</label>
        <br>
        <input id="customerSecondName" name="customerSecondName" type="text" required>
        <br>
        <br>
        <label for="customerEmail">{#text_your_email#}</label>
        <br>
        <input id="customerEmail" name="customerEmail" type="email" required>
        <br>
        <br>
        <label for="customerMobile">{#text_your_mobile#}</label>
        <br>
        <input id="customerMobile" name="customerMobile" type="tel" required>
        <br>
        <br>
        {#text_total_price#}: $ {$totalPrice}
        <br>
        {#text_total_amount#}: {$totalAmount}
        {if $totalAmount eq 1}
            {#text_in_cart_item#}
        {else}
            {#text_in_cart_items#}
        {/if}
        <br>
        <input type="submit" class="btn btn-success" value="{#text_do_order#}">
    </form>
{/block}