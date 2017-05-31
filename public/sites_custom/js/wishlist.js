$(document).on('click', '.btn-add-to-wishlist', function () {
    $.ajax({
        url : window.location.origin + "/wishlist/add",
        type : "get",
        context: this,
        dateType:"text",
        data : {
                product: $(this).attr("product")},
        success : function (result){
            if (result[0] == null) {
                alert(result[1]);
            } else {
                $(this).removeClass('btn-add-to-wishlist');
                $(this).addClass('btn-delete-to-wishlist');
                $(this).text(result[1]);
                $('.wishlist-count').text(result[0]);
            }
        }
    })
});

$(document).on('click', '.btn-delete-to-wishlist', function () {
    $.ajax({
        url : window.location.origin + "/wishlist/delete",
        type : "get",
        context: this,
        dateType:"text",
        data : {
                product: $(this).attr("product")
            },
        success : function (result){
            if (result[0] == null) {
                alert(result[1]);
            } else {
                $(this).removeClass('btn-delete-to-wishlist');
                $(this).addClass('btn-add-to-wishlist');
                $(this).text(result[1]);
                $('.wishlist-count').text(result[0]);
            }
        }
    })
});

$(document).on('click', '.remove_from_wishlist', function () {
    $.ajax({
        url : window.location.origin + "/wishlist/delete",
        type : "get",
        context: this,
        dateType:"text",
        data : {
                product: $(this).attr("product"), page: 1
            },
        success : function (result){
            if (result[0] == null) {
                alert(result[1]);
            } else {
                $('#page-wishlist').html(result);
                $('.wishlist-count').text(parseInt($('.wishlist-count').text(), 10) - 1);
            }
        }
    })
});
