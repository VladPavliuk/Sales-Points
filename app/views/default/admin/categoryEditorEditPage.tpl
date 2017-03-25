{extends file='../layouts/main.tpl'}

{block name="content"}
    <a href="/admin/editor/category/select/" class="btn btn-default btn-sm">Beck to category select page</a>
    <h3>Editing "{$categoryForEdit["category_english"]}" category</h3>
    <form action="/admin/category/edit/" method="POST">
        <div class="input-group">
            <label for="category_english_title">Category title on English Language</label>
            <input class="form-control"  type="text" value="{$categoryForEdit["category_english"]}" id="category_english_title"
                   name="category_english_title" required>
        </div>
        <div class="input-group">
            <label for="category_ukrainian_title">Category title on Ukrainian Language</label>
            <input class="form-control"  type="text" value="{$categoryForEdit["category_ukrainian"]}" id="category_ukrainian_title"
                   name="category_ukrainian_title" required>
        </div>
        <div class="input-group">
            <label for="category_russian_title">Category title on Russian Language</label>
            <input class="form-control"  type="text" value="{$categoryForEdit["category_russian"]}" id="category_russian_title"
                   name="category_russian_title" required>
        </div>
        <input type="hidden" name="category_for_edit_id" value="{$categoryForEdit["id"]}">
        <br>
        <div class="input-group">
            <input type="submit" class="btn btn-primary" value="Edit Category">
        </div>
    </form>
    <br>
    <hr>
    <a href="/admin/category/delete/{$categoryForEdit["id"]}" class="btn btn-warning">Delete category</a>
{/block}

{block name="scripts"}
    <script src="/src/scripts/editor.js"></script>
{/block}