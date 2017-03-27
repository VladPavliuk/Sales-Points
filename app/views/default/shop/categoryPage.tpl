{extends file='../layouts/main.tpl'}

{block name="content"}
    {if isset($categoriesProductsList["root_products"]) or isset($categoriesProductsList["subcategories_products"])}
        <h3>{$categoriesProductsList["category_title"]}</h3>
        {assign var="productNumberOnPage" value=1}
        <div class="row product-wrap">
            {if isset($categoriesProductsList["root_products"])}
                {foreach $categoriesProductsList["root_products"] as $product}
                    {if $productNumberOnPage eq 13}
                        {break}
                    {/if}
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 product">
                        <div class="prod-img">
                            <a href="/product/{$product["id"]}">
                                <img src="/src/images/products/{$product["category"]}/{$product["main_image"]}"
                                     alt="{$product["product_title"]}"
                                     title="{$product["main_image"]}">
                            </a>
                        </div>
                        <div class="prod-footer">
                            <h5>
                                <a href="/product/{$product["id"]}">
                                    {$product["product_title"]}
                                </a>
                            </h5>
                        </div>
                        <span class="price">{$product["price"]}</span>
                    </div>
                    {$productNumberOnPage = $productNumberOnPage + 1}
                {/foreach}
            {/if}

            {if isset($categoriesProductsList["subcategories_products"])}
                {foreach $categoriesProductsList["subcategories_products"] as $subCategoryProducts}
                    {foreach $subCategoryProducts as $product}
                        {if $productNumberOnPage eq 13}
                            {break}
                        {/if}
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product">
                            <div class="prod-footer">
                                <h5><a href="/product/{$product["id"]}"">{$product["product_title"]}</a></h5>
                            </div>
                            <span class="price">{$product["price"]}</span>
                            <div class="prod-img">
                                <a href="/product/{$product["id"]}"">
                                <img src="/src/images/products/{$product["category"]}/{$product["main_image"]}"
                                     alt="{$product["product_title"]}"
                                     title="{$product["product_title"]}">
                                </a>
                            </div>
                            <button class="btn btn-info"><a href="/category/{{$product["category_id"]}}">More from
                                    category</a>
                            </button>
                        </div>
                        {$productNumberOnPage = $productNumberOnPage + 1}
                    {/foreach}
                {/foreach}
            {/if}
            {if $productNumberOnPage > 12}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-view-more">
                    <button onclick="loadMoreNewProducts();"
                            class="btn btn-info pull-right">{#text_view_more_products#}</button>
                </div>
            {/if}
            {else}
            <h3>{#text_no_products_in_category#}</h3>
        </div>
    {/if}
{/block}

{block name="scripts"}
    <script src="/src/scripts/app.js"></script>
{/block}