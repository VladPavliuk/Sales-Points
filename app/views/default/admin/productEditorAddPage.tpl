{extends file='../layouts/main.tpl'}

{block name="content"}
    <a href="/admin" class="btn btn-default btn-sm">Beck to main admin page</a>
    <h3>Add new Product</h3>
    <form action="/admin/product/add" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <label for="product_title">Product Title</label>
            <input class="form-control" type="text" value="" id="product_title"
                   name="product_title" required>
        </div>

        <div class="input-group">
            <label for="category_id">Product Category</label>
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
        <div class="input-group">
            <label for="description_english">Description on English</label>
            <br>
            <textarea name="description_english" id="description_english" cols="30" rows="3"></textarea>
        </div>

        <div class="input-group">
            <label for="description_ukrainian">Description on Ukrainian</label>
            <br>
            <textarea name="description_ukrainian" id="description_ukrainian" cols="30" rows="3"></textarea>
        </div>

        <div class="input-group">
            <label for="description_russian">Description on Russian</label>
            <br>
            <textarea name="description_russian" id="description_russian" cols="30" rows="3"></textarea>
        </div>

        <div class="input-group">
            <label for="price">Price in dollars</label>
            <input class="form-control" type="number" value="0" id="price"
                   name="price" required>
        </div>

        <div class="input-group">
            <label for="main_image">Main image</label>
            <input type="file" id="main_image"
                   name="main_image" required>
        </div>
        <hr>
        <div class="input-group">
            <label for="other_images">Other images</label>
            <input name="other_images[]" type="file"><br>
            <input name="other_images[]" type="file"><br>
            <input name="other_images[]" type="file"><br>
        </div>
        <hr>
        <div class="input-group">
            <input type="submit" class="btn btn-primary" value="Add product">
        </div>
    </form>
{/block}

{block name="scripts"}
    <script src="/src/scripts/editor.js"></script>
{/block}