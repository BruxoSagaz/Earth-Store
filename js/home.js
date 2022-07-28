$(document).ready(function(){
    atualizarTamSlide()


    const car = document.querySelector('.car-1 .js-slides');
    new Glider(car,{
        slidesToShow:1,
        slidesToScroll:1,
        draggable: true,
        dots: '.car-1-dots',
        scrollLock: true
    });

    const car2 = document.querySelector('.car-2 .js-slides');
    new Glider(car2,{
        slidesToShow:1,
        slidesToScroll:1,
        draggable: true,
        dots: '.car-2-dots',
        scrollLock: true
    });

    const cara = document.querySelector('.car-a .js-slides');
    new Glider(cara,{
        slidesToShow:5,
        slidesToScroll:2,
        draggable: true,
        scrollLock: true,
        arrows:{
            prev:".car-a-prev",
            next:".car-a-next"
        }
    });

    const carab = document.querySelector('.car-b .js-slides');
    new Glider(carab,{
        slidesToShow:5,
        slidesToScroll:2,
        draggable: true,
        scrollLock: true,
        arrows:{
            prev:".car-b-prev",
            next:".car-b-next"
        }
    });


    $(window).on('resize', function(){
        atualizarTamSlide()
    })

    function atualizarTamSlide(){
        tam = $(window).width();

        $('.c-carousel').each(function (index, element) {
            // element == this
            $(this).css('width',tam)
        });

        $('.c-carousel').each( function (indexInArray, valueOfElement) { 
            tam = $("#metric").width();
            $(this).css('width',tam);
            $('.b-allign').css('width',tam);
        });
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
        Headers:'Access-Control-Allow-Origin: *',
        method:"post",
        url: config.path+"/php/gerar_nav.php",
        data:"oi",
        dataType: "json",
        error: function(){
            console.log("Nav Com erro")
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
            // console.log(element[0]);
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

    $('.thumbnail').click(function(){
        
        img = $(this).find('img').attr('src');

        $('#img-principal').attr('src',img);
    });

});