{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="row">
        {$singleProductItem["title"]}
        <br>
        <img src="/src/images/products/{$singleProductItem["image"]}.jpg" alt="{$singleProductItem["title"]}" height="400">
    </div>
{/block}