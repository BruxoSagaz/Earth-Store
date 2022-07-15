$(document).ready(function(){

    $('.header-account').click(function(){
        $('.modal-user').fadeToggle();
    });

    page = $('#button-highlight').attr('page');

    selector = '.config-list li button.'+page;
    $(selector).attr("class",'marked');

});