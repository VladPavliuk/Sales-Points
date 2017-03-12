{extends file='../layouts/main.tpl'}

{block name="title"}
    Welcome page!
{/block}

{block name="content"}
    <div class="row">
        <h2>{$singleProductItem["title"]}</h2>
        <br>
        <img src="/src/images/products/{$singleProductItem["image"]}" alt="{$singleProductItem["title"]}" height="400">
        <h4>Price: $ {$singleProductItem["price"]}</h4>
        <br>
        <h5>Description:</h5>
        <p>{$singleProductItem["description"]}</p>
        <button id="add-{$singleProductItem["id"]}" class="btn btn-success btn-lg">Add to cart</button>
    </div>
{/block}