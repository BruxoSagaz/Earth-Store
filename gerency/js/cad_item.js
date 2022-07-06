$(document).ready(function(){

    // Common variables
    var aply = $('#aply_prom');
    var tags = [];
    var i = 0;
    var contadorMud = 0

    
    // Mask
    $('.valor').mask('000.000.000.000.000,00', {reverse: true});
    
    // Ok button click Start tags
    $('#startTag').click(function(e){
        e.preventDefault();
        e.stopPropagation();

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
            //console.log(tags);
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

    function ripToSend(value){
        value = value.split('.');
        value = value.toString();
        value = value.replace(',',".");
        // let lenForItem = value.length;
        // value = value.toString();
        // for(let i = 0;i<lenForItem;i++){
        //     value = value.replace(',','');
        // }
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
            if(price[1] == "nd" || price[1] == 'un'){
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
    // $('#upload_file_button').click(function(){

        // let len = window.selectedFile.length;

        // for(i=0;i<=len-1;i++){
        //     uploadFile(window.selectedFile[i]);
        // }

    // });





    $("#img").hover(function(e){
        
        e.stopPropagation();
        $(this).stop().fadeOut();
        $("#sec_img").stop().fadeIn();
    }, function(e){

        e.stopPropagation();
        $(this).stop().fadeIn();
        $("#sec_img").stop().fadeOut();

        
    });
    // guardar func

    // var formData = new FormData();
    // formData.append('file_to_upload', file);
    // var ajax = new XMLHttpRequest();
    // ajax.upload.addEventListener("progress", progressHandler, false);
    // ajax.open('POST', './php/uploader.php');
    // ajax.send(formData);
    // ajax.done(function(data){
    //     console.log(data);
    // });

    // sistema de envio de form
    
    // Upload imagens
    function uploadFile(files) {
        form = new FormData();
        form.append('file_to_upload', files);


        $.ajax({
            
            url: './php/uploader.php', // Url do lado server que vai receber o arquivo
            data: form,
            processData: false,
            contentType: false,
            dataType: 'json',   
            type: 'POST',
            async:'false',
        }).done(function(data){
            // nameFile = data[1];enviarBanco();
            response = $('#responseAjax');
            response.val(response.val() + data[1] + " ");
            response.trigger("change");
        });
    }

    // barra de progresso
    function progressHandler(event) {
        var percent = (event.loaded / event.total) * 100;
        document.getElementById("progress_bar").value = Math.round(percent);
        document.getElementById("progress_status").innerHTML = Math.round(percent) + "% Enviado ";
    }

    // aplicar campo invalido

    function aplicarCampoInvalido(el,msg){
        var valor = el.val();
        var sd = el.attr('placeholder');
        el.val('');
        el.css('border', '0px solid red');
        el.animate({'borderWidth': '3px'});
        if(valor == ""){
            el.attr("placeholder", "Preencha Este Campo");
        } else if(msg){
            el.attr("placeholder", msg);
        } else{
            el.attr("placeholder", "Campo Inválido");
        }
        
        //scroll top
        window.scrollTo(0,100);

        setTimeout(function(){
            el.animate({'borderWidth': '0px'});
        },1000);
        setTimeout(function(){
            el.css('border', '1px solid #ccc',2000);
            el.attr("placeholder", sd);
        },1500);
        

        return false;
    }

    $('#form_cad_item').submit(function(e){
        e.preventDefault();
        //form variables 
        let nomes = $('input[id=nome]');
        let categorias = $('input[id=categoria]');
        let basePrices = $('input[name=basePrice]');
        let estoques = $('input[name=estoque]');
        let promVals = $('input[name=prom_val]');
        let tempTrat;


        // tratando a promoção se houver
        if(!promVals.val()== ""){
            tempTrat = promVals.val();
            tempTrat = ripToSend(tempTrat);
            promVals.val(tempTrat)
        }

        //veririficar se ta vazio

        if(nomes.val() == ""){
            aplicarCampoInvalido($('input[name=nome]'));
            return 0;
        }if(categorias.val() == ""){
            aplicarCampoInvalido($('input[id=categoria]'));
            return 0;
        }if(basePrices.val() == ""){
            aplicarCampoInvalido($('input[name=basePrice]'));
            return 0;
        }else{
            //Tratando o preço base
            tempTrat = basePrices.val();
            tempTrat = ripToSend(tempTrat);
            basePrices.val(tempTrat);
                // promval
            promval = $('#prom_val');
            tempProm = promval.val();
            tempProm = ripToSend(tempProm);
            promval.val(tempProm);
        }
        
        if(estoques.val() == ""){
            aplicarCampoInvalido($('input[name=estoque]'));
            return 0;
        }




        if(!nomes == "" && !categorias == "" && !basePrices == "" && !estoques == ""){



            var files =  window.selectedFile;
            var len = files.length;

            if(!len){
                alert("Sem Imagens Selecionadas!");
                return 0;
            }
    
            // Tratar dados para o banco
            // basePrice = basePrice.replace(",",".");
            // if(!promVal == ""){
            //     promVal = promVal.replace(",",".");
            // }

            
            for(i=0;i<len;i++){
                uploadFile(files[i]);
            }

        }
        return false
    });

    function enviarBanco(){
        var span = $('.tag span');
        var tam = span.length;
        var tags = Array();
        var names = Array(); 
        let basePrices = $('input[name=basePrice]');
        let promVals = $('input[name=prom_val]');
        form = $("#form_cad_item")
        dados = form.serialize();
        names = $('#responseAjax').val();
        // console.log(names);
    
        
        for(i=0;i<tam;i++){
            let val = span[i].textContent;
            val = val.replace(" ","");
            val = val.replace(" ","");
            tags.push(val);

        }
        dados = dados + "&tags="+tags;

        dados = dados + "&image_names="+names;


        // console.log(dados);
        $.ajax({
            url:'./php/cad_item.php',
            method: 'post',
            dataType:'json',
            data: dados
            
        }).done(function(data){

            $('#responseAjax').val("");

            if(data.sucesso){

                //scroll top
                window.scrollTo(0,0);
                alert("Enviado e Cadastrado!");
                
                $('#descricaoGeral').val("");
                $('#especificacoes').val("");
                $('.tag-container').empty();
                $('#file_name').text("arquivos: ");
                $('input').val("");
                $('#par-div').val("1");
                $('#prom_val').prop('disabled',true);
                $("#aply_prom").prop("checked", false);
                $('input[type=submit]').val("Mandar para o Servidor") 
                $('.discount').text("");
                $('.discount').css("display","none");
                $('.price-before').css("display","none");
                $('.product-name').text("Nome Exemplo");
                $('.price-off').text("R$ 00,00");
                $('#divisions-par').text("Ou até ");
                $('#img').attr('src',"../images/example.png");
                $('#sec_img').attr('src',"../images/example_2.png");
            }else{
                alert('Formulario não sucedido');
            }
        });

        basePrices.val(basePrices.val()+",00");
        promVals.val(promVals.val()+",00");
    };

    $("#responseAjax").change(function(){
        globalThis.contadorMud;
        len = window.selectedFile.length;
        console.log(len);
        contadorMud += 1;
        if(contadorMud == len){
            contadorMud = 0;
            enviarBanco(); 
        }
    });

});

