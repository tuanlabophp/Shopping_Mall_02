/// <reference path="jquery-1.12.3.js" />
/* function to be executed when product is selected for comparision*/

$(document).on('click', '.addToCompare', function () {
    $.ajax({
      url : window.location.origin + "/compare",
      type : "get",
      dateType:"text",
      data : {
          product: $(this).attr("product")},
          success : function (result){
            $('.comparePanle').html(result);
            $(".comparePanle").show();
        }
    })
    

});
/*function to be executed when compare button is clicked*/
$(document).on('click', '.cmprBtn', function () {
    $.ajax({
            url : window.location.origin + "/compare",
            type : "get",
            dateType:"text",
            data : {
                show: true},
            success : function (result){
                $('.modPos').html(result);
                $(".modPos").show();
         }
     })
});

/* function to close the comparision popup */
$(document).on('click', '.closeBtn', function () {

    $(".comparePanle").hide();
    $(".modPos").hide();
});

$(document).on('click', '.closeCompare', function () {

        // $(".comparePanle").hide();
        $(".comparePanle").hide();
    });

$(document).on('click', '.showCompare', function () {

    $(".comparePanle").show();
});
/*function to remove item from preview panel*/
$(document).on('click', '.selectedItemCloseBtn', function () {
    $.ajax({
        url : window.location.origin + "/compare/delete",
        type : "get",
        dateType:"text",
        data : {
            product: $(this).attr("product")},
            success : function (result){
                if (result == 0) {
                    $(".comparePanle").empty();
                    $(".comparePanle").html(trans('sites.nothing_product'));
                    $(".comparePanle").hide();
                } else {
                    $('.comparePanle').html(result);
                }
            }
        })
    
});
