@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">{{$titulo}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="card-tools">
                        <a href="{{route('escolaridad.agregar')}}" class="btn btn-success">Agregar&nbsp;<i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0">Escolaridad</p>
                </div>
            </div>
        </div>
    </div>
@stop
