$(document).ready(function(){

    $.ajax({
        method:"post",
        url: "./php/listing.php",
        data: "select=all&check=False",
        dataType: "html",
        success: function (response) {
            $('#item-list-body').html(response);
        },
        error: function(){
            $('#item-list-body').html("ERROR");
        }
    });



    function chamarAjax(select,promCheck,where,equals){
        escolhas =  "select="+select+"&check="+promCheck+"&where="+where+"&equals="+equals;
        console.log(escolhas);
        $.ajax({
            method:"post",
            url: "./php/listing.php",
            data: escolhas,
            dataType: "html",
            success: function (response) {
                $('#item-list-body').html(response);
            },
            error: function(){
                $('#item-list-body').html("ERROR");
            }
        });
    }

    $('input[name=ordem]').change(function(){
        select = $(this).val();
        prom = $('#are-prom').is(':checked');
        where = $('#id-search').val();
        equals = $("#keysearch").val();

        if(!where=="" && equals == ""){
            where = "";
        }

        // console.log(where+" "+equals);
        chamarAjax(select,prom,where,equals);
    });

    $('#are-prom').change(function(){
        $('input.input-filter:checked').trigger("change");
    });

    $('#start-query-button').click(function(){
        $('input.input-filter:checked').trigger("change");
    });
})