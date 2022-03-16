@extends('cadastro')
@section('form')
    



      
    <form action="/gerenciador/candidatos/{{ $candidato->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Dados do candidato</h5>
        </div>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

          
             {{--- Formulario Nome ---}}
            
             <div class="form-group">
                <label for="nome" class="control-label">Nome: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo"
                        value="{{ old('nome',$candidato->nome) }}">
                </div>
            </div>
                    

 
    {{--- Formulario Email ---}}
            
    <div class="form-group">
        <label for="email" class="control-label">Email: *</label>
        <div class="input-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo" required
            value="{{ old('email',$candidato->email) }}">
        </div>
    </div>

                   {{--- Formulario Data de nascimento ---}}
            
                   <div class="form-group">
                    <label for="datadenascimento" class="control-label">Data de nascimento: *</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="datadenascimento" name="datadenascimento" placeholder="Somente números" required
                        value="{{ old('datadenascimento',$candidato->datadenascimento->format('d/m/Y')) }}">
                    </div>
                </div>

    

    {{--- Formulario Nome da mãe ---}}
            
    <div class="form-group">
        <label for="nomemae" class="control-label">Nome da mãe: *</label>
        <div class="input-group">
            <input type="text" class="form-control" id="nomemae" name="nomemae" placeholder="Nome da mãe completo" required
            value="{{ old('nomemae',$candidato->nomemae) }}">
        </div>
    </div>

    {{--- Formulario CPF---}}

    <div class="form-group">
        <label for="cpf" class="control-label">CPF: *</label>
        <div class="input-group">
            <input type="text" class="form-control" name="cpf"  placeholder="Somente números" id="cpf" required
             value="{{ old('cpf',$candidato->cpf) }}">
        </div>
    </div>

    {{--- Formulario Identidade ---}}

    <div class="form-group">
        <label for="identidade" class="control-label">Documento de identificação: *</label>
        <div class="input-group">
            <input type="text" class="form-control" id="identidade" name="identidade" placeholder="Documento de identificação" required
            value="{{ old('identidade',$candidato->identidade) }}">
        </div>
    </div>

    {{--- Formulario Endereço ---}}

    <div class="form-group">
        <label for="endereco" class="control-label">Endereço: *</label>
        <div class="input-group">
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço completo" required
            value="{{ old('endereco',$candidato->endereco) }}">
        </div>
    </div>

    {{--- Formulario Número ---}}

    <div class="form-group">
        <label for="numero" class="control-label">Número: *</label>
        <div class="input-group">
            <input type="text" class="form-control" id="numero" name="numero" placeholder="Número da residência" required
            value="{{ old('numero',$candidato->numero) }}">
        </div>
    </div>

    {{--- Formulario Cidade ---}}

    <div class="form-group">
        <label for="cidade" class="control-label">Cidade: *</label>
        <div class="input-group">
        
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required
            value="{{ old('cidade',$candidato->cidade) }}">
        </div>
    </div>



    {{--- Formulario Estado ---}}

    <div class="form-group">
        <label for="estado" class="control-label">Estado: *</label>
        <div class="input-group">
            

            

            <select style="height: 34px;" name="estado" id="estado" class="form-control" required>
                <option value="">Selecione seu estado</option>
                <option value="AC" @if (old('estado',$candidato->estado) == "AC") {{ 'selected' }} @endif>AC</option>
                <option value="AL" @if (old('estado',$candidato->estado) == "AL") {{ 'selected' }} @endif>AL</option>
                <option value="AP" @if (old('estado',$candidato->estado) == "AP") {{ 'selected' }} @endif>AP</option>
                <option value="AM" @if (old('estado',$candidato->estado) == "AM") {{ 'selected' }} @endif>AM</option>
                <option value="BA" @if (old('estado',$candidato->estado) == "BA") {{ 'selected' }} @endif>BA</option>
                <option value="CE" @if (old('estado',$candidato->estado) == "CE") {{ 'selected' }} @endif>CE</option>
                <option value="DF" @if (old('estado',$candidato->estado) == "DF") {{ 'selected' }} @endif>DF</option>
                <option value="ES" @if (old('estado',$candidato->estado) == "ES") {{ 'selected' }} @endif>ES</option>
                <option value="GO" @if (old('estado',$candidato->estado) == "GO") {{ 'selected' }} @endif>GO</option>
                <option value="MA" @if (old('estado',$candidato->estado) == "MA") {{ 'selected' }} @endif>MA</option>
                <option value="MT" @if (old('estado',$candidato->estado) == "MT") {{ 'selected' }} @endif>MT</option>
                <option value="MS" @if (old('estado',$candidato->estado) == "MS") {{ 'selected' }} @endif>MS</option>
                <option value="MG" @if (old('estado',$candidato->estado) == "MG") {{ 'selected' }} @endif>MG</option>
                <option value="PA" @if (old('estado',$candidato->estado) == "PA") {{ 'selected' }} @endif>PA</option>
                <option value="PB" @if (old('estado',$candidato->estado) == "PB") {{ 'selected' }} @endif>PB</option>
                <option value="PR" @if (old('estado',$candidato->estado) == "PR") {{ 'selected' }} @endif>PR</option>
                <option value="PE" @if (old('estado',$candidato->estado) == "PE") {{ 'selected' }} @endif>PE</option>
                <option value="PI" @if (old('estado',$candidato->estado) == "PI") {{ 'selected' }} @endif>PI</option>
                <option value="RJ" @if (old('estado',$candidato->estado) == "RJ") {{ 'selected' }} @endif>RJ</option>
                <option value="RN" @if (old('estado',$candidato->estado) == "RN") {{ 'selected' }} @endif>RN</option>
                <option value="RS" @if (old('estado',$candidato->estado) == "RS") {{ 'selected' }} @endif>RS</option>
                <option value="RO" @if (old('estado',$candidato->estado) == "RO") {{ 'selected' }} @endif>RO</option>
                <option value="RR" @if (old('estado',$candidato->estado) == "RR") {{ 'selected' }} @endif>RR</option>
                <option value="SC" @if (old('estado',$candidato->estado) == "SC") {{ 'selected' }} @endif>SC</option>
                <option value="SP" @if (old('estado',$candidato->estado)== "SP") {{ 'selected' }} @endif>SP</option>
                <option value="SE" @if (old('estado',$candidato->estado) == "SE") {{ 'selected' }} @endif>SE</option>
                <option value="TO" @if (old('estado',$candidato->estado) == "TO") {{ 'selected' }} @endif>TO</option>
            
                
            </select>
        </div>
    </div>


    {{--- Formulario Cep ---}}

    <div class="form-group">
        <label for="cep" class="control-label">Cep: *</label>
        <div class="input-group">
            <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep" required
            value="{{ old('cep',$candidato->cep) }}">
        </div>
    </div>

{{--- Formulario Opção ---}}

<div class="form-group">
    <label for="opcao" class="control-label">Declaração sobre ter domínio do uso de recursos básicos de informática</label>
    <div class="input-group"  value="{{ old('opcao',$candidato->opcao) }}">
   
        <input type="radio" style="margin-top:0px;" id="sim" name="opcao" value="sim" {{ old('opcao',$candidato->opcao) =="sim" ? 'checked='.'"'.'checked'.'"' : '' }} required>
        <label for="sim" style="margin-left: 2px;">Sim</label><br>

        <input type="radio" id="nao" style="margin-top:0px;margin-left: 5px;" name="opcao" value="nao" {{ old('opcao',$candidato->opcao) =="nao" ? 'checked='.'"'.'checked'.'"' : '' }} required>
        <label for="nao" style="margin-left: 2px;">Não</label><br>
    </div>
</div>

<div class="form-group">
<label>Documentos:</label>
    
<table class="table">
<thead>
    <td>Tipo</td>
    <td>Arquivo</td>
    <td></td>
</thead>
@foreach($documentos as $documento)
  
<tr>
    <td>
    @switch($documento->tipo)
            @case('escolaridade')
                Comprovante de Escolaridade
            @break
            @case('curriculo')
                Currículo
            @break
            @case('atestado')
                Atestado de Bons Antecedentes
            @break
            @case('alvara')
                Alvará de Folha Corrida
            @break
            @case('curso')
                Certificados de Cursos e Capacitações
            @break
            @case('experiencia')
                Comprovantes de Experiência Profissional
            @break
        @default
            Escolaridade
    @endswitch
    </td>
    <td>{{ $documento->arquivo }}</td>
    <td> <a href="baixar/{{$documento->id}}">Baixar</a></li></td>
</tr>


    @endforeach

</table>
</div>
<div class="form-group">
<a class="btn btn-primary" href="{{ route('candidatos.index') }}"> Voltar</a> 
</div>  
        
                            </div>
                           
                            </div>
                                   
                
        
        
      
    </div>
</form>
@include('sweetalert::alert')

@endsection