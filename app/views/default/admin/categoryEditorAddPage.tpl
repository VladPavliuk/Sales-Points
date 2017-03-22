{extends file='../layouts/main.tpl'}

{block name="content"}
    <a href="/admin" class="btn btn-default btn-sm">Beck to main admin page</a>
    <h3>Add new Category</h3>
    <form action="/admin/category/add" method="POST" enctype="multipart/form-data">

        <div class="input-group">
            <label for="category_english_title">Category Title on English</label>
            <input class="form-control"
                   type="text"
                   value=""
                   id="category_english_title"
                   name="category_english_title"
                   required>
        </div>

        <div class="input-group">
            <label for="category_ukrainian_title">Category Title on Ukrainian</label>
            <input class="form-control"
                   type="text"
                   value=""
                   id="category_ukrainian_title"
                   name="category_ukrainian_title"
                   required>
        </div>


        <div class="input-group">
            <label for="category_russian_title">Category Title on Russian</label>
            <input class="form-control"
                   type="text"
                   value=""
                   id="category_russian_title"
                   name="category_russian_title"
                   required>
        </div>

        <div class="input-group">
            <label for="parent_category_id">Product Category</label>
            <select class="form-control" name="parent_category_id" id="parent_category_id">
                <option value="0">Визначити, як головну категорію.</option>
                {foreach $parentCategoriesList as $parentCategory}
                    <option value="{$parentCategory["id"]}">{$parentCategory["category_$renderLanguage"]}</option>
                    {if isset($parentCategory["children_categories"])}
                        {foreach $parentCategory["children_categories"] as $children_categories_1}
                            <option value="{$children_categories_1["id"]}">
                                --------{$children_categories_1["category_$renderLanguage"]}</option>
                            {if isset($children_categories_1["children_categories"])}
                                {foreach $children_categories_1["children_categories"] as $children_categories_2}
                                    <option value="{$children_categories_2["id"]}">
                                        ----------------{$children_categories_2["category_$renderLanguage"]}</option>
                                {/foreach}
                            {/if}
                        {/foreach}
                    {/if}
                {/foreach}
            </select>
        </div>
        <br>
        <div class="input-group">
            <input type="submit" class="btn btn-primary" value="Add category">
        </div>
    </form>
{/block}