{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="row">
        <ul>{$singleCategory["category"]}
        {foreach $singleCategory["children_category"] as $childrenCategory}
            <li><a href="/category/{$childrenCategory["id"]}">{$childrenCategory["category"]}</a></li>
        {/foreach}
        </ul>
    </div>
    <div class="row">
        <h3>Products in current category</h3>
        {foreach $categoryProductsList as $categoryProduct}
            <li><a href="/category/{$categoryProduct["id"]}">{$categoryProduct["title"]}</a></li>
        {/foreach}
    </div>
{/block}