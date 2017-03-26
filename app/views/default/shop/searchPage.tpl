{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="row product-wrap">
        <h3>Result of searching "{$searchRequest}"</h3>
        {*
        Search form.
        <br>
        <input oninput="searchProducts($(this).val())" type="text" placeholder="find products" id="search-field">
        <br>
        *}
        <div class="search-result">
            {foreach from=$searchingList item=product}
                <div id="{$product["id"]}" class="product-in-content product col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="prod-img">
                        <a href="product/{$product["id"]}">
                            <img src="/src/images/products/{$product["category"]}/{$product["main_image"]}"
                                 alt="{$product["product_title"]}"
                                 title="{$product["product_title"]}">
                        </a>
                    </div>
                    <div class="prod-footer">
                        <h5><a href="product/{$product["id"]}"">{$product["product_title"]}</a></h5>
                    </div>
                    <span class="price">{$product["price"]}</span>
                </div>
            {/foreach}
        </div>
    </div>
{/block}

{block name="scripts"}
    <script src="/src/scripts/search.js"></script>
{/block}