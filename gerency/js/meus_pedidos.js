$(document).ready(function(){
    var modal = $('.modal-bg');
    var detalhes = {};

    $('td i.fa-pen-to-square').click(function(){
        
        id = $(this).attr('id');
        $.ajax({
            method:"post",
            url: "./ajax/detalhes_pedido.php",
            data: "id="+id,
            dataType: "json",
            success: function (response) {
                detalhes = response;
                console.log(response);
                $('#id-do-pedido').text('ID do pedido: '+ response['transaction-id']);
                itens = detalhes.itens;
                array = itens.split(',');
                corte = 4
                itensSeparados = [];
        
                for (var i = 0; i < array.length; i = i + corte) {
                    itensSeparados.push(array.slice(i, i + corte));
                }
                
                itensSeparados.forEach(function callback(value, index){
                    $('.information-area').append(contruirItens(value,index));
                });
                frete = 0;
                itensSeparados.forEach(function callback(value, index){
                    frete += parseFloat(value[2]);
                });
                var custo =  parseFloat(detalhes['custo']);
                console.log(frete);
                frete = custo - frete;
               
                $('.information-area').append(contruirTr('Frete',frete));

                $('.information-area').append(contruirTr('Total',custo));

                $('#endereco-entrega').text("Endereço de Entrega: "+detalhes['endereco_entrega'])

                $('#servico-entrega').text(detalhes['servico'])
                $('#data-pedido').text('Data do Pedido: '+detalhes['data'])
                $('#nome-comprador').text('Nome do Receptor: '+detalhes['nome_comprador'])


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


    function contruirItens(value,index){

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

    $('td i.fa-pen-to-square').click(function(e){
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
        modal.fadeOut();
        $('#nome-comprador').empty();
        $('#endereco-entrega').empty();
        $('#servico-entrega').empty();
        $('#data-pedido').empty();
        $('.information-area').empty();
        // $('#').empty();
        // $('#').empty();
        
    }



});