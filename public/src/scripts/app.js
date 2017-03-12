function addToCart(productId) {
    var url = "/add-to-cart/" + productId;

    $.get(url, function(respneData) {
        var totalAmount = JSON.parse(respneData);

        $("#totalAmountText").text(totalAmount);
    });
}

//add-to-cart