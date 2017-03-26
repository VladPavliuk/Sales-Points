function searchProducts(inputText) {
    var uri = "/search/" + inputText;

    $.get(uri, function(respone) {
        alert(respone);
    });
}