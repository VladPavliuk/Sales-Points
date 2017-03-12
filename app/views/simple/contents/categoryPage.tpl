{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="row">
        <h3>{$singleCategory["category"]}</h3>
        <ul>
        {foreach $singleCategory["children_category"] as $childrenCategory}
            <li><a href="/category/{$childrenCategory["id"]}">{$childrenCategory["category"]}</a></li>
        {/foreach}
        </ul>
    </div>
{/block}