{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="row">
        {foreach $productsList as $singleProduct}
            <div class="col-lg-2 col-md-4">
                <a href="product/{$singleProduct["id"]}">
                    <span>{$singleProduct["title"]}</span>

                    <img height="100" src="/src/images/products/{$singleProduct["image"]}"
                         alt="{$singleProduct["title"]}">
                </a>
            </div>
        {/foreach}
    </div>
{/block}