{extends file='../layouts/main.tpl'}

{block name="title"}
    Welcome page!
{/block}

{block name="content"}
    <div class="row">
        <h2>{$singleProductItem["title"]}</h2>
        <small>Added {$singleProductItem["updated_time"]|date_format:'%Y-%m-%d'}</small>
        <br>
        <img src="/src/images/products/{$singleProductItem["image"]}" alt="{$singleProductItem["title"]}" height="300">

        <h4>Price: $ {$singleProductItem["price"]}</h4>
        {if $singleProductItem["status"] eq 1}
            <small>Status:</small>
            <p class="label label-success">in stock</p>
        {else}
            <small>Status:</small>
            <p class="label label-default">out of stock</p>
        {/if}
        <br>
        <br>
        <h5>Description:</h5>
        <p>{$singleProductItem["description"]}</p>

        <br>
        {if $singleProductItem["status"] eq 1}
            <button onclick="addToCart({$singleProductItem["id"]});" class="btn btn-success btn-lg">Add to cart</button>
        {else}
            <button class="btn btn-default btn-lg disabled">Not Available</button>
        {/if}
    </div>
{/block}