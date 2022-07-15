$(document).ready(function(){


    // Mascaras de input
    $('#ceps').mask('00000-000');
    $('#numero').mask('000000');
    $('#validade').mask('00/0000');
    $('#num-card').mask('0000000000000000');

    //Navegação
    
    $('.continue-shipping').click(function(e){
        e.preventDefault();

        let ordemAtual = $(this).attr('ordem');
        
        selector = "*[ordem="+ordemAtual+"]";
        if(ordemAtual != '3'){
            $(selector).fadeOut(600,function(){
                proximo = parseInt(ordemAtual) + 1;
    
                selector = "*[ordem="+proximo+"]";
                $(selector).fadeIn(1200);
            });    
        }else{
            $(selector).fadeOut(1200,function(){
                proximo = parseInt(ordemAtual) + 1;
    
                selector = "*[ordem="+proximo+"]";
                $(selector).fadeIn(1800);
            });
        }


    })

        
    $('.go-back').click(function(e){
        e.preventDefault();

        let ordemAtual = $(this).attr('ordem');
        
        selector = "*[ordem="+ordemAtual+"]";

        $(selector).fadeOut(600,function(){
            proximo = parseInt(ordemAtual) - 1;

            selector = "*[ordem="+proximo+"]";
            $(selector).fadeIn(1200);
        });


    })

    // Apagar itens
    $(".tabela-pedidos").on( "click", "td i.apagar-item", function() {
        // $("#button2").trigger('click');
        pai = $(this).parent().parent();
        num = pai.find('.numero-ordem').attr('valor');
        num = num;
        
        selector = '.cart-itens .cart-item-individual .numero-ordem[valor='+num+']';
        console.log("num " + num)
        pai.fadeOut('slow',function(){
            $(this).remove();
            $(selector).find('i').trigger('click');
        });


    });


    // Atualizar quantidade
    $("body").on( "change", "input[type=number]", function() {
        input = $(this);
        quant = input.val();
        id = input.attr('ref');

        if(quant <= parseInt(input.attr('max'))){
            selector = 'input[ref="'+id+'"]';

            $(selector).val(quant);
            $.ajax({
                method:"post",
                url: config.path+"/ajax/update_cart_quant.php",
                data:"id="+id+"&quant="+quant,
                dataType: "json",
                error: function(){
                    console.log("Erro em add cart ajax")
                }
            }).done(function(){
               
                calcularTotal();
            })
            
            
        }else{
            selector = 'input[ref="'+id+'"]';

            $(selector).val(input.attr('max'));
        }

    });


    // preencher dados por cep
    $('#ceps').change(function(){
        var cep = $(this).val();
        if(cep.length == 9){
            cep = {"cep":cep};
            $.ajax({
                method:"post",
                url: config.path+"/ajax/cep-consult.php",
                data: cep,
                dataType: "json",
                error: function(){
                    console.log("Erro em cep")
                }
            }).done(function(data){
            // console.log(data);
            $('#endereco').val(data["street"]);
            $('#complement').val(data["complement"]);
            $("#bairro").val(data["district"]);
            $("#cidade").val(data["city"]);
            $("#estado").val(data["uf"]);
            })
        }
    });

    // Aguardar salvar local
    $('#salvar-end').click(function(){
        if($(this).is(":checked")){
            if(validarLocal()== false){
                $('.local-form input').change(function(){
                    if(validarLocal() == true){
                        salvarLocal();
                    }
                })
            }else{
                salvarLocal();
            }
        };
    });



    if($('#salvar-end').is(":checked")){
            $('.local-form input').change(function(){
                if(validarLocal() == true){
                    salvarLocal();
                }
            })
    };

    // SALVAR CARTAO

    $('#salvar-card').click(function(){
        if($(this).is(":checked")){
           
            $('#credit-card-form input.card').change(function(){
                salvarcard();
            })

            salvarcard();
        
        };
    });

    if($('#salvar-card').is(":checked")){
        $('#credit-card-form input.card').change(function(){
            salvarcard();
        })
    };


    // Sistema de pagamento transparente
    var valor = 0;
   
    var imagens = []



    // listar badneiras
    $.ajax({
        method:"post",
        url: config.path+"/ajax/cartao-credito.php",
        data: {'gerar_sessao':'true'},
        dataType: "json",
        error: function(){
            console.log("Erro em pegar sessao")
        }
    }).done(function(data){
       console.log(data);

       PagSeguroDirectPayment.setSessionId(data.id);
       PagSeguroDirectPayment.getPaymentMethods({
            success:function(response){
                console.log(response);
                var bancos = ''
                var bandeiras = ''

                $.each(response.paymentMethods.CREDIT_CARD.options,function(key,value){

                    imagens[value.name.toLowerCase()] = 'https://stc.pagseguro.uol.com.br'+value.images.MEDIUM.path;

                    bandeiras+='<option value="'+value.name.toLowerCase()+'">'+value.name+'</option>';

                    $('#bandeiras').append(bandeiras);
                })


            
            }
       })

    })


    // Detectar a bandeira do cartão
    $('#num-card').on('keyup',function(){
        if($(this).val().length >= 6){
            detectarBandeira($(this));
        }
    });


    // Pegar pracelamento
    $('#bandeiras').change(function (){
        cartao = $(this).val();
        gerarParcelas(cartao);
    })
    //console.log($('#bandeiras').val());
    $('.paid-card-trig').click(function(){
        console.log('oi');

        if($('#num-card').val().length >= 6){
            detectarBandeira($('#num-card'));
        }

        if($('#bandeiras').val() != ''){
            console.log('if');
            cartao = $('#bandeiras').val();
            gerarParcelas(cartao);
        }
    })

    $('.get-paid-here').click(function(e){
        e.stopPropagation();
        $('.once').fadeOut();
        window.scrollTo(0,0);



        var ordemAtual = $(this).attr('ordem');
        metodoForm = $(this).attr('valor');
        pegarLocal();
        $.getJSON(config.path+'/ajax/get-total-final.php', function (response) {
            valor = response.total 
            
            
            
            // $('#get-total-final-response').attr('valor',)
            if(validarLocal() == true){
                // $('.modal-bg').fadeIn();
               
                
            
                selector = "*[ordem="+ordemAtual+"]";
        
                $(selector).fadeOut(600,function(){
                    proximo = parseInt(ordemAtual) + 1;
        
                    selector = "*[ordem="+proximo+"]";
                    $(selector).fadeIn(1200);
                });
        
                // $('.pay-card').fadeIn();
               
                seletor = "."+metodoForm;
                $(seletor).fadeIn();
    
                if(metodoForm == 'boleto'){
                    $('#proceed-payment').attr('valor',"BOLETO");
                }else{
                    $('#proceed-payment').attr('valor','CreditCard')
                }
                
                //disableForm('.pay-card')
    
            }
        })



    })

    $('.pay-card').click(function(e){
        e.stopPropagation();
    });

    $('body').click(function(e){
        e.stopPropagation();
        $('.pay-card').fadeOut("fast");
        $('.modal-bg').fadeOut("slow");
       
    });


    $('#proceed-payment').click(function(e){
        e.preventDefault();

        var hash = PagSeguroDirectPayment.getSenderHash();
        itens = organizarDados();
        
        local = pegarLocal();
        // console.log(organizarDados($('.local-form')
       
        var metodo = $(this).attr('valor');

        if(metodo == 'CreditCard'){
            var pgto = pegarFormPagamento();
            var numero_cartao = $('#num-card').val();
            var cvv = $('#cvv').val();
            var bandeira = $('#bandeiras').val();
            var parcela = $('#divisions-values').val();
            var validade =  $('#validade').val();
            validade = validade.split('/');
            var mes = validade[0];
            var ano = validade[1]
            

            disableForm('.credit-card');

            // pegar bandeira
            PagSeguroDirectPayment.createCardToken({
                cardNumber: numero_cartao,
                brand: bandeira,
                cvv:cvv,
                expirationMonth: mes,
                expirationYear: ano,
    
                success:function(data){
                    console.log('sucesso');
                    var token = data.card.token;
                    var splitParcelas = parcela.split(':');
                    var numeroParcela = splitParcelas[0];
                    var valorParcela = splitParcelas[1];
    
    
    
                    $.ajax({
                        method:"post",
                        url: config.path+"/ajax/cartao-credito.php",
                        data: {'fechar_pedido': true,'token':token,'cartao':bandeira,'parcelas':numeroParcela,'valorParcela':valorParcela,'hash':hash,'amount':valor,'itens':itens, 'User': pgto,'local':local,'metodo':metodo},
                        dataType: "json",
                        error: function(){
                            console.log('Ocorreu um erro no pagamento, Revise seus dados!')
                        }
                    }).done(function(data){
                    //    console.log(data);
                        if(data.status == undefined){
                            // Ocorreu erro no pagamento
                            alert('Ocorreu um erro no pagamento, Revise seus dados!')
                        }else{
                            // processado com sucesso
                            console.log(data);
                            // $.get( config.path+"/ajax/clean-cart.php", function( data ) {
                            //     console.log('cart limpo')
                            // });

                            $.ajax({
                                method:"post",
                                url: config.path+"/ajax/clean-cart.php",
                                data: '0',
                                dataType: "json",
                                error: function(){
                                    console.log('Ocorreu um erro apagando cart')
                                }
                            })

                            
                            $('.apagar').fadeOut("fast");
                            $('.aparecer-success-buy').fadeIn("slow")
                            enableForm('.pay-card');
                        }
            
                    })
    
                },
    
                error: function(erro){
                    alert('Erro ao gerar pagamento, Revise seus dados! Ou tente novamente mais tarde');
                    
                    enableForm('.pay-card');
                }
            })



        }else if(metodo == 'BOLETO'){

            // var token = data.card.token;
            // var splitParcelas = parcela.split(':');
            // var numeroParcela = splitParcelas[0];
            // var valorParcela = splitParcelas[1];

            disableForm('.boleto');
            nome = $('#nomeCompraBoleto').val();
            cpf = $('#cpfBoleto').val();
            celular = $('#celularBoleto').val();

            celular = celular.replace(/([^\d])+/gim, '');
            cpf = cpf.replace(/([^\d])+/gim, ''),

            $.ajax({
                method:"post",
                url: config.path+"/ajax/cartao-credito.php",
                data: {'fechar_pedido': true,'hash':hash,'amount':valor,'itens':itens,'nome': nome,'cpf':cpf,'local':local,'celular':celular,'metodo':metodo},
                dataType: "json",

            }).done(function(BOLETO){

                
                $.ajax({
                    method:"post",
                    url: config.path+"/ajax/clean-cart.php",
                    data: '0',
                    dataType: "json",
                    error: function(){
                        console.log('Ocorreu um erro apagando cart')
                    }
                })

                $('.apagar').fadeOut("fast");
                $('.aparecer-success-buy').fadeIn("slow")
                enableForm('.pay-card');
               console.log(BOLETO.paymentLink);
            })

        }

        // var bin = numero_cartao.substring(0,6);
        
        
        
    })



// funcoes

    function organizarDados(){

        data = Array()

        nomes = Array();
        nomesHTML = $('.nome-item-banco');
        $.each(nomesHTML, function (index, value) { 
            nomes[index] = $(this).text().trim();
        });

        
        quant = Array();
        quantHTML = $('.final-quant');
        $.each(quantHTML, function (index, value) { 
            quant[index] = $(this).val();
        });

        preco = Array();
        precoHTML = $('.valorFinal');
        $.each(precoHTML, function (index, value) { 
            preco[index] = $(this).attr('valor');
        });
        
        id = Array();
        idHTML = $('.cart-id');
        $.each(idHTML, function (index, value) { 
            id[index] = $(this).text().trim();
        });



        $.each(nomes, function (index, value) { 
            data[index] = {'nome':value,'quant':quant[index],
            'preco' : preco[index],'id':id[index] 
        };
        });

        

        console.log(data);

        return data;
    }

    function pegarFormPagamento(){
        
       
        form = $('.payment-information');
        celular = $('#celular').val();
        celular2 = celular.replace(/([^\d])+/gim, '');


        data = {
            'nome' : $('#nomeCompra').val(),
            'cpf' : $('#cpf').val().replace(/([^\d])+/gim, ''),
            'celular':celular2,
            'num-card' : $('#num-card').val(),
            'bandeira' : $('#bandeiras').val(),
            'divisoes' : $('#divisions-values').val(),
            'cvv' : $('#cvv').val(),
            'validade' : $('#validade').val()
        }


        return data;
    }

    function pegarLocal(){
        form =  $('.local-form');
        inputs = form.find('input');
        info = Array();

        $.each(inputs, function (index, value) {
            info.push($(this).val());
        });

        final = {
            'cep':info[0],
            'rua':info[1],
            'numero':info[2],
            'complemento':info[3],
            'bairro':info[4],
            'cidade':info[5],
            'estado':info[6]
        }

        console.log(final);

        return final;

    }


    function disableForm(select){
        form = $(select).find('form');

        form.animate({'opacity':'0.4'})
        form.find('input').attr('disabled','disabled')
        form.find('button').attr('disabled','disabled')
        form.find('select').attr('disabled','disabled')
    }

    function enableForm(select){
        form = $(select).find('form');

        form.animate({'opacity':'1'})
        form.find('input').removeAttr('disabled')
        form.find('button').removeAttr('disabled')
        form.find('select').removeAttr('disabled')
    }




    function salvarLocal(){
        data = $('.local-form input').serialize();
        // console.log(data);


        $.ajax({
            method:"post",
            url: config.path+"/ajax/save-local.php",
            data: data,
            dataType: "json",
            error: function(){
                console.log("Erro em save local Session")
            }
        }).done(function(data){
        //    console.log(data);

        })

    }

    function salvarcard(){
        data = $('#credit-card-form').serialize();
        // console.log(data);


        $.ajax({
            method:"post",
            url: config.path+"/ajax/save-card.php",
            data: data,
            dataType: "json",
            error: function(){
                console.log("Erro em save card Session")
            }
        }).done(function(data){
        //    console.log(data);

        })

    }




    function validarLocal(){

        var s = $('.local-form input');
        s.each(function(){
            var t = $(this);
            if(t.val()){
                t.addClass('exclua-me');
            }
        });
        var vazios = s.not('.exclua-me'); 
        tam = vazios.length;
        
        vazios.each(function(){
            var v = $(this);

            if(v.attr('name') != 'complement'){
                v.css('border', '0px solid red');
                v.animate({'borderWidth': '3px'});
                v.attr("placeholder", "Preencha");

                setTimeout(function(){
                    v.animate({'borderWidth': '0px'});
                },1000);
                setTimeout(function(){
                    v.css('border', '1px solid #ccc',2000);
                },1500);
            }
        });

        

        if($('#complement').val() == ""){
            tam = tam-1;
        }

        //console.log(tam);
        if(tam == 0){
            return true
        }else{
            return false
        }
        
    }


    function detectarBandeira(input){
        
        brand =  input.val().substring(0,6);
        console.log(brand);
        PagSeguroDirectPayment.getBrand({
            cardBin:brand,
            success:function(v){
                var cartao = v.brand.name;
                console.log(valor);
                PagSeguroDirectPayment.getInstallments({
                    amount:valor,
                    maxInstallmentNoInterest:'4',
                    brand:cartao,
                    success: function(data){

                        bandeiras = $('select[name=bandeiras]')
                        bandeiras.find('option').removeAttr('selected')
                        bandeiras.find('option[value='+cartao+']').attr('selected','selected')

                        // Listar Parcelamento
                        $('#divisions-values').html('');
                        $.each(data.installments[cartao],function(index,value){
                            index++
                            var htmlAtual =  $('#divisions-values').html();
                            var valorParcela = value.installmentAmount;
                            var parcelaFormatada = valorParcela.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

                            parcelaFormatada = parcelaFormatada.toLocaleString('pt-br', {minimumFractionDigits: 2})

                            var juros = value.interestFree == true ? 'Sem Juros' : 'Com Juros';

                            $('#divisions-values').html(htmlAtual+'<option value="'+index+':'+valorParcela+'" > '+index+'x '+parcelaFormatada+'  '+juros+'</option>');

                        })

                      
                    }
                })
            }
        });
    }

    function gerarParcelas(cartao){
        PagSeguroDirectPayment.getInstallments({
            amount:valor,
            maxInstallmentNoInterest:'4',
            brand:cartao,
            success: function(data){


                // Listar Parcelamento
                $('#divisions-values').html('');
                $.each(data.installments[cartao],function(index,value){
                    index++
                    var htmlAtual =  $('#divisions-values').html();
                    var valorParcela = value.installmentAmount;
                    var parcelaFormatada = valorParcela.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

                    parcelaFormatada = parcelaFormatada.toLocaleString('pt-br', {minimumFractionDigits: 2})

                    var juros = value.interestFree == true ? 'Sem Juros' : 'Com Juros';

                    $('#divisions-values').html(htmlAtual+'<option value="'+index+':'+valorParcela+'" > '+index+'x '+parcelaFormatada+'  '+juros+'</option>');

                })

              
            }
        })
    }

    
    function calcularTotal() {
        total = 0;
        quant = Array();
        filtrados = Array();
        let precos = $('.cart-preco').text();
        let inputs = document.querySelectorAll('input[name=quantidade]');
        // console.log("ANtes precos: "+precos);
        precos = precos.split(' ');

        inputs.forEach(element => {
            quant.push(parseInt(element.value));
        });

        // console.log("quantidade: "+quant);
        // console.log("precos: "+precos);
        for(i=2;i<=precos.length;i+=2){
            // console.log("precos[i]: "+precos[i]);
            filtrados.push(precos[i]);
        }
       
        for(i=0;i<filtrados.length;i++){
            
            send = (filtrados[i].match(/./g) || []).length;
            for(i2=0;i2<send;i2++){
                filtrados[i] = filtrados[i].replace(".","");
                
            }
            filtrados[i] = parseFloat(filtrados[i].replace(",","."));
            
        }
        // console.log(filtrados);
        for(i=0;i<filtrados.length;i++){
            total += filtrados[i] * quant[i];
        }

        
        total2 = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(total);
        $('.total-price-cart').text(total2);
        $('.total-price-cart').attr("valor",total);
        $("#servic").trigger('click');
    }
}); 