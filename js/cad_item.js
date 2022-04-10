$(document).ready(function(){

    // Common variables
    var aply = $('#aply_prom');
    var tags = [];
    
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
        }else{
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

    // Start File Upload System

    const fileUploader = document.getElementById('file-uploader');

    fileUploader.addEventListener('change', (event) => {
        const files = event.target.files;
        for (const file of files) {
            const name = file.name;
            const type = file.type ? file.type: 'NA';
            const size = file.size;
            const lastModified = file.lastModified;
            console.log({ file, name, type, size, lastModified });
         }
    });

    // Item Creation

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
    });

    function applyDivisions(){
        let value = $("#par-div").val();
        let divisions = $('#divisions-par');
        let price = $('.price-off').text();
        let calcDiv = parseInt(value);

        if (value != 1){
            price = price.split('R$ ');
            price = price[1];
            price = price.replace(".","");
            price = price.replace(",",".");
            price = parseFloat(price);
            price = price / calcDiv;
            price = price.toString();
            price = price.split(".");
            price[1] = price[1]+"00";
            price[1] = price[1].substr(1,2);
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

    $('#par-div').change(function(){
        applyDivisions();
    });
});