$(document).ready(function(){

    $.ajax({
        method:"post",
        url: "./php/listing.php",
        data: "select=all",
        dataType: "html",
        success: function (response) {
            $('#item-list-body').html(response);
        },
        error: function(){
            $('#item-list-body').html("ERROR");
        }
    });

})