$(document).on('click', '.category', function () {
    $.ajax({
          url : 'search',
          type : "get",
          dateType:"text",
          data : {
                  category: $(this).attr("category-id")},
          success : function (result){
               $('#products-tab').html(result);
          }
    })
});

$(document).on('click', '.price', function () {
    $.ajax({
          url : 'search',
          type : "get",
          dateType:"text",
          data : {
                  price: $(this).attr("price-range")},
          success : function (result){
               $('#products-tab').html(result);
          }
    })
});

$(document).on('click', '.technical', function () {
    $.ajax({
          url : 'search',
          type : "get",
          dateType:"text",
          data : {
                  technical: $(this).attr("technical-id")},
          success : function (result){
               $('#products-tab').html(result);
          }
    })
});

$(document).on('click', '.size', function () {
    $.ajax({
          url : 'search',
          type : "get",
          dateType:"text",
          data : {
                  size: $(this).attr("size")},
          success : function (result){
               $('#products-tab').html(result);
          }
    })
});
