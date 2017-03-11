{extends file='../layouts/main.tpl'}

{block name="title"}
    Welcome page!
{/block}

{block name="content"}
    <div class="row">
        <ul>
        {foreach from=$parentCategoriesList item=parentCategory}
            <li>{$parentCategory["category"]}</li>
        {/foreach}
        </ul>
    </div>
{/block}


