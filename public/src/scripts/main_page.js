function loadMoreProductsForMainPage() {
    var maxId = $(".main-page-product")[0].id;

    $(".main-page-product").each(function () {
        maxId = Math.max(this.id, maxId);
    });

    var uri = '/load-more-products-for-main-page/' + maxId;
    $.get(uri, function (response) {

        var chunkProductsList = JSON.parse(response);

        if ($.isEmptyObject(chunkProductsList)) {
            $(".button-load-more").hide();
        }

        // alert(JSON.stringify(chunkProductsList, null, 4));

        for (variable in chunkProductsList) {
            var textBody = formProductItem(variable, chunkProductsList[variable]);

            $(".main-page-products").append(textBody);
        }
    });
}

function formProductItem(key, item) {

    var productItemId = item["id"];
    var productCategoryId = item["category_id"];
    var productItemTitle = item["product_title"];
    var productItemPrice = item["price"];
    var productItemImage = item["main_image"];
    var productItemStatus = item["status"];
    var productItemCategory = item["category"];

    var textBody =
        '<div id="' + key + '" class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product main-page-product">' +
        '<div class="prod-footer">' +
        '<h5><a href="product/' + productItemId + '">' + productItemTitle + '</a></h5>' +
        '</div>' +
        '<span class="price">' + productItemPrice + '</span>' +
        '<div class="prod-img">' +
        '<a href="product/' + productItemId + '">' +
        '<img src="/src/images/products/' + productItemCategory + '/' + productItemImage + '" ' +
        'alt="' + productItemTitle + '" ' +
        'title="' + productItemTitle + '">' +
        '</a>' +
        '</div>' +
        '<button class="btn btn-info"><a href="category/' + productCategoryId + '">More from category</a>' +
        '</button>' +
        '</div>';

    return textBody;
}