$(function() {
   // Validações e Submit
    
    var cadBtn = $('#cadSubBtn');
    var form = $('.form2 #cadForm');
    var dataAtual = new Date();


    form.submit(function(e){

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
            setTimeout(function(){
                el.attr('type','date');
            },1000);

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
        }if(verificarSenha() == false){
            aplicarCampoInvalido($('input[name=senha]'));
            // return false;
        };

        //se chegar ao final envia
        if(verificarNome(nome) != false && verificarData(data) != false && verificarCell(cell) != false && verificarEmail(email) != false && verificarCPF(cpf) == true &&  verificarSenha() != false){
            
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
        },1000);
        setTimeout(function(){
            el.css('border', '1px solid #ccc',2000);
            el.attr("placeholder", sd);
        },1500);
        

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


        if(tamanho >= 4 && tamanho <= 6 ){
            seg += 10;
        }else if (tamanho > 6 ){  
            seg += 25;
        }

        if(senha.match(/[a-z]+/) && senha.match(/[A-Z]+/)){
            seg += 10;  
        }

        if(senha.match(/[0-9]+/)){
            seg += 10;
        }

        if(senha.match(/[@!#$%&*]+/)){
            seg += 20;

        }

        return seg;
    }


    function mostrarSeg(seg){
        var ind =  $('#segtotal');

        ind.css("display", "block");


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

    function verificarData(data){
        var anoFilter = dataAtual.getFullYear();
        anoFilter = anoFilter - 5;

        data = data.toString();
        data = data.split('-');
        year = parseInt(data[0]);

        if(year <= 1900 || year >= anoFilter){
            return false;
        }else{
            return true;
        }   
    };

    $('#senha').on('keyup', function() {
        //Mostra a segurança de senha pelo retono da função
        mostrarSeg(senhaSeg());
    })

    // Mascaras
    $('#cpf').mask('000.000.000-00');
    $('#cell').mask('(00)00000-0000');


   
});


