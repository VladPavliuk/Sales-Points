<div>
    <h3 align="center"><a href="http://www.vladdev.com">{#text_internet_shop#} "Sales Point"</a></h3>
    <table border="2">
        <tr>
            <th>№</th>
            <th>{#text_title#}</th>
            <th>{#text_price#}</th>
        </tr>
        {$id = 1}
        {foreach from=$cart key=idInCart item=cartItem}
            <tr>
                <td>{$id}</td>
                <td>{$cartItem["product_title"]}</td>
                <td>{$cartItem["price"]}</td>
            </tr>
            {$id = $id + 1}
        {/foreach}
    </table>
    <h3>{#text_order_info#}</h3>
    {#text_total_order_price#}: {$totalOrderPrice}
    <br>
    {#text_total_amount#}: {$totalAmount}
    {if $totalAmount eq 1}
        {#text_in_cart_item#}
    {else}
        {#text_in_cart_items#}
    {/if}
    <h3>{#text_customer_info#}</h3>
    {#text_first_name#}: {$firstName}
    <br>
    {#text_last_name#}: {$lastName}
    <br>
    {#text_email#}: {$email}
    <br>
    {#text_mobile#}: {$mobile}
    <br>
</div>