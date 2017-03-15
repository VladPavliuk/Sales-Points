<div>
    <h3 align="center"><a href="http://www.vladdev.com">Internet shop "Sales Point"</a></h3>
    <table border="2">
        <tr>
            <th>№</th>
            <th>{#text_title#}</th>
            <th>{#text_price#}</th>
            <th></th>
        </tr>
        {$id = 1}
        {foreach from=$cart key=idInCart item=cartItem}
            <tr>
                <td>{$id}</td>
                <td>{$cartItem["title"]}</td>
                <td>$ {$cartItem["price"]}</td>
                <td><a href="/cart-delete/{$idInCart}">{#text_remove#}</a></td>
            </tr>
            {$id = $id + 1}
        {/foreach}
    </table>
    <h3>Order Info</h3>
    {#text_total_price#}: $ {$totalPrice}
    <br>
    {#text_total_amount#}: {$totalAmount}
    {if $totalAmount eq 1}
        {#text_in_cart_item#}
    {else}
        {#text_in_cart_items#}
    {/if}
    <h3>Customer Info</h3>
    {#text_first_name#}: {$firstName}
    <br>
    {#text_last_name#}: {$lastName}
    <br>
    {#text_email#}: {$email}
    <br>
    {#text_mobile#}: {$mobile}
    <br>
    {#text_total_order_price#}: {$totalOrderPrice}
    <br>
</div>