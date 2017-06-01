$(document).on('click', '#add-comment', function(){
    var text = $(this).parent().find('textarea').val();
    $.ajax({
        url: window.location.origin + "/product_comment",
        type: 'post',
        dataType: 'text',
        data: {
            content: text,
            parent_id: $(this).attr('parent_id'),
            product_id: $(this).attr('product_id'),
            user_id: $(this).attr('user_id'),
            _token: $(this).parent().find('input[name=_token]').val()
        },
        success: function(result) {
            $('#comments').html(result);
        }
    });
    // alert('thang');
});

$(document).on('click', '.edit-comment', function(){
    var text = $(this).parent().find('textarea').val();
    $.ajax({
        url: window.location.origin + "/product_comment/edit",
        type: 'post',
        dataType: 'text',
        data: {
            content: text,
            comment_id: $(this).attr('comment_id'),
            product_id: $(this).attr('product_id'),
            _token: $(this).parent().find('input[name=_token]').val()
        },
        success: function(result) {
            $('#comments').html(result);
        }
    });
    // alert('thang');
});

$(document).on('click', '.edit-reply', function(){
    var text = $(this).parent().find('textarea').val();
    $.ajax({
        url: window.location.origin + "/product_comment/edit",
        type: 'post',
        dataType: 'text',
        data: {
            content_reply: text,
            comment_id: $(this).attr('comment_id'),
            product_id: $(this).attr('product_id'),
            _token: $(this).parent().find('input[name=_token]').val()
        },
        success: function(result) {
            $('#comments').html(result);
        }
    });
    // alert('thang');
});

$(document).on('click', '.button-delete', function(){
    $.ajax({
        url: window.location.origin + "/product_comment/delete",
        type: 'post',
        dataType: 'text',
        data: {
            comment_id: $(this).attr('comment_id'),
            product_id: $(this).attr('product_id'),
            _token: $(this).attr('token')
        },
        success: function(result) {
            $('#comments').html(result);
        }
    });
    // alert('thang');
});

$(document).on('click', '.button-reply', function(){
    var parent = $(this).parent().parent().parent();
    var elementReply = parent.find('.reply');
    elementReply.removeClass('hide');
});

$(document).on('click', '.button-edit', function(){
    var parent = $(this).parent().parent().parent();
    var elementReply = parent.find('.edit');
    elementReply.removeClass('hide');
});

$(document).on('click', '#cancel_comment', function(){
    $('.reply').addClass('hide');
    $('.edit').addClass('hide');
});

$(document).on('click', '#thang', function(){
    var text = $(this).parent().find('textarea').val();
    $.ajax({
        url: window.location.origin + "/product_comment",
        type: 'post',
        dataType: 'text',
        data: {
            content: text,
            parent_id: $(this).attr('parent_id'),
            product_id: $(this).attr('product_id'),
            user_id: $(this).attr('user_id'),
            _token: $(this).parent().find('input[name=_token]').val()
        },
        success: function(result) {
            $('#comments').html(result);
        }
    });
    // alert(text);
});



$('star').raty({
  cancel  : true,
  starOff : 'star-off-big.png',
  starOn  : 'star-on-big.png'
});
