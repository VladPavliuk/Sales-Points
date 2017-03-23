{extends file='../layouts/main.tpl'}

{block name="content"}
    <!-- BLOCK OF ONE PRODUCT -->
    <div class="row product-item">
        <div class="product-img col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="main-img">
                <img src="/src/images/products/{$singleProductItem["category"]}/{$singleProductItem["main_image"]}"
                     alt="{$singleProductItem["product_title"]}"
                     title="{$singleProductItem["product_title"]}">
            </div>
            {if isset($singleProductItem["other_images"])}
                <div class="other-img">
                    {foreach $singleProductItem["other_images"] as $otherImageTitle}
                        <img src="/src/images/products/{$singleProductItem["category"]}/{$otherImageTitle}"
                             alt="{$otherImageTitle}"
                             title="{$otherImageTitle}">
                    {/foreach}
                </div>
            {/if}
        </div>
        <div class="description-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h3>{$singleProductItem["product_title"]}</h3>
            <div class="button">
                {if $singleProductItem["status"] eq 1}
                    <button onclick="addToCart({$singleProductItem["id"]});"
                            class="btn btn-info pull-right">
                        {#text_add_to_cart#}
                    </button>
                {else}
                    <button class="btn btn-info pull-right disabled">{#text_not_available#}</button>
                {/if}
            </div>
            <div class="product-price">
                <span class="price">{$singleProductItem["price"]}</span>

                {if $singleProductItem["status"] eq 1}
                    <span class="glyphicon glyphicon-ok-circle pull-right"></span>
                    <span class="presence pull-right">{#text_in_stock#}</span>
                {else}
                    <span class="glyphicon glyphicon-ok-circle pull-right"></span>
                    <span class="presence pull-right">{#text_out_of_stock#}</span>
                {/if}

            </div>
            <div class="product-description">
                <p>{$singleProductItem["description"]}</p>
            </div>
        </div>
    </div>
    <!-- END OF BLOCK -->
{/block}