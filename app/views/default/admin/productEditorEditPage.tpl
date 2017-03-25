{extends file='../layouts/main.tpl'}

{block name="content"}
    <a href="/admin/editor/product/select/" class="btn btn-default btn-sm">Beck to products select page</a>
    <h3>Editing "{$productForEditing["product_title"]}" product</h3>
    <form action="/admin/product/edit/" method="POST">

        <div class="input-group">
            <label for="product_title">Product title</label>
            <input class="form-control" type="text" value="{$productForEditing["product_title"]}" id="product_title"
                   name="product_title" required>
        </div>

        <div class="input-group">
            <label for="product_price">Product price (in dollar)</label>
            <input class="form-control" type="number" value="{$productForEditing["price"]}" id="product_price"
                   name="product_price" required>
        </div>

        <div class="input-group">
            <label for="product_status">Product price (in dollar)</label>
            <br>
            {if $productForEditing["status"] eq 1}
                <input type="radio" id="product_status" name="product_status" value="1" checked>
                In stock
                <br>
                <input type="radio" id="product_status" name="product_status" value="0">
                Out of stock
                <br>
            {else}
                <input type="radio" id="product_status" name="product_status" value="1">
                In stock
                <br>
                <input type="radio" id="product_status" name="product_status" value="0" checked>
                Out of stock
                <br>
            {/if}
        </div>

        <hr>
        <div class="input-group">
            <label for="description_english">Product description on English Language</label>
            <textarea class="form-control"
                      name="description_english"
                      id="description_english"
                      cols="30"
                      rows="5"
                      required>
                {$productForEditing["description_english"]}
            </textarea>
        </div>

        <div class="input-group">
            <label for="description_ukrainian">Product description on Ukrainian Language</label>
            <textarea class="form-control"
                      name="description_ukrainian"
                      id="description_ukrainian"
                      cols="30"
                      rows="5"
                      required>
                {$productForEditing["description_ukrainian"]}
            </textarea>
        </div>

        <div class="input-group">
            <label for="description_russian">Product description on Russian Language</label>
            <textarea class="form-control"
                      name="description_russian"
                      id="description_russian"
                      cols="30"
                      rows="5"
                      required>
                {$productForEditing["description_russian"]}
            </textarea>
        </div>
        <hr>
        <input type="hidden" name="product_for_edit_id" value="{$productForEditing["id"]}">
        <br>
        <div class="input-group">
            <input type="submit" class="btn btn-primary btn-lg" value="Save changes">
        </div>
    </form>
    <br>
    <hr>
    <a href="/admin/product/delete/{$productForEditing["id"]}" class="btn btn-warning">Delete product</a>
{/block}

{block name="scripts"}
    <script src="/src/scripts/editor.js"></script>
{/block}