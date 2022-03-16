@extends('layouts.footer')
<!DOCTYPE html> 
<html>  
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{asset('brasao.ico')}}">
    
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin="" />
            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('/css/estiloPainel.css') }}">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
       <script src="{{ asset('/js/jquery.dm-uploader.min.js') }}">
        
        $(function(){
            var files = $("#files");
            $("#drop-area").dmUploader({
            url: '/path/to/backend/upload.asp',
            dropZone: '#dropZone',
            dataType: 'json',
            autoUpload: true
            }) .on('fileuploadadd',function (e, data){
                var fileTypeAllowed = /.\.(pdf|jpg|png|jpeg)$/i;
                console.log(data.originalFiles[0]['name']);
            }).on('fileuploadaddone',function(e, data){

            }).on('fileuploadprogressall', function(e,data){

            });
            
          });
        
       
        </script>


        <script type="text/javascript">

jQuery(document).ready(function(){
                jQuery('#cpf').mask("999.999.999-99");
                jQuery('#datadenascimento').mask("99/99/9999");
                jQuery('#cep').mask("99999-999");
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
                <div class="card-header">
                    <h4 class="title-text text-center" style="padding-top:10%; color: rgb(3, 177, 12);"> 
                    {{$message}}
                    </h4>
                </div>
                
    </body>
</html>
    