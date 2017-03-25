{extends file='../layouts/main.tpl'}

{block name="content"}
    {if count($categoryProductsList)}
        <div class="row product-wrap">
            {foreach from=$categoryProductsList item=categoryProduct name=itemInArray}
                {if $smarty.foreach.itemInArray.iteration > 12}
                    {break}
                {/if}
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 product">
                    <div class="prod-img">
                        <a href="/product/{$categoryProduct["id"]}">
                            <img src="/src/images/products/{$categoryProduct["category"]}/{$categoryProduct["main_image"]}"
                                 alt="{$categoryProduct["product_title"]}"
                                 title="{$categoryProduct["main_image"]}">
                        </a>
                    </div>
                    <div class="prod-footer">
                        <h5>
                            <a href="/product/{$categoryProduct["id"]}">
                                {$categoryProduct["product_title"]}
                            </a>
                        </h5>
                    </div>
                    <span class="price">{$categoryProduct["price"]}</span>
                </div>
            {/foreach}
            {if $categoryProductsList|@count > 12}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-view-more">
                    <button class="btn btn-info pull-right">{#text_view_more_products#}</button>
                </div>
            {/if}
            {else}
            <h3>{#text_no_products_in_category#}</h3>
        </div>
    {/if}
{/block}