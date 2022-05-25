$(document).ready(function(){
    //Header
    var categs;
    var iconSearch = $('#glass');
    var search = $('#keysearch');

    $('.mobile-header h3').click(function(){
        $('nav.mobile-header').slideToggle();
    })

    iconSearch.click(function(){

        if(search.val() == ""){
            $('.form-field').toggle(500);
        }

    })

    // Abrir Popup do cart
    abrirJanela();
    function abrirJanela(){
        $('.bag-shipping').click(function(e){
            e.stopPropagation();
            $('.cart-sidebar').fadeToggle("slow");
        });

        $('.cart-sidebar').click(function(e){
            e.stopPropagation();
        });

        $('body').click(function(e){
            e.stopPropagation();
            $('.cart-sidebar').fadeOut("slow");
        });

    }
    //Escutar o evento de redimencionalização de tela
    window.addEventListener('resize', hideCartSideBar);

    function hideCartSideBar(){

        if($(window).width() < 768){
            $('.cart-sidebar').replaceWith('<div class="cart-sidebar"></div>');
        }

    }
    
    $(".img").hover(function(e){
        
        e.stopPropagation();
        $(this).stop().fadeOut();
        $("#sec_img").stop().fadeIn();
    }, function(e){

        e.stopPropagation();
        $(this).stop().fadeIn();
        $("#sec_img").stop().fadeOut();

        
    });

    // Produzir Vac-list

    $.ajax({
        method:"post",
        url: "./php/gerar_nav.php",
        data:"oi",
        dataType: "json",
        error: function(){
            console.log("Sem itens no banco")
        }
    }).done(function(data){
        categs = data;
        if(data != '' || data != null){
            construirNav(categs);
        }else{
            $('.nav-list').append("<span>Sem dados no banco falar com a administração!</span>");
        }
        
    })


    function construirNav(categ){
        categ.forEach(element => {
            console.log(element[0]);
            let minus = element[0].toLowerCase();
            const li = document.createElement('li');
            const a = document.createElement('a');
            const button = document.createElement('button');
            button.innerHTML=element[0];

            a.appendChild(button);
            a.setAttribute("href","&page=filtros&filter="+minus);
            li.appendChild(a);

            $('.nav-list').append(li);;
        });

    }
});