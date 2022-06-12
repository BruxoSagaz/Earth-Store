$(document).ready(function(){



    $('#ceps').mask('00000-000');




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
        url: config.path+"/php/gerar_nav.php",
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