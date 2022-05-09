$(document).ready(function(){
    // Funções para tela de gerência
    // janela modal
    var aply = $('#aply_prom');
    var promVal = $('#prom_val');
    var tagContainer =$(".tag-container");
    var imgBreaker = $('.img-breaker');
    var antigasInfo = Array();
    var fileInput = $('#file_to_upload');
    var fileNames = $('#file_name');
    var descModal = $('#description_modal');
    var specModal = $('#spec_modal');
    var descText = $('#descricaoGeral');
    var specText = $('#especificacoes')
    var modalShadow = $('.modal-shadow');
    var modal = $('.modal-bg');

    function sairMordal(){
        modal.fadeOut();
        tagContainer.empty();
        imgBreaker.empty();
        fileInput.val("");
        fileNames.text("arquivos: ");
    }

    //sair da modal
    $('.close-btn').click(function(){
        sairMordal();
    });

    //sair da modal
    $('body').click(function(){
        if(descModal.attr('ative') == 0 && specModal.attr('ative') == 0 ){
            sairMordal();
        }
    });
    //evitar bugs
    $('.form-modal').click(function(e){
        e.stopPropagation();
    });
    //limpar imagens
    $('#clear_imgs').click(function(e){
        e.preventDefault();
        fileInput.val("");
        fileNames.text("arquivos: ");
        imgBreaker.empty();
    });

    //aparecer modal de descrição
    $('#description_button').click(function(e){
        e.preventDefault();
        descModal.fadeIn();
        descModal.attr({"ative":"1"});
        modalShadow.fadeIn();
        $('.form-modal').css("border","2px solid #858585");
    });

    //aparecer modal especificações
    $('#espec_button').click(function(e){
        e.preventDefault();
        specModal.fadeIn();
        specModal.attr({"ative":"1"});
        modalShadow.fadeIn();
        $('.form-modal').css("border","2px solid #858585");
    })

    // Sair modal interno
    $('.exit_modal_input').click(function(e){
        e.preventDefault();
        descModal.fadeOut();
        descModal.attr({"ative":"0"});
        specModal.fadeOut();
        specModal.attr({"ative":"0"});
        modalShadow.fadeOut();
        $('.form-modal').css("border","2px solid #ccc");
    });

    $('.fa-pen').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var id_tag = $(this).parent().siblings('.id');
        //SALVANDO ID PARA TODO O COD
        var id = id_tag.text();

        $.ajax({
            method: 'post',
            url: './php/select_edit.php',
            data: {'id':id},
            dataType:'json'

        }).done(function(data){
            //Ativando o global das informações
            antigasInfo = data;
            console.log(data);
            actualizeModal(data);

            modal.fadeIn();

        });

    

        //modal.fadeIn();
    });

    function ripValues(value){
        value = value.split(',');
        value = value[0];
        value = value.split('.');
        let lenForItem = value.length;
        value = value.toString();
        for(let i = 0;i<lenForItem;i++){
            value = value.replace(',','');
        }
        return value;
    }

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
            aply.val("on")
            promVal.removeAttr("disabled");
            promVal.css('background','white')
        }else{
            aply.val("off");
            promVal.attr("disabled");
            promVal.val("");
            promVal.css('background','#b5b5b5');
        }
    });

    function actualizeModal(obj){
        $('#nome').val(obj['nome']);
        $('input[name=categoria]').val(obj['categoria']);
        $('#base-price').val(obj['preco']+",00");
        if(obj['promocao'] == 1){
            aply.prop('checked', true);
            aply.val("on");
            promVal.val(obj['valor_em_promocao']+",00").removeAttr("disabled").css('background','white');
        }else{
            aply.val("off");
        }
        $('par-div').val(obj['parcelas']);
        $('input[name=estoque]').val(obj['estoque']);

        tags =  obj['tags'].split(',');


        tags.forEach(element => {
            var div = createTag(element);
            $(div).appendTo(".tag-container");  
        });

        descText.val(obj['descricao_geral']);
        specText.val(obj['especificacoes']);

        var closes = $('.close');
        closes.on('click',function(e){
            // e.stopPropagation();
            // e.preventDefault();
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



        //console.log(images);
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

    function actualImageSelected(name){
        const li = document.createElement('li');
        const img = document.createElement('img');
        img.setAttribute('src',`${name}`);
        img.setAttribute('alt','image');
        li.appendChild(img);

        return li;
    }
    // Trash can

    $('.fa-trash-can').on('click',function(e){
        $(this).parent().parent().fadeOut();
    });

    // File Upload

    
    fileInput.change(function(e){
        fileNames.text("arquivos: ");
        $('.img-breaker').empty();
        window.selectedFile = e.target.files;
        files = e.target.files;
        // console.log(e.target.files);
        let len = window.selectedFile.length;

      
        for(i = 0; i<=len-1;i++){
            // console.log(window.selectedFile[i].name);
            if(i==len-1){
                fileNames.append(` ${window.selectedFile[i].name} `);
            }else{
                fileNames.append(` ${window.selectedFile[i].name} +`);
            }

            image = actualImageSelected(URL.createObjectURL(files[i]));
            $(image).appendTo('.img-breaker');
        }
    
    });

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
            // nameFile = data[1];
            $('#responseAjax').append(data[1]+" ");
        });
    }

    // barra de progresso
    function progressHandler(event) {
        var percent = (event.loaded / event.total) * 100;
        document.getElementById("progress_bar").value = Math.round(percent);
        document.getElementById("progress_status").innerHTML = Math.round(percent) + "% Enviado ";
    }
    



    function aplicarCampoInvalido(el,msg){
        var valor = el.val();
        var sd = el.attr('placeholder')
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
        window.scrollTo(0,0);

        setTimeout(function(){
            el.animate({'borderWidth': '0px'});
        },1000);
        setTimeout(function(){
            el.css('border', '1px solid #ccc',2000);
            el.attr("placeholder", sd);
        },1500);
        

        return false;
    }


    //SUBMIT

    $('#form_edit_item').submit(function(e){
        e.preventDefault();

        console.log(antigasInfo);

        //form variables 
        let nomes = $('input[name=nome]');
        let categorias = $('input[name=categoria]');
        let basePrices = $('input[name=basePrice]');
        let estoques = $('input[name=estoque]');
        let promVals = $('input[name=prom_val]');
        let tempTrat
        // varificar se esta vazio e tratar para o banco

        // tratando a promoção se houver
        if(!promVals.val()== ""){
            tempTrat = promVals.val();
            tempTrat = ripValues(tempTrat);
            promVals.val(tempTrat)
        }

        if(nomes.val() == ""){
            aplicarCampoInvalido($('input[name=nome]'));
            return 0;
        }if(categorias.val() == ""){
            aplicarCampoInvalido($('input[name=categoria]'));
            return 0;
        }if(basePrices.val() == ""){
            aplicarCampoInvalido($('input[name=basePrice]'));
            return 0;
        }else{
            //Tratando o preço base
            tempTrat = basePrices.val();
            tempTrat = ripValues(tempTrat);
            basePrices.val(tempTrat)
        }

        if(estoques.val() == ""){
            aplicarCampoInvalido($('input[name=estoque]'));
            return 0;
        }
        


        if(!nomes == "" && !categorias == "" && !basePrices == "" && !estoques == ""){


            var files =  window.selectedFile;
            let form = $(this);
            let dados = form.serialize();
            let span = $('.tag span');
            let tam = span.length;
            let tags = Array();
            let names = Array(); 
            

            try{
                var len
                if(len = files.length){
                    for(let i=0;i<len;i++){
                        uploadFile(files[i]);
                    }
                    setTimeout(function(){
                    names = $('#responseAjax').text();
                    console.log(names);
                

                    dados = dados + "&image_names="+names;
                    },100);
                }else{
                    dados = dados + "&image_names="+antigasInfo['imagens'];
                }  
            }catch{
                console.log("Sem Imagens Selecionadas!");
                dados = dados + "&image_names="+antigasInfo['imagens'];
            }

            setTimeout(function(){

                for(i=0;i<tam;i++){
                    let val = span[i].textContent;
                    val = val.split(':');

                    for(let i = 0;i<val.length;i++){
                        val[i] = val[i].trim();
                    }
                    val = val.toString();
                    val = val.replace(",",":");
                    val = val.trim();
                    tags.push(val);
                }
                let tagsquant = tags.length
                tags = tags.toString();

                for(i=0;i<tagsquant;i++){
                    tags.replace(","," ");''
                }

                dados = dados + "&tags="+tags;
                dados = dados + "&id="+antigasInfo['id'];


                dados = dados.split("&");
                tamDados = dados.length;
                // Area onde dados estão em array

                

                console.log(dados);

                for(let i = 0;i<tamDados;i++){
                    temp = dados[i].split("=");
                    if(temp[1] == '' && antigasInfo[temp[0]]){
                        temp[1] = antigasInfo[temp[0]];
                    }

                    temp = temp.toString();
                    temp = temp.replace(",","=");
                    dados[i] = temp;


                }


                dados = dados.toString();

                for(let i = 0;i<=tamDados;i++){
                    dados = dados.replace(",","&");
                }
                // console.log(dados);
                

                $.ajax({
                    url:'./php/edit_item.php',
                    method: 'post',
                    dataType:'json',
                    data: dados
                    
                }).done(function(data){

                    $('#responseAjax').empty();
                    if(data.sucesso){
                        alert("ATUALIZADO!");
                    }
                });

            },150);
            basePrices.val(basePrices.val()+",00");
            promVals.val(promVals.val()+",00");
        }
    })

    $('#base-price').mask('000.000.000.000.000,00', {reverse: true});
    $('#prom_val').mask('000.000.000.000.000,00', {reverse: true});
});

