$(document).ready(function(){

    var modalShadow = $('.modal-shadow');
    var modal = $('.modal-bg');




    $.ajax({
        method:"post",
        url: "./php/list_variations.php",
        data: "select=all",
        dataType: "html",
        success: function (response) {
            $('#item-list-body').html(response);
        },
        error: function(){
            $('#item-list-body').html("ERROR");
        }
    });









    // Parte de edit

    //sair da modal
    $('.close-btn').click(function(){
        sairMordal();
    });

    //sair da modal
    $('body').click(function(){
        sairMordal();
    });
    //evitar bugs
    $('.form-modal').click(function(e){
        e.stopPropagation();
    });


    $(document).on('click','.fa-pen',function(e){
        e.preventDefault();
        e.stopPropagation();
        var cat_tag = $(this).parent().siblings('.categoria');
        //SALVANDO ID PARA TODO O COD
        var categoria = cat_tag.text();

        $.ajax({
            method: 'post',
            url: './php/select_edit_categ.php',
            data: {'categoria':categoria},
            dataType:'json'

        }).done(function(data){
            //Ativando o global das informações
            antigasInfo = data;
            obj = data;
            console.log(data);
            actualizeModal(data);
            modal.fadeIn();

        });

    

        //modal.fadeIn();
    });


    function actualizeModal(obj){

        $('#categ-get').text(obj['categoria']);
        let father = $('.divisions');

        let variacoes = obj['variacoes'];
        if(variacoes != "Sem Variações"){
            father.empty();
            variacoes = variacoes.split(',');
            variacoes.forEach(element => {
        
                // criar input
                let input = document.createElement('input');
                input.setAttribute('type','text');
                input.setAttribute('class','input-gerado');
                input.setAttribute('name',"var");
                input.setAttribute('value',element);

                // criar apagador
                trash = document.createElement('i');
                trash.setAttribute('class',"fa-solid fa-circle-minus");





                // criar outra div square
                let squareInput = document.createElement('div');
                squareInput.setAttribute("class","square-input");
                // juntar square com icon

                squareInput.appendChild(input);
                squareInput.appendChild(trash);

                // colocar dentro da div square
                father.append(squareInput);
            });

            // criar outra div square
            let squareInput = document.createElement('div');
            squareInput.setAttribute("class","square-input");
            // criar outra plus icon
            let plusIcon = document.createElement('i');
            plusIcon.setAttribute('class',"fa-solid fa-square-plus");
            

            // juntar e aplicar
            squareInput.appendChild(plusIcon)
            
            father.append(squareInput);
        }
    }

    function sairMordal(){
        modal.fadeOut();
        $('input[name=categoria]').trigger("change");
    }



    // Funções de troca de icone por input

    $('.divisions').on('click','.fa-square-plus',function(e){
        e.preventDefault();
        e.stopPropagation();
        el = $(this);
        generateInputIcons(el);
    });

    $('.fa-square-plus').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        el = $(this);
        generateInputIcons(el);
    });

    $('.divisions').on('click','.fa-circle-minus',function(){
        $(this).parent().remove();
    });

    function generateInputIcons(el){

        // console.log("oi");

        let father = el.parent();
        let divisions = el.parent().parent();

        // criar input
        let input = document.createElement('input');
        input.setAttribute('type','text');
        input.setAttribute('class','input-gerado');
        input.setAttribute('name',"var");

        // criar apagador
        trash = document.createElement('i');
        trash.setAttribute('class',"fa-solid fa-circle-minus");



        // criar outra plus icon
        let plusIcon = document.createElement('i');
        plusIcon.setAttribute('class',"fa-solid fa-square-plus");

        // criar outra div square
        let squareInput = document.createElement('div');
        squareInput.setAttribute("class","square-input");
        // juntar square com icon

        squareInput.appendChild(plusIcon);

        // colocar dentro da div square
        father.empty();
        father.append(input);
        father.append(trash);

        // colocar square em divisions
        divisions.append(squareInput);
    }

    // Filtragem
    function chamarAjax(select){
        escolhas =  "select="+select;
        $.ajax({
            method:"post",
            url: "./php/list_variations.php",
            data: escolhas,
            dataType: "html",
            success: function (response) {
                $('#item-list-body').html(response);
            },
            error: function(){
                $('#item-list-body').html("ERROR");
            }
        });
    }

    $('input[name=categoria]').change(function(){
        select = $(this).val();
        if(select == ""){
            select = "all";
        }
        chamarAjax(select);
    });
    

    $('#start-gen-search').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $('input[name=categoria]').trigger("change");
    });

    // Mandar variações para o banco

    $("#send-variations").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        valores = [];

        varia = document.querySelectorAll('.input-gerado');
        varia.forEach(element => {
            valores.push(element.value);
        });

        // data.forEach(element => {
        //     console.log(element);
        // });
        select = "select="+obj['categoria']+"&variations="+valores;

        $.ajax({
            method:"post",
            url: "./php/update_var.php",
            data: select,
            dataType: "json",
            success: function (data) {
                if(data.sucesso){
                    alert("ATUALIZADO!");
                }
            },
            error: function(){
               alert("NÃO ATUALIZADO");
            }
        });
    });
})

