$(document).ready(function(){
    var modal = $('.modal-bg');
    var detalhes = {};
    console.log('oi')

    $('td i.fa-comment').click(function(){
        
        id = $(this).attr('id');
        $.ajax({
            method:"post",
            url: "./ajax/detalhes-ticket.php",
            data: "id="+id,
            dataType: "json",
            success: function (response) {
                detalhes = response;
                console.log(detalhes)
                $('#id-do-atendimento').text(response['id']);
                $('#assunto').text(response['assunto']);
                $('#relato').text(response['relato']);
                $('#info-nome').text('Nome: '+response['nome'])
                $('#info-email').text('Email: '+response['email'])
                $('#info-celular').text('Celular: '+response['celular'])


            },
            error: function(){
                console.log('erro')
            }
        });
    
        
    
    })

    function contruirTr(nomes,valor){
        const trNova = document.createElement('tr');
        trNova.setAttribute('class',nomes);
        const nomeNova = document.createElement('td');
        nomeNova.innerHTML = nomes+":";
        const valorNova = document.createElement('td');
        total = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(valor);
        valorNova.innerHTML = total;

        trNova.appendChild(nomeNova);
        trNova.appendChild(valorNova);

        return trNova;
    }


    function construirItens(value,index){

        const tr = document.createElement('tr');
        tr.setAttribute('class','retono'+index);
        const nome = document.createElement('td');
        nome.innerHTML = value[1]+':';
        const valor = document.createElement('td');
        total = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(value[2]);
        valor.innerHTML = total;

        tr.appendChild(nome);
        tr.appendChild(valor) 
        
        return tr;
    
    }

    $('td i.fa-comment').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        modal.fadeIn();
    })

    //evitar bugs
    $('.form-modal').click(function(e){
        e.stopPropagation();
    });

    //sair da modal
    $('.close-btn').click(function(){
        sairModal()
    });

    //sair da modal
    $('body').click(function(){
        sairModal()
    });


    function sairModal(){
        modal.fadeOut(function(){
            $('.information-area').empty();
        });
        // $('#nome-comprador').empty();
        // $('#endereco-entrega').empty();
        // $('#servico-entrega').empty();
        // $('#data-pedido').empty();
     
        // $('#').empty();
        // $('#').empty();
        
    }

    $('.rastreio button').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        info = $('#form_edit_item').serialize();
        idTran = $('#id-do-pedido').text().trim();
        info += '&id='+idTran;
        console.log(info);

        $.ajax({
            method:"post",
            url: "./ajax/responder-atendimento.php",
            data: info,
            dataType: "json",
            success: function (response) {
                detalhes = response;
                console.log(response);
                if(response['retorno'] == 'sucesso'){
                    alert('Atualizado com sucesso, recarregando página')
                    document.location.reload(true);
                }else{
                    alert('Falha no despache, tente novamente ou contate o desenvolvedor')
                }

            },
            error: function(){
                console.log('erro')
            }
        });
    })

});