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
                                Processo Seletivo Simplificado 01/2021 - SDS
                            </div>
                            <div class="w-25 tituloMobile logo ">
                                <img class="logo" src="{{asset('assets/img/logo_governo.png')}}" alt="">
                            </div>
                            
                        </nav>
                    </div>
                </div>
            </div>
            
           
            <div class="container-fluid col-lg-8 col-md-8 col-sm-12 float-none">

          
                <form action="{{ route('realizarInscricao') }}" method="post" enctype="multipart/form-data" id="formInscricao">
                    @csrf

                    
                    

                    <div class="border mt-5" id="formulario" >
                        
                
                        <div class="card-header">
                            <h4 class="title-text text-center">Formulário de inscrição</h4>
                        </div>
                
                        <h5 class="col-12 title-subtitle text-center">Arquivos com * no final são obrigatórios</h5>
                        <div class="col-11 mx-auto">
                           

                              <!-- File item template -->
                          
                              @if( @isset($errors) && count($errors) > 0)
                              <div class="alert alert-danger">
                              @foreach( $errors->all() as $error)
                              <p>{{$error}}</p>
                              @endforeach
                              </div>
                              @endif 
                      
                        
                         {{--- Formulario Nome ---}}
            
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome: *</label>
                            <div class="input-group">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required
                            value="{{ old('nome') }}">
                            </div>
                        </div>
 
                        {{--- Formulario Email ---}}
            
                        <div class="form-group">
                            <label for="email" class="control-label">Email: *</label>
                            <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo" required
                            value="{{ old('email') }}">
                            </div>
                        </div>

                        {{--- Formulario Data de nascimento ---}}
            
                        <div class="form-group">
                            <label for="datadenascimento" class="control-label">Data de nascimento: *</label>
                            <div class="input-group">
                        <input type="text" class="form-control" id="datadenascimento" name="datadenascimento" placeholder="Somente números" required
                            value="{{ old('datadenascimento') }}">
                            </div>
                        </div>

                        {{--- Formulario Nome da mãe ---}}
            
                        <div class="form-group">
                            <label for="nomemae" class="control-label">Nome da mãe: *</label>
                            <div class="input-group">
                        <input type="text" class="form-control" id="nomemae" name="nomemae" placeholder="Nome da mãe completo" required
                            value="{{ old('nomemae') }}">
                            </div>
                        </div>

                        {{--- Formulario CPF---}}

                        <div class="form-group">
                            <label for="cpf" class="control-label">CPF: *</label>
                            <div class="input-group">
                        <input type="text" class="form-control" name="cpf"  placeholder="Somente números" id="cpf" value="{{old('cpf')}}" required>
                            </div>
                        </div>

                        {{--- Formulario Identidade ---}}

                        <div class="form-group">
                            <label for="identidade" class="control-label">Documento de identificação: *</label>
                            <div class="input-group">
                        <input type="text" class="form-control" id="identidade" name="identidade" placeholder="Documento de identificação" required
                            value="{{ old('identidade') }}">
                            </div>
                        </div>

                        {{--- Formulario Endereço ---}}

                        <div class="form-group">
                            <label for="endereco" class="control-label">Endereço: *</label>
                            <div class="input-group">
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço completo" required
                                value="{{ old('endereco') }}">
                            </div>
                        </div>

                        {{--- Formulario Número ---}}

                        <div class="form-group">
                            <label for="numero" class="control-label">Número: *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número da residência" required
                                    value="{{ old('numero') }}">
                            </div>
                        </div>

                        {{--- Formulario Cidade ---}}

                        <div class="form-group">
                            <label for="cidade" class="control-label">Cidade: *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required
                                    value="{{ old('cidade') }}">
                            </div>
                        </div>

                        {{--- Formulario Estado ---}}

                        <div class="form-group">
                            <label for="estado" class="control-label">Estado: *</label>
                            <div class="input-group">
                                <select style="height: 34px;" name="estado" id="estado" class="form-control"  required>
                                    <option value="">Selecione seu estado</option>
                                    <option value="AC" @if (old('estado') == "AC") {{ 'selected' }} @endif>AC</option>
                                    <option value="AL" @if (old('estado') == "AL") {{ 'selected' }} @endif>AL</option>
                                    <option value="AP" @if (old('estado') == "AP") {{ 'selected' }} @endif>AP</option>
                                    <option value="AM" @if (old('estado') == "AM") {{ 'selected' }} @endif>AM</option>
                                    <option value="BA" @if (old('estado') == "BA") {{ 'selected' }} @endif>BA</option>
                                    <option value="CE" @if (old('estado') == "CE") {{ 'selected' }} @endif>CE</option>
                                    <option value="DF" @if (old('estado') == "DF") {{ 'selected' }} @endif>DF</option>
                                    <option value="ES" @if (old('estado') == "ES") {{ 'selected' }} @endif>ES</option>
                                    <option value="GO" @if (old('estado') == "GO") {{ 'selected' }} @endif>GO</option>
                                    <option value="MA" @if (old('estado') == "MA") {{ 'selected' }} @endif>MA</option>
                                    <option value="MT" @if (old('estado') == "MT") {{ 'selected' }} @endif>MT</option>
                                    <option value="MS" @if (old('estado') == "MS") {{ 'selected' }} @endif>MS</option>
                                    <option value="MG" @if (old('estado') == "MG") {{ 'selected' }} @endif>MG</option>
                                    <option value="PA" @if (old('estado') == "PA") {{ 'selected' }} @endif>PA</option>
                                    <option value="PB" @if (old('estado') == "PB") {{ 'selected' }} @endif>PB</option>
                                    <option value="PR" @if (old('estado') == "PR") {{ 'selected' }} @endif>PR</option>
                                    <option value="PE" @if (old('estado') == "PE") {{ 'selected' }} @endif>PE</option>
                                    <option value="PI" @if (old('estado') == "PI") {{ 'selected' }} @endif>PI</option>
                                    <option value="RJ" @if (old('estado') == "RJ") {{ 'selected' }} @endif>RJ</option>
                                    <option value="RN" @if (old('estado') == "RN") {{ 'selected' }} @endif>RN</option>
                                    <option value="RS" @if (old('estado') == "RS") {{ 'selected' }} @endif>RS</option>
                                    <option value="RO" @if (old('estado') == "RO") {{ 'selected' }} @endif>RO</option>
                                    <option value="RR" @if (old('estado') == "RR") {{ 'selected' }} @endif>RR</option>
                                    <option value="SC" @if (old('estado') == "SC") {{ 'selected' }} @endif>SC</option>
                                    <option value="SP" @if (old('estado') == "SP") {{ 'selected' }} @endif>SP</option>
                                    <option value="SE" @if (old('estado') == "SE") {{ 'selected' }} @endif>SE</option>
                                    <option value="TO" @if (old('estado') == "TO") {{ 'selected' }} @endif>TO</option> 
                                </select>
                            </div>
                        </div>


                        {{--- Formulario Cep ---}}

                        <div class="form-group">
                            <label for="cep" class="control-label">Cep: *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep" required
                                    value="{{ old('cep') }}">
                            </div>
                        </div>

                        {{--- Formulario Opção ---}}

                        <div class="form-group">
                            <label for="opcao" class="control-label">Declaro que tenho domínio do uso de recursos básicos de informática para o desenvolvimento das atividades inerentes à função de entrevistador social. *</label>
                            <div class="input-group"  value="{{ old('opcao') }}">
                                <input type="radio" id="sim" name="opcao" value="sim" {{ old('opcao')=="sim" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                <label for="sim">Sim</label><br>
                                <input type="radio" id="nao" name="opcao" value="nao" {{ old('opcao')=="nao" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                <label for="nao">Não</label><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" style="font-size:18px; color: rgb(245, 11, 11);">Todos os arquivos devem ser enviados no formato PDF.</label>
                            
                        </div>


                        {{--- Formulario Escolaridade ---}}
                        <div class="form-group">
                            <label for="escolaridade" class="control-label">Comprovante de Escolaridade *</label>
                            <div class="input-group">
                                <input type="file" id="escolaridade" name="escolaridade" required value="{{ old('escolaridade') }}">
                            </div>
                        </div>

                        {{--- Formulario Arquivo 2 ---}}
                        <div class="form-group">
                            <label for="curriculo" class="control-label">Currículo *</label>
                            <div class="input-group">
                                <input type="file" id="curriculo" name="curriculo" required>
                            </div>
                        </div>

                        {{--- Formulario Atestado ---}}
                        <div class="form-group">
                            <label for="atestado" class="control-label">Atestado de Bons Antecedentes *</label>
                            <div class="input-group">
                                <input type="file" id="atestado" name="atestado" required value="{{ old('atestado') }}">
                            </div>
                        </div>

                        {{--- Formulario Alvará ---}}
                        <div class="form-group">
                            <label for="alvara" class="control-label">Alvará de Folha Corrida</label>
                            <div class="input-group">
                                <input type="file" id="alvara" name="alvara" value="{{ old('alvara') }}">
                            </div>
                        </div>

                        {{--- Formulario Arquivo 3 ---}}
                        <div class="form-group">
                            <label for="cursos" class="control-label">Certificados de Cursos e Capacitações</label>
                            <div class="input-group">
                                <input type="file" id="cursos" name="cursos[]" multiple>

                            </div>
                        </div>

                        {{--- Formulario Arquivo 4 ---}}
                        <div class="form-group">
                            <label for="experencia" class="control-label">Comprovantes de Experiência Profissional</label>
                            <div class="input-group">
                                <input type="file" id="experiencia" name="experiencia[]" multiple>
                            </div>
                        </div>

           
                        </div>  

                        <div class="card-footer">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                </form>
                
          
                </div>   
            
         
        </div>

        @include('sweetalert::alert')


  

    </body>
</html>
    