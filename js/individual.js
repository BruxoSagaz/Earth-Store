$(document).ready(function(){

    id = $('.item-id').attr('id');


    $('#ceps').mask('00000-000');


    $('#calcular-cep').click(function(){
        cepInput = $("#ceps");


        if(validarCep(cepInput.val())){
            $('.alert-cep').fadeOut('fast');

            $.ajax({
                method:"post",
                url: "./ajax/calcularFrete.php",
                data: "id="+id+"&cep="+cepInput.val(),
                dataType: "json",
                error: function(){

                }
            }).done(function(data){
                console.log(data);

                data.forEach(function callback(item,index){
                    var tab = createTable(item,index);

                    $(tab).appendTo('.result-cep table tbody');
                   
                })
                
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

    });

    function validarCep(val){

        if(val.length < 9){
            return false
        }else{
            return true
        }
        
    }

    function createTable(item,index){

        console.log(item['servico']);

        const tr = document.createElement('tr');

        tr.setAttribute('id',"retorno"+toString(index+1));
      

        const td = document.createElement('td');
        td.innerHTML = item['servico'];
        tr.appendChild(td);
        
        const td2 = document.createElement('td');
        td2.innerHTML = "R$ "+item['preco'];
        tr.appendChild(td2);
        
        const td3 = document.createElement('td');
        td3.innerHTML = item['prazo']+" Dias";
        tr.appendChild(td3);

        return tr;
    }
});