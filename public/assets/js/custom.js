$(document).ready(function(){

    var planoMensal = ['1x de R$ 548,90'];

    var planoAnual = [
        '1x de R$ 838,32',
        '2x de R$ 419,16',
        '3x de R$ 279,44',
        '4x de R$ 209,58',
        '5x de R$ 167,66',
        '6x de R$ 139,72',
        '7x de R$ 119,76',
        '8x de R$ 108,79',
        '9x de R$ 93,15',
        '10x de R$ 83,83'
    ];

    var valorParcelas = '';

    

    $('#card-1').click(function(){

        $("#valorParcelas option").remove();

        $('#card-1').addClass('active')
        $('#card-2').removeClass('active')
        $('#planoId').val('1')
        parcelamento(planoMensal);


    });
    $('#card-2').click(function(){

        $("#valorParcelas option").remove();

        $('#card-2').addClass('active')
        $('#card-1').removeClass('active')
        $('#planoId').val('2')
        parcelamento(planoAnual);
        

    });

    function parcelamento(plano){

        for (let i = 0; i < plano.length; i++) {
            valorParcelas += '<option value = "'+ plano[i] + '">' + plano[i] + ' no cartão sem juros </option>';
        }
        $("#valorParcelas").html(valorParcelas);
        valorParcelas = [];
    }

    if($("#planoId").val() == 2){
        parcelamento(planoAnual);
    }
    
    // Validacoes

        function validaCpf(cpf){

        cpfLimpo = cpf.replace(/[^\d]+/g,'')
        var soma;
        var resto;
        soma = 0;

        if (cpfLimpo == "00000000000") return false;
            
        for (i=1; i<=9; i++) soma = soma + parseInt(cpfLimpo.substring(i-1, i)) * (11 - i);
        resto = (soma * 10) % 11;
        
            if ((resto == 10) || (resto == 11))  resto = 0;
            if (resto != parseInt(cpfLimpo.substring(9, 10)) ) return false;
        
        soma = 0;
            for (i = 1; i <= 10; i++) soma = soma + parseInt(cpfLimpo.substring(i-1, i)) * (12 - i);
            resto = (soma * 10) % 11;
        
            if ((resto == 10) || (resto == 11))  resto = 0;
            if (resto != parseInt(cpfLimpo.substring(10, 11) ) ) return false;
            return true;
    }



    $('#nome').keyup(function(){
        if($('#nome').val().length < 8 ){
            $("#nome").addClass('error')
            $("#nome").removeClass('sucesso')
        }else{
            $("#nome").removeClass('error')
            $("#nome").addClass('sucesso')
        }
    });

    $('#cpf').keyup(function(){
        if (validaCpf($('#cpf').val())) {
            $("#cpf").removeClass('error')
            $("#cpf").addClass('sucesso') 
        }else{
            $("#cpf").addClass('error')
            $("#cpf").removeClass('sucesso')
        }
    });

    $('#telefone').keyup(function(){
        if ($("#telefone").val().length < 15 ) {
            $("#telefone").addClass('error')
            $("#telefone").removeClass('sucesso')
            
        }else{
            $("#telefone").removeClass('error')
            $("#telefone").addClass('sucesso') 
        }
    });

})