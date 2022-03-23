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
    }if(verificarCell(cell)== false){
        aplicarCampoInvalido($('input[name=cell]'));
    }if(verificarEmail(email) == false){
        aplicarCampoInvalido($('input[name=email]'));
    };

    return false;
});


// Funções de validação
function verificarNome(nome){

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

function aplicarCampoInvalido(el){
    var sd = el.attr('placeholder')
    el.val('');
    el.css('border', '0px solid red');
    el.animate({'borderWidth': '3px'});
    el.attr("placeholder", "Campo Inválido");
    setTimeout(function(){
        el.animate({'borderWidth': '0px'});
    },500);
    setTimeout(function(){
        el.css('border', '1px solid #ccc');
        el.attr("placeholder", sd);
    },1000);
    

    return false;
}

function verificarCell(cell){
    if(cell == ''){
        return false;
    }
    if(cell.match(/^\([0-9]{2}\)[0-9]{5}-[0-9]{4}$/) == null){
        return false;
    }
}

function verificarEmail(email){
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

function stopDefAction(evt) {
    evt.preventDefault();
}

