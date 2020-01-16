$(document).ready(function(){

    var planoMensal = ['1x de R$ 499,00'];

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

    function validaNome(nome){
        if(nome.length < 8){
            return false
        }
        else{
            return true
        }
    }

    function validaCpf(cpf) {

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

    function validaDataNascimento(data){
        var date=data;
        var ardt=new Array;
        var ExpReg=new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
        ardt=date.split("/");
        erro=false;
        if ( date.search(ExpReg)==-1){
            erro = true;
            }
        else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30))
            erro = true;
        else if ( ardt[1]==2) {
            if ((ardt[0]>28)&&((ardt[2]%4)!=0))
                erro = true;
            if ((ardt[0]>29)&&((ardt[2]%4)==0))
                erro = true;
        }
        if (erro) {
            return false;
        }
        return true;
    }

    function validaTelefone(telefone){
        if(telefone.length < 15){
            return false
        }
        else{
            return true
        }
    }

    function validaCartao(numero){
        return $.payment.validateCardNumber(numero)
    }

    function validaDataValidade(data){
        var data = data.split("/");
        return $.payment.validateCardExpiry(data[0],data[1])
    }

    function validaCvc(cvc){
        return $.payment.validateCardCVC(cvc);
    }

    //Form Cliente
    $('#nome').keyup(function(){

        var nome = $('#nome').val();

        if(validaNome(nome) ){
            $("#nome").removeClass('error')
            $("#nome").addClass('sucesso')
            verificaCamposSubmitCliente()
        }else{
            $("#nome").addClass('error')
            $("#nome").removeClass('sucesso')
        }
    });

    $('#cpf').keyup(function(){
        if (validaCpf($('#cpf').val())) {
            $("#cpf").removeClass('error')
            $("#cpf").addClass('sucesso') 
            verificaCamposSubmitCliente()
        }else{
            $("#cpf").addClass('error')
            $("#cpf").removeClass('sucesso')
        }
    });


    $("#dataNascimento").keyup(function(){
        var data = $("#dataNascimento").val();

        if(validaDataNascimento(data)){
            $("#dataNascimento").removeClass('error')
            $("#dataNascimento").addClass('sucesso') 
            verificaCamposSubmitCliente()
        }else{
            $("#dataNascimento").addClass('error')
            $("#dataNascimento").removeClass('sucesso')
        }
    })

    $('#telefone').keyup(function(){
        var telefone = $("#telefone").val()
        if (validaTelefone(telefone) ) {
            $("#telefone").removeClass('error')
            $("#telefone").addClass('sucesso')
            verificaCamposSubmitCliente()
        }else{ 
            $("#telefone").addClass('error')
            $("#telefone").removeClass('sucesso')
        }
    });

     //verifica campos para submit

     function verificaCamposSubmitCliente(){

        var nome = $('#nome').val()
        var data = $("#dataNascimento").val();
        var cpf = $('#cpf').val()
        var telefone = $('#telefone').val()

        if(validaNome(nome) &&  validaDataNascimento(data) && validaCpf(cpf) && validaTelefone(telefone)){
            $('#clienteSubmit').removeAttr('disabled')
        }
    }


    //form Cartao de Credito
    $('#numeroCartao').payment('formatCardNumber');
    $('#numeroCartao').keyup(function(){

        var numero = $("#numeroCartao").val()
        
        if(validaCartao(numero)){
            $("#numeroCartao").removeClass('error')
            $("#numeroCartao").addClass('sucesso') 
            verificaCamposSubmitCartao()
        }else{
            $("#numeroCartao").addClass('error')
            $("#numeroCartao").removeClass('sucesso')
        }
    })

    $('#nomeTitular').keyup(function(){

        var nome = $('#nomeTitular').val();

        if(validaNome(nome) ){
            $("#nomeTitular").removeClass('error')
            $("#nomeTitular").addClass('sucesso')
            verificaCamposSubmitCartao()
        }else{
            $("#nomeTitular").addClass('error')
            $("#nomeTitular").removeClass('sucesso')
        }
    });

    $("#validadeCartao").payment('formatCardExpiry');

    $('#validadeCartao').keyup(function(){

        var data = $("#validadeCartao").val()
        
        if(validaDataValidade(data)){
            $("#validadeCartao").removeClass('error')
            $("#validadeCartao").addClass('sucesso') 
            verificaCamposSubmitCartao()
        }else{
            $("#validadeCartao").addClass('error')
            $("#validadeCartao").removeClass('sucesso')
        }
    })

    $("#codigoSeguranca").payment('formatCardCVC');

    $('#codigoSeguranca').keyup(function(){

        var cvc = $("#codigoSeguranca").val()
        
        if(validaCvc(cvc)){
            $("#codigoSeguranca").removeClass('error')
            $("#codigoSeguranca").addClass('sucesso') 
            verificaCamposSubmitCartao()
        }else{
            $("#codigoSeguranca").addClass('error')
            $("#codigoSeguranca").removeClass('sucesso')
        }
    })


    //verifica campos para submit

    function verificaCamposSubmitCartao(){
        var numero = $("#numeroCartao").val()
        var data = $("#validadeCartao").val()
        var cvc = $("#codigoSeguranca").val()
        if(validaCartao(numero) &&  validaDataValidade(data) && validaCvc(cvc)){
            $('#cartaoSubmit').removeAttr('disabled')
        }
    }

    //Botao ok
    $('#buttonOK').click(function(){
        console.log('ok')
        window.location.href = "/pagamento/planos";
    })
})