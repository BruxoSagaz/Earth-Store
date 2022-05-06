$(document).ready(function(){
    // Funções para tela de gerência
    // janela modal
    var aply = $('#aply_prom');
    var promVal = $('#prom_val');
    var tagContainer =$(".tag-container");
    var imgBreaker = $('.img-breaker');
    modal = $('.modal-bg');


    //sair da modal
    $('.close-btn').click(function(){
        modal.fadeOut();
        tagContainer.empty();
        imgBreaker.empty();
    });

    $('body').click(function(){
        modal.fadeOut();
        tagContainer.empty();
        imgBreaker.empty();
    });

    $('.form-modal').click(function(e){
        e.stopPropagation();

    });

    $('.fa-pen').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var id_tag = $(this).parent().siblings('.id');
        let id = id_tag.text();

        $.ajax({
            method: 'post',
            url: './php/select_edit.php',
            data: {'id':id},
            dataType:'json'

        }).done(function(data){
            console.log(data);
            actualizeModal(data);

            modal.fadeIn();

        });

    

        //modal.fadeIn();
    });


    // Clear Tags Function
    function clearTags(rtag) {

        let attr = rtag.getAttribute('data-item');

        if(tags.includes(attr)){
            tags.splice(tags.indexOf(attr), 1);
        }
        
        rtag.closest('.tag').remove();

    }


    aply.click(function(){
        if(aply.is(':checked')){
            promVal.removeAttr("disabled");
            promVal.css('background','white')
        }else{
            promVal.attr("disabled");
            promVal.css('background','#b5b5b5');
        }
    });

    function actualizeModal(obj){
        $('#nome').val(obj['nome']);
        $('input[name=categorias]').val(obj['categoria']);
        $('#base-price').val(obj['preco']+',00');
        if(obj['promocao'] == 1){
            aply.prop('checked', true);
            promVal.val(obj['valor_em_promocao']+',00').removeAttr("disabled").css('background','white');
        }
        $('par-div').val(obj['parcelas']);
        $('input[name=quantity]').val(obj['estoque']);

        tags =  obj['tags'].split(',');

        tags.forEach(element => {
            var div = createTag(element);
            $(div).appendTo(".tag-container");  
        });

        var closes = $('.close');
        closes.on('click',function(e){
            // e.stopPropagation();
            // e.preventDefault();
            console.log('oi');
            clearTags(this);
        });

        // Ok button click Start tags
        $('#startTag').click(function(e){
            e.preventDefault();

            var filter = $('#filter').val().trim();
            var value = $('#value').val().trim();
            var tag = filter +" : "+ value;
    
            // Null treatment
            if(value == "" || filter == ""){
                $('#filter').val("");
                $('#value').val("");
                return false;
            }

                   
            var div = createTag(tag);

            $(div).appendTo(".tag-container");


            var filter = $('#filter').val("");
            var value = $('#value').val("");

        })

       // Images!
       images = obj['imagens'].split(' ');

       images.forEach(element => {
            if(!element == ""){
                li = addImage(element);
                $(li).appendTo('.img-breaker');
                
            }

        });

       console.log(images);

    }

    // Create tag
    function createTag(tag) {
        const div = document.createElement('div');
        div.setAttribute('class', 'tag');
        const span = document.createElement('span');
        span.innerHTML = tag;
        const closeIcon = document.createElement('i');
        closeIcon.innerHTML = 'X';
        closeIcon.setAttribute('class', 'close');
        closeIcon.setAttribute('data-item', tag);
        div.appendChild(span);
        div.appendChild(closeIcon);
        tags.push(tag);
        //console.log(tags);
        return div;
    }

    function addImage(name){
        const li = document.createElement('li');
        const img = document.createElement('img');
        img.setAttribute('src',`../uploads/${name}`);
        img.setAttribute('alt','image');
        li.appendChild(img);

        return li;
    }

    // Trash can

    $('.fa-trash-can').on('click',function(e){
        $(this).parent().parent().fadeOut();
    });



    $('#base-price').mask('000.000.000.000.000,00', {reverse: true});
});

