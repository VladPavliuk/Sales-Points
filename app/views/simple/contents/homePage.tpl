{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="row">
        <h3>Categories list</h3>
        <ul>
        {foreach $parentCategoriesList as $parentCategory}
            <li><a href="category/{$parentCategory["id"]}">{$parentCategory["category"]}</a></li>
            {if isset($parentCategory["children_category"])}
                <ul>
                    {foreach $parentCategory["children_category"] as $childrenCategory}
                        <li><a href="category/{$childrenCategory["id"]}">{$childrenCategory["category"]}</a></li>
                    {/foreach}
                </ul>
            {/if}
        {/foreach}
        </ul>
    </div>
    <div class="row">
        <a href="/products" class="btn btn-primary">Show all products</a>
    </div>
    <div class="row">
        <h3>Last added Products</h3>
        <ul>
        {foreach $lastAddedProducts as $product}
            <li><a href="product/{$product["id"]}">{$product["title"]}</a></li>
        {/foreach}
        </ul>
    </div>
{/block}


