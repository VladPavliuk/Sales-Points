function deleteFromCart(productId, button) {
    var url = "/cart-delete/" + productId;

    $.get(url, function (responseData) {

        var totalAmount = JSON.parse(responseData);
        var totalProductsAmount = totalAmount["total_products_amount"];
        var totalProductsPrice = totalAmount["total_products_price"];

        if (totalProductsAmount === 0) {
            $(".cart-page").hide();
        }

        $(button).parent().parent().hide();
        $(".total-amount-text").text(totalProductsAmount);
        $(".total-price-text").text(totalProductsPrice);
    });
}

function updateProductInCart(idInCart) {

    var amount = $("#product-" + idInCart + "-amount").val();

    var url = "/cart-set-amount/" + idInCart + "/" + amount;

    $.get(url, function (responseData) {

        var totalAmount = JSON.parse(responseData);
        var totalProductsAmount = totalAmount["total_products_amount"];
        var totalProductsPrice = totalAmount["total_products_price"];

        $(".total-amount-text").text(totalProductsAmount);
        $(".total-price-text").text(totalProductsPrice);
    });
}