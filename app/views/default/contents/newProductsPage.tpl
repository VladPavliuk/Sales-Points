{extends file='../layouts/main.tpl'}

{block name="title"}
    Welcome page!
{/block}

{block name="content"}
    <div class="row product-wrap">
        <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 title">
            <h3>{#text_new_products_1#} <span>{#text_new_products_2#}</span></h3>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 title">
            <button class="btn btn-info pull-right">{#text_view_all_products#}</button>
        </div>
        {foreach $lastAddedProducts as $product}
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 product">
                <div class="prod-img">
                    <a href="product/{$product["id"]}"">
                    <img src="/src/images/products/{$product["image"]}"
                         alt="{$product["title"]}"
                         title="{$product["image"]}">
                    </a>
                </div>
                <div class="prod-footer">
                    <h5><a href="product/{$product["id"]}"">{$product["title"]}</a></h5>
                </div>
                <span class="price">{$product["price"]}</span>
            </div>
        {/foreach}
    </div>
{/block}


