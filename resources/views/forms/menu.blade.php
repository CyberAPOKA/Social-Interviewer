@extends('layouts.master')
@section('title','Painel Covid-19')
@section('content')



    <div class="col-8 mx-auto">
        <div class="card-deck" style="margin-top: 50px">
            

            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width:280px">
                <img class="card-img-top" src="{{ asset('assets/img/lupa.png') }}" alt="">
                <div class="card-body">
                    {{-- <h4 class="card-title">Home</h4>
                    <p class="card-text"></p> --}}
                    <a href="{{ route('candidatos.index') }}" class="btn btn-primary stretched-link">Listagem de Candidatos</a>
                </div>
            </div>


            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width:280px">
                <img class="card-img-top" src="{{ asset('assets/img/auditor.png') }}" alt="">
                <div class="card-body">
                    {{-- <h4 class="card-title">Home</h4>
                    <p class="card-text"></p> --}}
                    <a href="{{route('candidatos.audit')}}" type="button" class="btn btn-primary stretched-link">Auditoria</a>

                </div>
            </div>

            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width:280px">
                <img class="card-img-top" src="{{ asset('assets/img/logs.png') }}" alt="">
                <div class="card-body">
                    {{-- <h4 class="card-title">Home</h4>
                    <p class="card-text"></p> --}}
                    <a href="{{url('/logs')}}" type="button" class="btn btn-primary stretched-link">Logs</a>

                </div>
            </div>

            
        </div>
    </div>



@endsection