{extends file='../layouts/main.tpl'}

{block name="content"}
    {if count($categoryProductsList)}
        <div class="row product-wrap">
            {foreach $categoryProductsList as $categoryProduct}
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 product">
                    <div class="prod-img">
                        <a href="/product/{$categoryProduct["id"]}"">
                        <img src="/src/images/products/{$categoryProduct["image"]}"
                             alt="{$categoryProduct["title"]}"
                             title="{$categoryProduct["image"]}">
                        </a>
                    </div>
                    <div class="prod-footer">
                        <h5><a href="/product/{$categoryProduct["id"]}"">{$categoryProduct["title"]}</a></h5>
                    </div>
                    <span class="price">$ {$categoryProduct["price"]}</span>
                </div>
            {/foreach}
            {else}
            <h3>{#text_no_products_in_category#}</h3>
        </div>
    {/if}
{/block}