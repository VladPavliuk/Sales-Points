{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 title">
        <h3>All <span>Products</span></h3>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 title">
        <button class="btn btn-info pull-right">{#text_view_all_products#}</button>
    </div>
    {foreach $productsList as $singleProduct}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 product">
            <div class="prod-img">
                <a href="product/{$singleProduct["id"]}"">
                <img src="/src/images/products/{$singleProduct["image"]}"
                     alt="{$singleProduct["title"]}"
                     title="{$singleProduct["image"]}">
                </a>
            </div>
            <div class="prod-footer">
                <h5><a href="product/{$singleProduct["id"]}"">{$singleProduct["title"]}</a></h5>
            </div>
            <span class="price">$ {$singleProduct["price"]}</span>
        </div>
    {/foreach}

{/block}