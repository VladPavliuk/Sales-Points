function deleteFromCart(productId, button) {
    var url = "/cart-delete/" + productId;

    $.get(url, function (responseData) {

        var totalAmount = JSON.parse(responseData);
        var totalProductsAmount = totalAmount["total_products_amount"];
        var totalProductsPrice = totalAmount["total_products_price"];


        $(button).parent().parent().hide();
        $(".total-amount-text").text(totalProductsAmount);
        $(".total-price-text").text(totalProductsPrice);
    });
}

/*
var input = document.getElementById("amount");
document.getElementsByClassName("glyphicon-plus")[0].onclick = function () {
    var sum = +input.value;
    input.value = sum + 1;
}
document.getElementsByClassName("glyphicon-minus")[0].onclick = function () {
    if (input.value > 1) input.value -= +1;
}*/