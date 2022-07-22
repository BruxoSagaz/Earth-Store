$(document).ready(function(){
    //  81 8588-5859
    $('#celular').mask('(00) 00000-0000');


    $('.form-contact').submit(function (e){
        e.preventDefault();
        dados = $(this).serialize();
        
        // console.log(dados);
        $.ajax({
            method:"post",
            url: "./ajax/add-ticket.php",
            data: dados,
            dataType: "json",
            error: function(){
                alert('Houve um erro ao mandar o ticket, tente novamente mais tarde ou contate o desenvolvedor');
            }
        }).done(function(data){
            console.log(data);
            alert('Seu pedido foi enviado, aguarde resposta pelo seu email');
            $('.form-contact input').val('');
            $('.form-contact textarea').val('');
            $('#range-carac').text('0');
        });
    })

    $('#texto').keyup(function (e){

        quant = $(this).val();
        tam = quant.length;
        // console.log(tam)

        $('#range-carac').text(tam);

    });

})