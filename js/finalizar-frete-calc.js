$(document).ready(function(){

    if($('#ceps').val().length == 9){
        calcularFreteTotal();
    }
    
    $('#ceps').change(function () { 
        if($(this).val().length == 9){
            calcularFreteTotal();
        }
    });

    $('.result-cep').on('change','input[name="escolha"]', function () {
        calcularTotalComFrete();
    });

    $('#calcular-cep').click(function(e){
        e.preventDefault();
        calcularFreteTotal()
    });

    $('#servic').click(function(){
        calcularFreteTotal();
        calcularTotalComFrete();
    })








    function calcularFreteTotal(){
        setTimeout(function(){
        cepInput = $("#ceps");

       
        ids = Array();

        cartIds = $('.cart-id');

        $.each(cartIds, function (index, value) { 
            indId = $(this).attr('value').trim();
            ids.push(indId);
        });
        
        
        if(ids.length > 0){

            $('.retorno').remove();
            $('#loadingmessage').show();
            $('.hide-result').hide();

            
            $.ajax({
                method:"post",
                url: config.path+"/ajax/get-servico-session.php",
                dataType: "json",
                error: function(){
                    console.log("Erro em pegar servico ")
                }
            }).done(function(data){
            $('#servic').attr('valor',data);
            })

            if(validarCep(cepInput.val())){
            
                $('.alert-cep').fadeOut('fast');

                $.ajax({
                    method:"post",
                    url: "../ajax/calcularFrete.php",
                    data: "id="+ids+"&cep="+cepInput.val(),
                    dataType: "json",
                    error: function(){

                    }
                }).done(function(data){
                    //console.log(data);
                    $('#loadingmessage').hide();


                

                    data.forEach(function callback(item,index){
                        var tab = createTable(item,index);
                        $(tab).appendTo('.result-cep table tbody');
                    })

                    calcularTotalComFrete();

                    $('.hide-result').fadeIn();

                });


            }else{
                cepInput.css('border', '0px solid red');
                cepInput.animate({'borderWidth': '3px'});

                setTimeout(function(){
                    cepInput.animate({'borderWidth': '0px'});
                },1000);
                setTimeout(function(){
                    cepInput.css('border', '1px solid #ccc',2000);
                },1500);

                $('.alert-cep').fadeIn();
            }
        }
        },1000);
    }

    function validarCep(val){

        if(val.length < 9){
            return false
        }else{
            return true
        }
        
    }

    function createTable(item,index,servico){


        
        preco = formatarMoeda(item['preco']);



        const tr = document.createElement('tr');

        tr.setAttribute('class',"retorno");
      
        const td = document.createElement('td');
        const input = document.createElement('input')
        input.setAttribute('type',"radio");
        input.setAttribute('name',"escolha");
        input.setAttribute('valor',preco);
        input.setAttribute('servico',item['servico']);
        if(item['servico'] == $('#servic').attr('valor')){
            input.checked = true;
        }
        td.appendChild(input);
        tr.appendChild(td);

        const td1 = document.createElement('td');
        td1.innerHTML = item['servico'];
        tr.appendChild(td1);
        
        const td2 = document.createElement('td');
        td2.innerHTML = "R$ "+item['preco'];
        tr.appendChild(td2);
        
        const td3 = document.createElement('td');
        td3.innerHTML = item['prazo']+" Dias";
        tr.appendChild(td3);

        return tr;
    }

    function formatarMoeda(valor) {

        valor = valor + '';
        valor = parseInt(valor.replace(/[\D]+/g, ''));
        valor = valor + '';
        valor = valor.replace(/([0-9]{2})$/g, ".$1");

        if (valor.length > 6) {
            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ",$1.$2");
        }

        if(valor == 'NaN') valor = '';

        return valor;
    }




    function calcularTotalComFrete(){
        input = $('.retorno input[name="escolha"]:checked');
        h2Total = $('.total-price');
        totalCart = parseFloat($('#quant-final-carr').attr('valor'));
        servico = input.attr('servico');
        frete = parseFloat(input.attr('valor'));
        total = totalCart + frete;

        setTimeout(function(){
        if(totalCart>0){

            //console.log(total);
            h2Total.attr('valor',total)
            totalFormat = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(total)
            h2Total.text(totalFormat);

            
            $.ajax({
                method:"post",
                url: config.path+"/ajax/update-total-final.php",
                data: {'total':total,'servico':servico,'frete':frete},
                dataType: "json",
                error: function(){
                    console.log("Erro em save Total Final")
                }
            }).done(function(data){
            })
        }
        },1000);
    }
});