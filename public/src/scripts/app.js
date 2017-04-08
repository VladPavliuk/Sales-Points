function addToCart(productId) {
    var url = "/add-to-cart/" + productId;

    $.get(url, function (responseData) {

        var totalAmount = JSON.parse(responseData);

        $(".total-amount-text").text(totalAmount);
    });
}

function loadMoreNewProducts() {

    var productsNumber = 4;

    var minId = $(".product-in-content")[0].id;

    $(".product-in-content").each(function () {
        minId = Math.min(this.id, minId);
    });

    var uri = '/load-more-new-products/' + productsNumber + '/' + minId;
    $.get(uri, function (response) {

        var newProductsList = JSON.parse(response);

        if(newProductsList.length <1) {
            $(".button-load-more").hide();
        }

        //alert(JSON.stringify(newProductsList, null, 4));

        newProductsList.forEach(function (productItem) {

            var textBody = formProductItem(productItem);
            $(".products-list").append(textBody);
        });
    });
}

function formProductItem(item) {

    var productItemId = item["id"];
    var productCategoryId = item["category_id"];
    var productItemTitle = item["product_title"];
    var productItemPrice = item["price"];
    var productItemImage = item["main_image"];
    var productItemStatus = item["status"];
    var productItemUploadTime = item["upload_time"];
    var productItemCategory = item["category"];

    var textBody =
        '<div id="' + productItemId + '" class="product-in-content product col-lg-3 col-md-4 col-sm-6 col-xs-6">' +
        '<div class="prod-img">' +
        '<a href="/admin/editor/product/' + productItemId + '">' +
        '<img src="/src/images/products/' + productItemCategory + '/' + productItemImage + '"' +
        'alt="' + productItemTitle + '"' +
        'title="' + productItemTitle + '">' +
        '</a>' +
        '</div>' +
        '<div class="prod-footer">' +
        '<h5><a href="/admin/editor/product/' + productItemId + '"">' + productItemTitle + '</a></h5>' +
        '</div>' +
        '<span class="price">' + productItemPrice + '</span>' +
        '</div>';

    return textBody;
}