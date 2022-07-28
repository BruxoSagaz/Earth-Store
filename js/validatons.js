$(function() {
   // Validações e Submit
    
    var cadBtn = $('#cadSubBtn');
    var form = $('.form2 #cadForm');



    form.submit(function(e){
        e.preventDefault()
        // stopDefAction(e);

        var nome = $('input[name=nome]').val();
        var data = $('input[name=data]').val();
        var cpf = $('input[name=cpf]').val();
        var cell = $('input[name=cell]').val();
        var email = $('input[name=email]').val();
        // var senha = $('input[name=senha]').val();



        //se chegar ao final envia
        if(verificarNome(nome) == false){
            aplicarCampoInvalido($('input[name=nome]'));
            // return false;
        }if(verificarData(data) == false){
            let el = $("#data");
            el.attr('type','text');
            aplicarCampoInvalido(el,"Data Inválida!");
            // return false;
        }if(verificarCell(cell)== false){
            aplicarCampoInvalido($('input[name=cell]'));
            // return false;
        }if(verificarEmail(email) == false){
            aplicarCampoInvalido($('input[name=email]'));
            // return false;
        }if(verificarCPF(cpf) == 'Um CPF não pode ter letras' ){
            aplicarCampoInvalido($('input[name=cpf]'),'Um CPF não pode ter letras');
            // return false;
        }if(verificarCPF(cpf) == false){
            aplicarCampoInvalido($('input[name=cpf]'));
            // return false;
        }if(verificarSenha($('input[name=senha]')) == false){
            aplicarCampoInvalido($('input[name=senha]'));
            // return false;
        };

        //se chegar ao final envia
        if(verificarNome(nome) != false && verificarData(data) != false && verificarCell(cell) != false && verificarEmail(email) != false && verificarCPF(cpf) == true &&  verificarSenha($('input[name=senha]')) != false){
            
            let form = $(this); 
            $.ajax({
                type: "post",
                dataType:'json',
                url: './../ajax/cadastrar.php' ,
                data: form.serialize(),
            }).done(function(data){
                if(data.retorno == "sucesso"){
                    alert('Cadastro feito, faça Login!');
                    $('input').val("");
                }else{
                    invalidos = data.invalidos.split(',');
                    invalidos = invalidos.filter((item)=>item != '');

                    invalidos.forEach(function(nome) {
                        if(nome != "senha"){
                            aplicarCampoInvalido($('input[name='+nome+']'),'Este '+nome+' não pode ser usado');
                        }else{
                            aplicarCampoInvalido($('input[name='+nome+']'),'Esta '+nome+' não pode ser usada')
                        }
                    });
                    
                }
                
            });
            return false;
        }
        return false;
    });




    $('#senha').on('keyup', function() {
        //Mostra a segurança de senha pelo retono da função
        mostrarSeg(senhaSeg());
    })

    // Mascaras
    $('#cpf').mask('000.000.000-00');
    $('#cell').mask('(00)00000-0000');
    $('#data').mask('00/00/0000');

    $( ".enter i.fa-solid" ).mousedown(function() {
        $(".senha").attr("type", "text");
        $(this).toggleClass("fa-eye-slash fa-eye")
      });
    
    $( ".enter i.fa-solid" ).mouseup(function() {
        $(".senha").attr("type", "password");
        $(this).toggleClass("fa-eye fa-eye-slash")
    });

    $( ".enter i.fa-eye" ).mouseout(function() { 
        console.log('esse')
        $(".senha").attr("type", "password");
        $(this).toggleClass("fa-eye fa-eye-slash")
    });



});


