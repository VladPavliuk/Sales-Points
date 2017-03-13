{extends file='../layouts/main.tpl'}

{block name="content"}
    {if $totalAmount > 0}
        <table border="2">
            <tr>
                <th>№</th>
                <th>Title</th>
                <th>Price</th>
                <th></th>
            </tr>

            {$id = 1}
            {foreach from=$cart key=idInCart item=cartItem}
                <tr>
                    <td>{$id}</td>
                    <td>{$cartItem["title"]}</td>
                    <td>$ {$cartItem["price"]}</td>
                    <td><a href="/cart-delete/{$idInCart}">remove</a></td>
                </tr>
                {$id = $id + 1}
            {/foreach}
        </table>
        <br>
        total price: $ {$totalPrice}
        <br>
        total Amount: {$totalAmount}
        {if $totalAmount eq 1}
            item
        {else}
            items
        {/if}
        <br>
        <a href="/order-form" class="btn btn-primary">To confirm order page</a>
    {else}
        <h3>Your cart is empty</h3>
        <a href="/" class="btn btn-primary">To main</a>
    {/if}
{/block}