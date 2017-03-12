{extends file='../layouts/main.tpl'}

{block name="title"}
    Welcome page!
{/block}

{block name="content"}
    <div class="main">
        <div class="container">
            <div class="row">
                <sidebar class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <span class="glyphicon glyphicon-menu-right"></span> <a data-toggle="collapse" href="#collapse1">Categories</a>
                                </h5>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="categories">
                                        {foreach $parentCategoriesList as $parentCategory}
                                            <li><span class="glyphicon glyphicon-menu-right"></span><a href="#">{$parentCategory["category"]}</a></li>
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
            </div>
        </div>
    </div>
    <div class="row">
        <a href="/products" class="btn btn-primary">Show all products</a>
    </div>
    <div class="row">
        <h3>Last added Products</h3>
        <ul>
        {foreach $lastAddedProducts as $product}
            <li><a href="product/{$product["id"]}">{$product["title"]}</a></li>
        {/foreach}
        </ul>
    </div>
{/block}


