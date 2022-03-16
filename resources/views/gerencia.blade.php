@extends('layouts.master')
@section('title','Painel Covid-19')
@section('content')


<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p></p>
        

    </div>
    <div class="menu">
        
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de nascimento</th>
                        <th>CPF</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Cep</th>

                        <th>Download</th>
                        
                    </tr>
                </thead>
                <tbody>
            @foreach ($candidato as $cand)
            <tr>
            <td>{{ $cand->nome }}</td>
            <td>{{ $cand->email }}</td>
            <td>{{ $cand->datadenascimento }}</td>
            <td>{{ $cand->cpf }}</td>
            <td>{{ $cand->cidade }}</td>
            <td>{{ $cand->estado }}</td>
            <td>{{ $cand->cep }}</td>
            <td><a href="{{ Route('candidato.download', $cand->id) }}">Download</a></td>

            </tr>
            @endforeach
          

           
                </tbody>
            </table>
                
</div>
</div>


@endsection