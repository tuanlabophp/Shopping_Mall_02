function updateSubCart() {
    $.ajax({
        url : window.location.origin + '/cart/add',
        type : "get",
        context : this,
        dateType:"text",
        data : {
            product: 0},
            success : function (result){
                $('.basket').html(result);
            }
    })
}

$(document).on('click', '.add-cart-button', function () {
    $.ajax({
        url : window.location.origin + '/cart/add',
        type : "get",
        context : this,
        dateType:"text",
        data : {
            product: $(this).attr("product")},
            success : function (result){
                $('.basket').html(result);
                $(this).removeClass('add-cart-button');
                $(this).find('a').addClass('btn-warning btn');
                $(this).find('a').removeClass('le-button');
                $(this).find('a').text('Đã thêm vào giỏ');
            }
    })
});

$(document).on('click', '.close-btn', function () {
    $.ajax({
        url : window.location.origin + '/cart/delete',
        type : "get",
        dateType:"text",
        context: this,
        data : {
            product: $(this).attr("product"),
            mainCart: $(this).attr("mainCart")
        },
        success : function (result){
            if ($(this).attr("mainCart") == 1) {
                $('#cart-page').html(result);
                updateSubCart();
            } else {
                $('.basket').html(result);
            }
        }
    })
});

$(document).on('click', '.le-quantity a', function(){
    var currentQty= $(this).parent().parent().find('input').val();
    if( $(this).hasClass('minus') && currentQty > 1){
        $(this).parent().parent().find('input').val(parseInt(currentQty, 10) - 1);
        $.ajax({
            url : window.location.origin + '/cart/update',
            type : "get",
            dateType:"text",
            data : {
                product: $(this).parent().parent().find('input').attr("product"),
                qty: $(this).parent().parent().find('input').val()
            },
            success : function (result){
                $('#cart-page').html(result);
                updateSubCart();
            }
        });
    }else{
        if ($(this).hasClass('plus')){
            $(this).parent().parent().find('input').val(parseInt(currentQty, 10) + 1);
            $.ajax({
                url : window.location.origin + '/cart/update',
                type : "get",
                dateType:"text",
                data : {
                    product: $(this).parent().parent().find('input').attr("product"),
                    qty: $(this).parent().parent().find('input').val()
                },
                success : function (result){
                    $('#cart-page').html(result);
                    updateSubCart();
                }
            });
        }
    }
});
