{extends file='../layouts/main.tpl'}

{block name="content"}
    {if $totalAmount > 0}
        <table border="2">
            <tr>
                <th>№</th>
                <th>{#text_title#}</th>
                <th>{#text_price#}</th>
                <th></th>
            </tr>

            {$id = 1}
            {foreach from=$cart key=idInCart item=cartItem}
                <tr id="product-in-cart-page{$idInCart}">
                    <td>{$id}</td>
                    <td>{$cartItem["product_title"]}</td>
                    <td>{$cartItem["price"]}</td>
                    <td><button onclick="deleteFromCart({$idInCart}, this);">{#text_remove#}</button></td>
                </tr>
                {$id = $id + 1}
            {/foreach}
        </table>
        <br>
        {#text_total_price#}: <span class="total-price-text">{$totalPrice}</span>
        <br>
        {#text_total_amount#}: <span class="total-amount-text">{$totalAmount}</span>
        {if $totalAmount eq 1}
            {#text_in_cart_item#}
        {else}
            {#text_in_cart_items#}
        {/if}
        <br>
        <a href="/order-form" class="btn btn-primary">{#text_to_confirm_order_page#}</a>
    {else}
        <h3>{#text_your_cart_is_empty#}</h3>
        <a href="/" class="btn btn-primary">{#text_to_main#}</a>
    {/if}
{/block}