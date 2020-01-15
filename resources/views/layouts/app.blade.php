<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900&display=swap" rel="stylesheet">


    <!-- CSS Custom-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/0a7efae0ad.js" crossorigin="anonymous"></script>

  
  
    <title>Uli | Pagamentos</title>
  </head>
  <body>
    <div class="pagamento mt-2 mb-5">
        @yield('pagamento')
    </div>

    <!-- JavaScript (Opcional) -->
    
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    @push('scripts')
      <script src="{{ asset('assets/js/mascaras.js') }}"></script>
      <script>
        /* Máscaras Telefone */
        function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function mtel(v){
            v=v.replace(/\D/g,"");             
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
            v=v.replace(/(\d)(\d{4})$/,"$1-$2");   
            return v;
        }
      </script>
    @endpush
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @stack('scripts')
  </body>
</html>
