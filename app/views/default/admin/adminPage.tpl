{extends file='../layouts/main.tpl'}

{block name="content"}
    <h3>Categories</h3>
    <ul>
        <li><a href="/admin/editor/category/add/" class="btn btn-default btn-lg">Add Category</a></li>
        <br>
        <li><a href="/admin/editor/category/select/" class="btn btn-default btn-lg">Edit Category</a></li>
        <br>
    </ul>
    <h3>Products</h3>
    <ul>
        <li><a href="/admin/editor/product/add/" class="btn btn-default btn-lg">Add Product</a></li>
        <br>
        <li><a href="/admin/editor/product/select/" class="btn btn-default btn-lg">Edit Product</a></li>
        <br>
    </ul>
{/block}