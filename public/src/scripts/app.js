jQuery(document).ready(function($) {

    function addToCart(productId) {
        var url = "/add-to-cart/" + productId;

        $.get(url, function(responseData) {

            var totalAmount = JSON.parse(responseData);

            $("#totalAmountText").text(totalAmount);
        });
    }

    $('.show-menu').click(function(event) {
        $(this).next().slideToggle();
    });

});