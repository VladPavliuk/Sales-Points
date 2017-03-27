{extends file='../layouts/main.tpl'}

{block name="content"}
    <h3>{#text_categories#}</h3>
    <ul>
        <li><a href="/admin/editor/category/add/" class="btn btn-default btn-lg">{#text_add_category#}</a></li>
        <br>
        <li><a href="/admin/editor/category/select/" class="btn btn-default btn-lg">{#text_edit_category#}</a></li>
        <br>
    </ul>
    <h3>{#text_products#}</h3>
    <ul>
        <li><a href="/admin/editor/product/add/" class="btn btn-default btn-lg">{#text_add_product#}</a></li>
        <br>
        <li><a href="/admin/editor/product/select/" class="btn btn-default btn-lg">{#text_edit_product#}</a></li>
        <br>
    </ul>
    <br>
    <a href="/log-out" class="btn btn-primary">{#text_logout#}</a>
{/block}

{block name="scripts"}
    <script src="/src/scripts/editor.js"></script>
{/block}