{extends file='../layouts/main.tpl'}

{block name="title"}
    Odious
{/block}

{block name="content"}
    <div class="row">
        {foreach $productsList as $singleProduct}
            <div class="col-lg-2 col-md-4">
                <a href="product/{$singleProduct["id"]}">
                    <spann>{$singleProduct["title"]}</spann>
                    <img height="100" src="/src/images/products/{$singleProduct["image"]}.jpg"
                         alt="{$singleProduct["title"]}">
                </a>
                <p>{$singleProduct["description"]}</p>
            </div>
        {/foreach}
    </div>
{/block}