$(document).ready(function(){
    dataCEP = {};
    $("#estado").change(function () {				
        
        var options_cidades = '';
        var str = "";					
        
        $("#estado option:selected").each(function () {
            str += $(this).text();
        });
        
        $.each(dataCEP, function (key, val) {
            if(val.nome == str) {							
                $.each(val.cidades, function (key_city, val_city) {
                    options_cidades += '<option valor="' + val_city + '">' + val_city + '</option>';
                });							
            }
        });
        
        ;
        $("#cidade").html(options_cidades);
        
    });	

    $.getJSON('./json/estados_cidades.json', function (datas) {
        dataCEP = datas
        var items = [];
        var options = '<option valor="">escolha um estado</option>';
        originEstado = $("#estado").html();	
        var originCidade =  $("#cidade").html();
      
        $.each(dataCEP, function (key, val) {
            options += '<option valor="' + val.sigla + '">' + val.nome + '</option>';
        });	
        originEstado += options;
        // console.log($("#estado"))				
        $("#estado").html(originEstado);				
        $('#estado').trigger('change');

	
    
    });



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


    $('button[ordem=3]').click(function(){
        let itens = organizarDados()

        $('.display-frete').remove();
        $('.display-item').remove();

        $.each(itens, function (index, value) {

            trItem = document.createElement('tr');
            trItem.setAttribute('class','display-item');

            tdNome = document.createElement('td');
            stringItem = value.nome+" ("+value.quant+")"
            tdNome.innerHTML =  stringItem;
            trItem.appendChild(tdNome);

            tdPreco = document.createElement('td'); 
            total = value.preco * parseInt(value.quant);
            totalFormated = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(total);
            
            tdPreco.innerHTML =  totalFormated;
            trItem.appendChild(tdPreco);


            $('.display-final-payment').append(trItem);
        });


        setTimeout(function(){ 
            $.getJSON('./ajax/get-frete-session.php', function (response) {
                fretes = response.total;
    
                trFrete = document.createElement('tr');
                trFrete.setAttribute('class','display-frete');
    
                tdAnun = document.createElement('td');
                tdAnun.innerHTML =  "Frete:";
                trFrete.appendChild(tdAnun);
    
                tdFrete = document.createElement('td');
                total = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(fretes);
                tdFrete.innerHTML =  total;
                trFrete.appendChild(tdFrete);
    
                $('.display-final-payment').append(trFrete);
            })
        }, 1600);



        
    });












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
                url: "./ajax/get-servico-session.php",
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
                url: "./ajax/update-total-final.php",
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
            console.log(preco[index] );
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

        

      
        return data;
    }


        // preencher dados por cep
        $('#ceps').change(function(){
            var cep = $(this).val();
            if(cep.length == 9){
                cep = {"cep":cep};
                $.ajax({
                    method:"post",
                    url: "./ajax/cep-consult.php",
                    data: cep,
                    dataType: "json",
                    error: function(){
                        console.log("Erro em cep")
                    }
                }).done(function(data2){
                $('#endereco').val(data2["street"]);
                $('#complement').val(data2["complement"]);
                $("#bairro").val(data2["district"]);
                
                selector = "#estado [valor='"+data2["uf"]+"']";
                console.log(data2)
                $(selector).attr('selected', true);
                $("#estado").trigger('change');
    
    
                valor = data2['city'];
                selector = "#cidade [valor='"+valor+"']";
                $(selector).attr('selected', true);
                
    
                })
            }
        });
});