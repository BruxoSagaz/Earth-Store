$(document).ready(function(){

    $('.sec-footer').css('position','absolute');
    $('.sec-footer').css('bottom','0');


    $(".tabela-pedidos").on( "click", "td i.apagar-item", function() {
        // $("#button2").trigger('click');
        pai = $(this).parent().parent();
        num = pai.find('.numero-ordem').text()
        num = parseInt(num) + 1;
        
        selector = '.cart-itens .cart-item-individual:nth-child('+num+')';

        pai.fadeOut();
        
        $(selector).find('i').trigger('click');
        
        $.getJSON(config.path+'/ajax/get-total.php', function (response) {
            console.log('Total = '+response.total)
            if(response.total>0){
                total2 = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(response.tota);
                $('.total-price-cart').text(total2);
            }else{
                $('.total-price-cart').text("R$ 00,00");
            }

        });
    });



    $("body").on( "change", "input[type=number]", function() {
        input = $(this);
        quant = input.val();
        id = input.attr('ref');

        if(quant <= input.attr('max')){
            selector = 'input[ref="'+id+'"]';

            $(selector).val(quant);
        }else{
            selector = 'input[ref="'+id+'"]';

            $(selector).val(input.attr('max'));
        }

    });
}); 