<div class="footer" style="margin-top: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabs">
                <h2>Hot Products</h2>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#">Mobile phones</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Games/movies/music</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Tvs</a></li>
                </ul>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 owl-carousel owl-theme">
                {foreach $randomProductsList as $randomProduct}
                    <div class="item">
                        <div class="prod-footer">
                            <h5><a href="/product/{$randomProduct["id"]}/">{$randomProduct["product_title"]}</a></h5>
                        </div>
                        <span class="price">{$randomProduct["price"]}</span>
                        <div class="prod-img">
                            <a href="/product/{$randomProduct["id"]}/">
                                <img src="/src/images/products/{$randomProduct["category"]}/{$randomProduct["main_image"]}"
                                     alt="{$randomProduct["product_title"]}"
                                     title="{$randomProduct["product_title"]}">
                            </a>
                        </div>
                        <button class="btn btn-info"><a href="/category/{$randomProduct["category_id"]}/">More from
                                category</a></button>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>
