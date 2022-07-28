$(document).ready(function () {
    var data = {};
    $('#ceps').mask('00000-000');

    $("#estado").change(function () {				
        console.log('oi')
        var options_cidades = '';
        var str = "";					
        
        $("#estado option:selected").each(function () {
            str += $(this).text();
        });
        
        $.each(data, function (key, val) {
            if(val.nome == str) {							
                $.each(val.cidades, function (key_city, val_city) {
                    options_cidades += '<option valor="' + val_city + '">' + val_city + '</option>';
                });							
            }
        });
 
        
        $("#cidade").html(options_cidades);
        
    });

    $.getJSON(config.path+'/json/estados_cidades.json', function (datas) {
        data = datas
        var items = [];
        var options = '<option valor="">escolha um estado</option>';
        originEstado = $("#estado").html();	
        var originCidade =  $("#cidade").html();
      
        $.each(data, function (key, val) {
            options += '<option valor="' + val.sigla + '">' + val.nome + '</option>';
        });	
        originEstado += options;
        // console.log($("#estado"))				
        $("#estado").html(originEstado);				
        
        
        $('#estado').trigger('change');

    
    });

        // preencher dados por cep
        $('#ceps').change(function(){
            var cep = $(this).val();
            if(cep.length == 9){
                cep = {"cep":cep};
                $.ajax({
                    method:"post",
                    url: config.path+"/ajax/cep-consult.php",
                    data: cep,
                    dataType: "json",
                    error: function(){
                        console.log("Erro em cep")
                    }
                }).done(function(data2){
                $('#endereco').val(data2["street"]);
                $('#complement').val(data2["complement"]);
                $("#bairro").val(data2["district"]);
                
                selector = "#estado [valor='"+data2["uf"]+"']";
                $(selector).attr('selected', true);
                $("#estado").trigger('change');


                valor = data2['city'];
                selector = "#cidade [valor='"+valor+"']";
                $(selector).attr('selected', true);
                

                })
            }
        });
 
});