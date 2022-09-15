$(document).ready(function(){
    pagina = $('#page-chosen').attr('page');

    seletorBotao = 'a[page='+pagina+']';
    linkBotao = $(seletorBotao);
    linkBotao.css('background-color', "#f0ecec")
    linkBotao.css('color', "#de0610")
    linkBotao.css('border', "1px solid")

    // selectorSec = 'section[page='+pagina+']';

    // linkSec = $(selectorSec);
    // linkSec.css('display', "flex")

    // MASKS
    $('#cpf').mask('000.000.000-00');
    $('#cell').mask('(00)00000-0000');
    $('#data').mask('00/00/0000');


    // PEDIDOS ANIMATIONS
    var control = 0;
    $('.slide-indicator').click(function(){
        info = $(this).parent().find('.info-area');
        
        info.slideToggle(1000);
        
        i = $(this).find('i');

        if(control == 0){
            AnimateRotate('0','180',i);
            // i.css("transform","rotate(-180deg)")
            control += 1;
        }else{
            AnimateRotate('180','0',i);
            // i.css("transform","rotate(-360deg)")
            control -= 1;
        }
    })

  
    $('#user-data-form').submit(function(e){
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
        }


        //se chegar ao final envia
        if(verificarNome(nome) != false && verificarData(data) != false && verificarCell(cell) != false && verificarEmail(email) != false && verificarCPF(cpf) == true){
            
            let form = $(this); 
            $.ajax({
                type: "post",
                dataType:'json',
                url: './ajax/update-cadastro.php' ,
                data: form.serialize(),
            }).done(function(data){
                if(data.retorno == "sucesso"){
                    alert('Atualizções feitas com sucesso!');
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

    });

  
    $('#user-pass-form').submit(function(e){
        e.preventDefault()
        // stopDefAction(e);

        var atual = $('input[name=senhaAtual]');
        var nova = $('input[name=senhaNova]');



        if(verificarSenha(atual) == false){
            aplicarCampoInvalido(atual);
            // return false;
        }if(verificarSenha(nova) == false){
            aplicarCampoInvalido(nova);
        }

        //se chegar ao final envia
        if( verificarSenha(atual) != false && verificarSenha(nova) != false ){
            
            let form = $(this); 
            $.ajax({
                type: "post",
                dataType:'json',
                url: './ajax/update-senha.php' ,
                data: form.serialize(),
            }).done(function(data){
                alert(data.retorno);
                if(data.status == 'login'){
                    window.location.replace("http://localhost/Lojinha/&loggout");
                }
                
            });
            return false;
        }
      
    });


})


    $('.user-local-form').submit(function(e){
        e.preventDefault()

        valores = $(this).serialize();

        $.ajax({
            type: "post",
            dataType:'json',
            url: './ajax/salvar-end-bank.php' ,
            data: valores,
        }).done(function(data){
            alert(data.retorno);
            
        });
    })





function AnimateRotate(start,angle,elements) {

    // caching the object for performance reasons
    var $elem = elements;

    // we use a pseudo object for the animation
    // (starts from `0` to `angle`), you can name it as you want
    $({deg: start}).animate({deg: angle}, {
        duration: 1000,
        step: function(now) {
            // in the step-callback (that is fired each step of the animation),
            // you can use the `now` paramter which contains the current
            // animation-position (`0` up to `angle`)
            $elem.css({
                transform: 'rotate(' + now + 'deg)'
            });
        }
    });
}