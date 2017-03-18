{extends file='../layouts/main.tpl'}

{block name="content"}
    <h3>Select category to edit</h3>
    <form action="" method="GET">
        <div class="input-group">
            <label for="category_id">Categories list</label>
            <select class="form-control" name="category_id" id="category_id">
                {foreach $parentCategoriesList as $parentCategory}
                    <option value="{$parentCategory["id"]}">{$parentCategory["category_$renderLanguage"]}</option>
                    {if isset($parentCategory["children_categories"])}
                        {foreach $parentCategory["children_categories"] as $children_categories_1}
                            <option value="{$children_categories_1["id"]}">--------{$children_categories_1["category_$renderLanguage"]}</option>
                            {if isset($children_categories_1["children_categories"])}
                                {foreach $children_categories_1["children_categories"] as $children_categories_2}
                                    <option value="{$children_categories_2["id"]}">----------------{$children_categories_2["category_$renderLanguage"]}</option>
                                {/foreach}
                            {/if}
                        {/foreach}
                    {/if}
                {/foreach}
            </select>
        </div>
        <br>
        <input type="submit" value="Edit Category" class="btn btn-primary">
    </form>
{/block}