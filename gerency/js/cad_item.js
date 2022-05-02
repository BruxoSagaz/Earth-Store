$(document).ready(function(){

    // Common variables
    var aply = $('#aply_prom');
    var tags = [];
    var i = 0;
    


    // Mask
    $('.valor').mask('000.000.000.000.000,00', {reverse: true});

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
            console.log(tags);
            return div;
        }

        
        var div = createTag(tag);

        $(div).appendTo(".tag-container");


        var filter = $('#filter').val("");
        var value = $('#value').val("");

        // Clear Tags
        $('.close').click(function(e){
            e.stopPropagation();
            e.preventDefault();
            clearTags(this);
        });
    });
    

    // Clear Tags Function
    function clearTags(rtag) {

        let attr = rtag.getAttribute('data-item');

        if(tags.includes(attr)){
            tags.splice(tags.indexOf(attr), 1);
        }
        
        rtag.closest('.tag').remove();

    }

    // Item Creation


    //On-Off Apply prom
    aply.click(function(){
        let basePrice = $('#base-price').val();
        let promText = $('#prom_val');
        let discountTag = $('.discount');
        let priceBefore =  $('.price-before');
        let priceOff = $('.price-off')
        
        if (aply.is(':checked')){
            promText.prop('disabled', false);
            discountTag.fadeToggle();
            priceBefore.fadeToggle();
            priceBefore.text(priceOff.text()); 
            promText.css('background','#fff');
            applyPercent();
        }else{
            clearPercent();
            promText.prop('disabled', true);
            if(basePrice == ''){
                $('.price-off').text('R$ 00,00');
            }else{
                $('.price-off').text('R$ '+ basePrice);
            }
            promText.val('');
            discountTag.fadeToggle();
            priceBefore.fadeToggle();
            promText.css('background','#b5b5b5');
            applyDivisions();
            
        }
    })

    $('#nome').keyup(function(){
        let pName = $('.product-name');
        pName.text(this.value)

        if(this.value == ''){
            pName.text('Nome Exemplo')
        }

    });

    $('#base-price').keyup(function(){
        let priceBefore = $('.price-before');
        let priceOff = $('.price-off');

        if (aply.is(':checked')){
            if(this.value == ''){
                priceBefore.text('R$ 11,11');
            }else{
                priceBefore.text("R$ "+this.value);
            }
    
        }else{
            if(this.value == ''){
                priceOff.text('R$ 00,00');
            }else{
                priceOff.text("R$ "+this.value);
            }
           
        }

        applyDivisions();
        applyPercent();
    });

    $('#prom_val').keyup(function(){

        let priceBefore = $('.price-before');
        let priceOff = $('.price-off');
        
        if(this.value == ''){
            priceOff.text(priceBefore.text());
        }else{
            priceOff.text("R$ "+this.value);
        }

        applyDivisions();
        applyPercent();
    });

    
    // Aplly Divisions function 

    // Tranform text to data
    function ripValues(value) {

        value = value.split('R$ ');
        value = value[1];
        value = value.replace(".","");
        value = value.replace(",",".");
        value = parseFloat(value);

        return value;
    }


    function applyDivisions(){
        let value = $("#par-div").val();
        let divisions = $('#divisions-par');
        let price = $('.price-off').text();
        let calcDiv = parseInt(value);

        if (value != 1){
            // Tranform text to data
            price = ripValues(price);
            price = price / calcDiv;
            price = price.toString();
            price = price.split(".");
            //Adicionando 00 no fim para não ter problema
            price[1] = price[1]+"00";
            price[1] = price[1].substr(0,2);
            if(price[1] == "nd"){
                price[1] = "00";
            }
            price = price[0] + "." + price[1];
            price = price.replace(".",",");

            

            divisions.text("Ou até "+value+" de R$ "+price);
        }else{
            divisions.text("");
        }
    }

    //  Aplly Percent
    function applyPercent() {  

        let divtag = $(".discount");
        let baseValue = format($("#base-price").val());
        let promValue = format($("#prom_val").val());
        let final = (promValue * 100) / baseValue;  
        final = Math.round(final);
        final = 100 - final;

        function format(val) {
            
            val = val.replace(",",".");
            val = parseFloat(val);
            return val;
        }
        
        if(final.toString() != "NaN"){
            divtag.text(final+"%");
        }
        
    }

    function clearPercent() { 
        let divtag = $(".discount");
        divtag.text("");
    }

    $('#par-div').change(function(){
        applyDivisions();
    });




    // File upload system




    $('#file_to_upload').change(function(e){
        $('#file_name').text("arquivos: ");
        window.selectedFile = e.target.files;
        files = e.target.files;
        console.log(e.target.files);
        let len = window.selectedFile.length;
       
        for(i = 0; i<=len-1;i++){
            // console.log(window.selectedFile[i].name);
            if(i==len-1){
                $('#file_name').append(` ${window.selectedFile[i].name} `);
            }else{
                $('#file_name').append(` ${window.selectedFile[i].name} +`);
            }
        }

        if(len >= 2){
            $('#img').attr('src', URL.createObjectURL(files[0]));
            $('#sec_img').attr('src', URL.createObjectURL(files[1]));
        }else{
            $('#img').attr('src', URL.createObjectURL(files[0]));
            $('#sec_img').attr('src',"../images/example.png");
        }

        // let file = $(this)[0].files[0];
        // const reader = new FileReader();
        // reader.readAsDataURL(file);
        // reader.onload = function(){

        //     $('#img').attr('src', reader.result);
            
        // }
        
    });

    // Manda o arquivo
    $('#upload_file_button').click(function(){

        let len = window.selectedFile.length;

        for(i=0;i<=len-1;i++){
            uploadFile(window.selectedFile[i]);
        }
    });



    function uploadFile(file) {
        var formData = new FormData();
        formData.append('file_to_upload', file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.open('POST', './php/uploader.php');
        ajax.send(formData);
    }

    // function progressHandler(event) {
    //     var percent = (event.loaded / event.total) * 100;
    //     document.getElementById("progress_bar").value = Math.round(percent);
    //     document.getElementById("progress_status").innerHTML = Math.round(percent) + "% Enviado ";
    // }

    $("#img").hover(function(e){
        
        e.stopPropagation();
        $(this).stop().fadeOut();
        $("#sec_img").stop().fadeIn();
    }, function(e){

        e.stopPropagation();
        $(this).stop().fadeIn();
        $("#sec_img").stop().fadeOut();

        
    });
});

    // Funções para tela de gerência

    function abrirJanelaModal(e){
        let bg = $('.modal-bg');

        bg.fadeIn();
    }

    function verificarCliqueFechar(){
        let el = $('body,.close-btn');
        let bg = $('.modal-bg');
        
        el.click(function(){
            bg.fadeOut();
        });

        $('.form-modal').click(function (e){
            e.stopPropagation();
        })

        $('.salvar').click(function (e){
            e.preventDefault();
        })
    }