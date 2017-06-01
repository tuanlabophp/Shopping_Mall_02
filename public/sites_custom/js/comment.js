$(document).ready(function()
{
    $('#submit_comment').on('click', function()
    {   
        var content = $('#content').val();
        var parent_id = $(this).attr('parent_id');
        var product_id = $(this).attr('product_id');
        $.ajax({
            url: 'product/#comments',
            type: 'post',
            dataType: 'JSON',
            data: {
                content: content,
                parent_id: parent_id,
                product_id: product_id
            },
            success: function(result) {
                $('#new_comment').html(result.data);
            }
        });
    });
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

$('star').raty({
  cancel  : true,
  starOff : 'star-off-big.png',
  starOn  : 'star-on-big.png'
});