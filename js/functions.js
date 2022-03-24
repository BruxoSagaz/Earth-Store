$(document).ready(function(){

    // Variáveis de troca de tela
    //Botões
    var cad_b = $('#troc_cad');
    var log_b = $('#troc_log');
    //h2
    var cad_a = $('#cad');
    var log_a = $('#log')

    // Trocar form2
    function changF2(){

        $('.form').fadeOut();

        setTimeout(function(){
            $('.form2').fadeIn();
            $('.form2').css('display','flex');
        },500);
    }

    // Trocar form1
    function changF1(){

        $('.form2').fadeOut();

        setTimeout(function(){
            $('.form').fadeIn();
            // $('.form2').css('display','flex');
        },500);
    }


    // Disparo
    cad_b.click(function(){
        cad_a.css("cursor","default");
        log_a.css("cursor","pointer");
        changF2();
    });

    // Disparo
    log_b.click(function(){
        changF1()
        cad_a.css("cursor","pointer");
        log_a.css("cursor","default");
    });

    // Disparo
    cad_a.click(function(){
        cad_a.css("cursor","default");
        log_a.css("cursor","pointer");
        changF2();
    });

    // Disparo
    log_a.click(function(){
        changF1()
        log_a.css("cursor","default");
        cad_a.css("cursor","pointer");
    });

    // Validações e Submit

    var cadBtn = $('#cadSubBtn');
    var form = $('.form2 #cadForm');


    form.submit(function(e){

        stopDefAction(e);

        var nome = $('input[name=nome]').val();
        var cpf = $('input[name=cpf]').val();
        var cell = $('input[name=cell]').val();
        var email = $('input[name=email]').val();
        var senha = $('input[name=senha]').val();



        //se chegar ao final envia
        if(verificarNome(nome) == false){
            aplicarCampoInvalido($('input[name=nome]'));
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
        }else if(verificarCPF(cpf) == false){
            aplicarCampoInvalido($('input[name=cpf]'));
            // return false;
        }if(verificarSenha() == false){
            aplicarCampoInvalido($('input[name=senha]'));
            // return false;
        };

        return false;
    });

    // aplicar campo inválido
    function aplicarCampoInvalido(el,msg){
        var valor = el.val();
        var sd = el.attr('placeholder')
        el.val('');
        el.css('border', '0px solid red');
        el.animate({'borderWidth': '3px'});
        if(valor == ""){
            el.attr("placeholder", "Preencha Este Campo");
        } else if(msg){
            el.attr("placeholder", msg);
        } else{
            el.attr("placeholder", "Campo Inválido");
        }
        
        setTimeout(function(){
            el.animate({'borderWidth': '0px'});
        },500);
        setTimeout(function(){
            el.css('border', '1px solid #ccc');
            el.attr("placeholder", sd);
        },1000);
        

        return false;
    }

    //Parar evento padrão
    function stopDefAction(evt) {
        evt.preventDefault();
    }


    // Funções de validação
    function verificarNome(nome){

        nome = nome.trim();
        // e.preventDefalt();

        if(nome == ''){
            return false;
        }

        var amount = nome.split(' ').length;
        var splitStr = nome.split(' ');
        var final = '';


        if( amount >= 2){

            for(var i = 0; i < amount; i++){
                //Trocando para primeira maiuscula
                var word = splitStr[i];
                var capt = word[0].toUpperCase() + word.slice(1).toLowerCase();
                splitStr[i] = capt;

            }

            for(var i = 0; i < amount; i++){
                final += splitStr[i] + " ";
            }

            $('input[name=nome]').val(final);

        }else{
            return false;
        }

    }



    //validar celular
    function verificarCell(cell){

        cell = cell.trim();

        if(cell == ''){
            return false;
        }
        if(cell.match(/^\([0-9]{2}\)[0-9]{5}-[0-9]{4}$/) == null){
            return false;
        }
    }


    // validar email
    function verificarEmail(email){

        email = email.trim();

        if(email == ''){
            return false;
        }

        if(email.match(/^([a-z0-9A-Z]{1,})+@+([a-z0-9A-Z.]{1,})$/) == null){
            return false;
        }

        var amount = email.split('@').length;
        var splitStr = email.split('@');
        var montage = "";

        if( amount >= 2){

            for(var i = 0; i < amount; i++){
                //Trocando para primeira minuscula
                var capt = splitStr[i].toLowerCase();
                
                splitStr[i] = capt;

                if(i == 1){
                    montage += '@';
                }

                montage+=splitStr[i];
            }

            $('input[name=email]').val(montage);

        }else{
            return false;
        }

    }

    // Validar CPF
    function verificarCPF(cpf){

        cpf = cpf.toString();
        cpf = cpf.trim();
        cpf = cpf.replace('.','');
        cpf = cpf.replace('.','');
        cpf = cpf.replace('-','');

        

        if(!cpf.length == 11 || cpf == ''){
            return false;
        } else if(cpf.match(/^[0-9]{1,}$/) == null){
            //alert('Um CPF só pode ter letras');
            return 'Um CPF não pode ter letras';
        }
        if(cpf == "00000000000"){
            return false;
        }

        var soma;
        var resto;

        soma = 0;

        for (i=1; i<=9; i++) soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
        resto = (soma * 10) % 11;
    
        if ((resto == 10) || (resto == 11))  resto = 0;
        if (resto != parseInt(cpf.substring(9, 10)) ) return false;
    
        soma = 0;
        for (i = 1; i <= 10; i++) soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
        resto = (soma * 10) % 11;
    
        if ((resto == 10) || (resto == 11))  resto = 0;
        if (resto != parseInt(cpf.substring(10, 11) ) ) return false;
        return true;

    }

    function verificarSenha(){

        if(senhaSeg() < 45){
            return  false;
        }


    }

    function senhaSeg(){
        var el = $('#senha');
        var senha = el.val();
        var seg = 0;
        var tamanho = senha.length;

        console.log(senha);

        if(tamanho >= 4 && tamanho <= 6 ){
            seg += 10;
            console.log("satisfaz1");
        }else if (tamanho > 6 ){  
            console.log("satisfaz2");
            seg += 25;
        }

        if(senha.match(/[a-z]+/) && senha.match(/[A-Z]+/)){
            seg += 10;  
            console.log("satisfaz3");
        }

        if(senha.match(/[0-9]+/)){
            seg += 10;
            console.log("satisfaz4");
        }

        if(senha.match(/[@!#$%&*]+/)){
            seg += 20;
            console.log("satisfaz5");

        }

        return seg;
    }


    function mostrarSeg(seg){
        var ind =  $('#segtotal');

        ind.css("display", "block");

        console.log("seg total: " + seg);

        if(seg <= 25){
            ind.text("Muito Fraca");
            ind.css('color', "red");
        }else if(seg > 25 && seg < 45){            
            ind.text("Fraca");
            ind.css('color', "orange");
        }else if(seg >= 45 && seg <= 55){
            ind.text("média");
            ind.css('color', "green");
        }else if(seg > 55 && seg <= 65){
            ind.text("Muito Forte");
            ind.css('color', "blue");
        }
    }

    $('#senha').on('keyup', function() {
        //Mostra a segurança de senha pelo retono da função
        mostrarSeg(senhaSeg());
    })
    // Mascaras
    $('#cpf').mask('000.000.000-00');
    $('#cell').mask('(00)00000-0000');


})