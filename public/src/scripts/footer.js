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