

function pegarTicket(id,key){

  
    new Ajax.Request("./ajax/add_ticket.php", { 
        method:'post',
        parameters: {'id': id},
        onSuccess:function(transport){
            doc = document.getElementById(key);
            fade(doc);
        }, 
    });

    function fade(element) {
        var op = 1;  // initial opacity
        var timer = setInterval(function () {
            if (op <= 0.1){
                clearInterval(timer);
                element.style.display = 'none';
            }
            element.style.opacity = op;
            element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op -= op * 0.1;
        }, 15);
    }
}

new Ajax.PeriodicalUpdater('itens-banco',"./ajax/listar-ticket.php",{
    method:'get',
    frequency: 1,
    decay: 1
})