$(document).ready(function(){

    $('.marcar-recebido').click(function (){
        id = $(this).attr('valor');
        info = {'id': id}
        $.ajax({
            type: "post",
            dataType:'json',
            url: config.path+'/ajax/marcar-pedido.php' ,
            data: info,
        }).done(function(data){
            alert(data.msg); 
            document.location.reload(true);
        });
    })
})