{extends file='../layouts/main.tpl'}

{block name="content"}
    <a href="/admin" class="btn btn-default btn-sm">{#text_beck_to_main_admin_page#}</a>
    <h3>{#text_add_new_category#}</h3>
    <form action="/admin/category/add" method="POST" enctype="multipart/form-data">

        <div class="input-group">
            <label for="category_english_title">{#text_category_title_on_english#}</label>
            <input class="form-control"
                   type="text"
                   value=""
                   id="category_english_title"
                   name="category_english_title"
                   required>
        </div>

        <div class="input-group">
            <label for="category_ukrainian_title">{#text_category_title_on_ukrainian#}</label>
            <input class="form-control"
                   type="text"
                   value=""
                   id="category_ukrainian_title"
                   name="category_ukrainian_title"
                   required>
        </div>


        <div class="input-group">
            <label for="category_russian_title">{#text_category_title_on_russian#}</label>
            <input class="form-control"
                   type="text"
                   value=""
                   id="category_russian_title"
                   name="category_russian_title"
                   required>
        </div>

        <div class="input-group">
            <label for="parent_category_id">{#text_parent_category#}</label>
            <select class="form-control" name="parent_category_id" id="parent_category_id">
                <option value="0">{#text_define_as_on_of_the_main_categories#}</option>
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
            <input type="submit" class="btn btn-primary" value="{#text_add_category#}">
        </div>
    </form>
{/block}

{block name="scripts"}
    <script src="/src/scripts/editor.js"></script>
{/block}