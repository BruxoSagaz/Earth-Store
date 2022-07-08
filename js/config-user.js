$(document).ready(function(){
    pagina = $('#page-chosen').attr('page');

    seletorBotao = 'a[page='+pagina+']';
    linkBotao = $(seletorBotao);
    linkBotao.css('background-color', "#f0ecec")

    selectorSec = 'section[page='+pagina+']';

    linkSec = $(selectorSec);
    linkSec.css('display', "flex")



    // PEDIDOS ANIMATIOSN
    var control = 0;
    $('.slide-indicator').click(function(){
        info = $('.info-area');
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