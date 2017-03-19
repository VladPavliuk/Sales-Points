<div class="footer" style="margin-top: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 owl-carousel owl-theme">
                {foreach $randomProductsList as $randomProduct}
                    <div class="item product">
                        <div class="prod-footer">
                            <h5><a href="#">{$randomProduct["product_title"]}</a></h5>
                        </div>
                        <span class="price">{$randomProduct["price"]}</span>
                        <div class="prod-img">
                            <a href="/product/{$randomProduct["product_title"]}/">
                                <img src="/src/images/products/{$randomProduct["category"]}/{$randomProduct["main_image"]}"
                                     alt="{$randomProduct["product_title"]}"
                                     title="{$randomProduct["product_title"]}">
                            </a>
                        </div>
                        <button class="btn btn-info"><a href="/category/{$randomProduct["category_id"]}/">More from category</a></button>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>
