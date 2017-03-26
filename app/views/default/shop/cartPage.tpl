{extends file='../layouts/main.tpl'}

{block name="content"}
    {if $totalAmount > 0}
        <div class="cart-page">
            <div class="cart-list-table" style="">
                <table>
                    <tbody>
                    <tr>
                        <th colspan="3">{#text_title#}</th>
                        <th style="width:150px;">Количество</th>
                        <th style="width: 149px;border-right:none;">{#text_price#}</th>
                    </tr>
                    {foreach from=$cart key=idInCart item=cartItem}
                        <tr>
                            <td style="width: 25px;">
                            <span onclick="deleteFromCart({$idInCart}, this);"
                                  class="glyphicon glyphicon-remove-circle"></span>
                            </td>
                            <td style="text-align: center;">
                                <img src="/src/images/products/{$cartItem["category"]}/{$cartItem["main_image"]}"
                                     alt="{$cartItem["product_title"]}"
                                     title="{$cartItem["product_title"]}">
                            </td>
                            <td style="padding-right: 6px; text-align: left;height: 32px">
                                <a href="/product/{$cartItem["id"]}" target="_blank">{$cartItem["product_title"]}</a>
                            </td>
                            <td style="text-align: center;">
                                <span class="glyphicon glyphicon-minus"></span>
                                <input type="text" value="{$cartItem["products_amount"]}">
                                <span class="glyphicon glyphicon-plus"></span>
                            </td>
                            <td style="text-align: center; font-weight: 600">{$cartItem["price"]}</td>
                        </tr>
                    {/foreach}

                    <tr>
                        <td class="total-price-text" colspan="5" style="font-weight: 600; font-size: 18px">
                            {#text_total_price#}
                            <span>{$totalPrice}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

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
        </div>
    {else}
        <h3>{#text_your_cart_is_empty#}</h3>
        <a href="/" class="btn btn-primary">{#text_to_main#}</a>
    {/if}
{/block}

{block name="scripts"}
    <script src="/src/scripts/cart.js"></script>
{/block}