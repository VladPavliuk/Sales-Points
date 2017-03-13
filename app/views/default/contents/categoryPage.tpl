{extends file='../layouts/main.tpl'}

{block name="content"}
    <h3>Products in current category</h3>
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
{/block}