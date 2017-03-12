<sidebar class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <span class="glyphicon glyphicon-menu-right"></span>
                    <a data-toggle="collapse" href="#collapse1">Categories</a>
                </h5>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="categories">
                        {foreach $parentCategoriesList as $parentCategory}
                            <li><span class="glyphicon glyphicon-menu-right"></span><a
                                        href="/category/{$parentCategory["id"]}">{$parentCategory["category"]}</a>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile">
        <a href="#">
            <p>HTC Google Nexus One <span>$206.99</span></p>
            <img src="/src/images/mobile.png" alt="mobile">
        </a>
    </div>
</sidebar>