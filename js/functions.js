$(document).ready(function(){
    // Sessão Login e Sing-up
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
        },400);
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

})


//filter-case
function slidingToggle(num){

    switch(num){
        case 1:
            $('#filter-cases1').slideToggle();
        break;

        case 2:
            $('#filter-cases2').slideToggle();
        break;

        case 3:
            $('#filter-cases3').slideToggle();
        break;

        case 4:
            $('#filter-cases4').slideToggle();
        break;

        case 5:
            $('#filter-cases5').slideToggle();
        break;

        case 6:
            $('#filter-cases6').slideToggle();
        break;
    }
}