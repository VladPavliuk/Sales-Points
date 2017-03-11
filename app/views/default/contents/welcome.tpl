{extends file='../layouts/main.tpl'}

{block name="title"}
    Welcome page!
{/block}

{block name="content"}
    <div class="row">
        <h3>Categories list</h3>
        <ul>
        {foreach $parentCategoriesList as $parentCategory}
            <li>{$parentCategory["category"]}</li>
            {if isset($parentCategory["children_category"])}
                <ul>
                    {foreach $parentCategory["children_category"] as $childrenCategory}
                        <li>{$childrenCategory}</li>
                    {/foreach}
                </ul>
            {/if}
        {/foreach}
        </ul>
    </div>
    <div class="row">
        <h3>Last added Products</h3>
        <ul>
        {foreach $lastAddedProducts as $product}
            <li>{$product["title"]}</li>
        {/foreach}
        </ul>
    </div>
{/block}


