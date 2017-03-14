<sidebar class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="panel-menu-wrap">
        <button class="show-menu btn btn-default">
            <span class="glyphicon glyphicon-menu-right"></span> Categories
        </button>
        <ul class="categories">
            {foreach $parentCategoriesList as $parentCategory}
                <li><span class="glyphicon glyphicon-menu-right"></span>
                    <a href="/category/{$parentCategory["id"]}"> {$parentCategory["category"]}</a>
                    {if isset($parentCategory["children_categories"])}
                        <ul>
                            {foreach $parentCategory["children_categories"] as $children_categories_1}
                                <li><span class="glyphicon glyphicon-menu-right"></span>
                                    <a href="/category/{$children_categories_1["id"]}">{$children_categories_1["category"]}</a>
                                    {if isset($children_categories_1["children_categories"])}
                                        <ul>
                                            {foreach $children_categories_1["children_categories"] as $children_categories_2}
                                                <li>
                                                    <span class="glyphicon glyphicon-menu-right"></span>
                                                    <a href="/category/{$children_categories_2["id"]}">{$children_categories_2["category"]}</a>
                                                </li>
                                            {/foreach}
                                        </ul>
                                    {/if}
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>
            {/foreach}
        </ul>
    </div>
    <div class="mobile">
        <a href="#">
            <p>HTC Google Nexus One <span>$206.99</span></p>
            <img src="/src/images/mobile.png" alt="mobile">
        </a>
    </div>
</sidebar>