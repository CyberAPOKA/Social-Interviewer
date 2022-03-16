
<!DOCTYPE html> 
<html>  
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{asset('brasao.ico')}}">
    
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin="" />
            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('/css/estiloPainel.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">

jQuery(document).ready(function(){
                // jQuery('#cpf').mask("999.999.999-99");
                // jQuery('#datadenascimento').mask("99/99/9999");
            });
    </script>

          
    </head>

     <body id="page-top">
        
	
          
        <div class="container-fluid">
            <!-- Page Wrapper -->
            <div id="wrapper">
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="container-fluid">
                        <nav class="navbar navbar-expand navbar-light topbar static-top shadow navMobile" >
                            <div class="w-25 tituloMobile ">
                                <a href="/"><img class="brasao" src="{{asset('assets/img/logoPMSL.png')}}" alt=""></a>
                            </div>
        
                            <div class="w-50 header tituloMobile" style="color: rgb(20, 104, 231);">
                                INSCRIÇÕES
                            </div>
                            <div class="w-25 tituloMobile logo ">
                                <img class="logo" src="{{asset('assets/img/logo_governo.png')}}" alt="">
                            </div>
                            
                        </nav>
                    </div>
                </div>
            </div>
            
           
            <div class="container-fluid col-lg-8 col-md-8 col-sm-12 float-none">

          
                <form action="#" method="post">
                    @csrf

                    
                    

                    <div class="border mt-5" id="formulario" >
                        
                
                        <div class="card-header">
                            <h4 class="title-text text-center">Inscrições de entrevistadores sociais</h4>
                        </div>
                        <h5 class="col-12 title-subtitle text-center">Insira seus dados abaixo para se inscrever</h5>
                        <div class="col-11 mx-auto">
                           
                                    
            
                        
                



{{--- Formulario Arquivo 1---}}
<div class="form-group">
    <label for="comprovante" class="control-label">Comprovante de conclusão do Ensino Médio (cópia digitalizada) *</label>
    <div class="input-group">
        <input type="file" id="comprovante" name="comprovante" required>
    </div>
</div>

{{--- Formulario Arquivo 2---}}
<div class="form-group">
    <label for="curriculo" class="control-label">Currículo (word ou PDF) *</label>
    <div class="input-group">
        <input type="file" id="curriculo" name="curriculo" required>
    </div>
</div>

{{--- Formulario Arquivo 3---}}
<div class="form-group">
    <label for="certificado" class="control-label">Certificados de conclusão de cursos de capacitação *</label>
    <div class="input-group">
        <input type="file" id="certificado" name="certificado" required>
    </div>
</div>

{{--- Formulario Arquivo 4---}}
<div class="form-group">
    <label for="comprovacao" class="control-label">Comprovação de experiência; (cópias de páginas da Carteira de Trabalho, cópia de contratos de trabalho) *</label>
    <div class="input-group">
        <input type="file" id="comprovacao" name="comprovacao" required>
    </div>
</div>




                            <div class="card-footer">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Enviar</button></div>


                                
                           
                </form>
                
            </div>

            
            <div align="center">
                <div class="text-center rodape" style="padding-top: 100px;">
                   
        </div>
        </div>
        </div>

        @include('sweetalert::alert')


    </body>
</html>
    