$(document).ready(function(){

    $('#validade').mask('00/0000');
    $('#num-card').mask('0000000000000000');
    $('#cvv').mask('000');

    $('.user-card-form ').submit(function (e){
        e.preventDefault()

        valores = $(this).serialize();

        $.ajax({
            type: "post",
            dataType:'json',
            url: config.path+'/ajax/salvar-card-bank.php' ,
            data: valores,
        }).done(function(data){
            alert(data.retorno);
            
        });
    })
})