@extends('layouts.master')
@section('title','LISTA DE CANDIDATOS')
@section('content')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="card-header text-center flex-row align-items-center justify-content-between" style="font-size: 24px !important;">
                <div class="d-inline">
                     Arquivos de entrevistadores sociais
                </div>
                
            </div>
            <div class="container-fluid">
                <table class="table table-striped nowrap" id="tabelaAtribuida">
                    <thead align="center">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @foreach ($candidato as $cand)
                        <tr>
                            <td>{{$cand->id}}</td>
                            <td>{{$cand->nome}}</td>
                            <td>{{$cand->email}}</td>
                            <td>{{$cand->cpf}}</td>
                            
                            
                            
                            <td>
                                <a href="candidatos/visualizar/{{$cand->id}}" style="color: #3490dc; text-decoration: none; background-color: transparent;">
                                    Visualizar
                                 </a>| 
                                <a href="candidatos/baixartodos/{{$cand->id}}">Baixar todos documentos</a> 
                                
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
    {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> --}}
</div>



<script>
    $(document).ready(function () {
        $('#tabelaPendente').DataTable({
            select: false,
            responsive: false,
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [10],
            "info": false,
            "sLengthMenu": false,
            "bLengthChange": false,
            "oLanguage": {

                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de START até END de TOTAL registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de MAX registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "MENU resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });

        $('#tabelaAtribuida').DataTable({
            select: false,
            responsive: false,
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [10],
            "info": false,
            "sLengthMenu": false,
            "bLengthChange": false,
            "oLanguage": {

                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de START até END de TOTAL registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de MAX registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "MENU resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });

</script>

@endsection