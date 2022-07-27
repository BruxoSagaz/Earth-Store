$(document).ready(function () {
    
    $('input[name="cpf"]').mask('000.000.000-00');
    $('input[name="celular"]').mask('(00)00000-0000');
    $('input[name="nascimento"]').mask('00/00/0000');



    $('.opt-adm').click(function(){
        valor = $(this).attr('valor');
        if(valor=='adm-display'){
            pegarDadosAdm();
        }else if(valor == 'buy-display'){
            pegarDadosCompras()
        }
        texto = $(this).text();
        selector = '.'+valor;
        $('.optadm-cont').fadeOut(function(){
            $(selector).fadeIn();
        });
        // h2 de titulo
        $('.metallica h2').text(texto+':');


    })

    $('.hide .fa-arrow-left').click(function(){
        $('.metallica h2').text('Escolha A Atividade:');
        $(this).parent().parent().fadeOut(function(){
            $('.optadm-cont').fadeIn();
        })
    })


    $(".cad-adm-form").submit(function(e){
        e.preventDefault();
        nome = $('#nome-cad');
        cpf = $('#cpf-cad');
        data = $('#nascimento-cad');
        cell = $('#celular-cad');
        senha = $('#senha-cad');
        if(verificarNome(nome.val()) == false){
            aplicarCampoInvalido(nome)
        }
        if(verificarCPF(cpf.val()) == false){
            aplicarCampoInvalido(cpf)
        }
        if(verificarData(data.val())== false){
            aplicarCampoInvalido(data)
        }
        if(verificarCell(cell.val()) == false){
            aplicarCampoInvalido(cell);
        }
        if(verificarSenha(senha) == false){
            aplicarCampoInvalido(senha,'Senha Fraca!');
        }

        if(verificarNome(nome.val()) != false 
        && verificarCPF(cpf.val()) != false
        && verificarData(data.val()) != false
        && verificarCell(cell.val()) != false
        && verificarSenha(senha) != false){

            info = $('.cad-adm-form').serialize();

            $.ajax({
                method:"post",
                url: "./ajax/cad-adm.php",
                data: info,
                dataType: "json",
                success: function (response) {
                    alert("cadastrado com sucesso!")
                    $('input[type="text"]').val('');
                    $('#nivel-cad').val('1');

                },
                error: function(){
                    console.log('Falha ao cadastrar!')
                }
            });

        }

    })
   
    $('.lista-adm').on( "click",'td i.fa-info', function(e) {
        e.preventDefault();
        e.stopPropagation();
        id = $(this).attr('id');

        $.ajax({
            method:"post",
            url: "./ajax/get-adm.php",
            data: {'id':id},
            dataType: "json",
            success: function (response) {
                console.log(response)
                addAdmInfo(response);
            },
            error: function(){
                console.log('Falha ao encontrar adm!')
            }
        });
        
        modalShow($('#form-modal-adm'));
    })

    $('.edit-adm-button').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        id = $(this).attr('valor');
        info = $('.atend-form').serialize();
        info += "&id="+id;
        $.ajax({
            method:"post",
            url: "./ajax/edit-adm.php",
            data: info,
            dataType: "json",
            success: function (response) {
                console.log(response)
                alert('Administrador Alterado, Saindo...');
                pegarDadosAdm();
                $('.atend-form input[type="text"]').val();
                modalHide()
            },
            error: function(){
                console.log('Falha ao encontrar adm!')
            }
        });
    })

    $('i.fa-arrow-rotate-right').click(function (){
        selector = $(this).attr('value');

        switch (selector) {
            case 'adm-display':
                pegarDadosAdm();
                break
            case 'buy-display':
                pegarDadosCompras()
                break;
        
            default:
                break;
        }
    });


    //evitar bugs
    $('.form-modal').click(function(e){
        e.stopPropagation();
    });

    //sair da modal
    $('.close-btn').click(function(){
        modalHide()
    });

    //sair da modal
    $('body').click(function(){
        modalHide()
    });




    // FUNCTIONS
    function modalShow(modal){
        
        $('.form-modal').fadeOut()
        modal.fadeIn(function (){
            $('.modal-bg').fadeIn()
        })
    }

    function modalHide(){
        $('.form-modal').fadeOut()
        $('.modal-bg').fadeOut()
    }

    function addAdmInfo(info){


        $('#nome-edit').val(info[0]['nome_admin']);;
        $('#login-edit').val(info[0]['login_admin']);
        $('#senha-edit').val(info[0]['senha_admin']);
        $('#nome-edit').val(info[0]['nome_admin']);
        $('#cpf-edit').val(info[0]['cpf']);
        $('#nivel-edit').val(info[0]['nivel']);
        $('#nascimento-edit').val(info[0]['nascimento']);
        $('#celular-edit').val(info[0]['celular']);

        $('.ped-fim').text(info[1]);
        $('.ped-esp').text(info[2]);
        $('.att-fim').text(info[3]);
        $('.att-esp').text(info[4]);
        $('.edit-adm-button').attr('valor',info[0]['admin_id'])
    }


    function pegarDadosAdm(){
        elem = $('#adm-load-info');

        elem.fadeOut(100,function(){
            elem.fadeIn(100,function(){
                elem.load('./ajax/load-adm-data.php .adm')
            })
        })

       
    }

    function pegarDadosCompras(){
        elem = $('#buy-load-info');

        elem.fadeOut(100,function(){
            elem.fadeIn(100,function(){
                elem.load('./ajax/load-activities.php .buy')
            })
        })
    }
// FIM
});



