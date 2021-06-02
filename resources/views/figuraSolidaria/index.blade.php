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
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-8 offset-sm-0">
                            <a href="{{route('figuraSolidaria.agregar')}}" class="btn btn-success btn-block">Agregar&nbsp;<i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Municipio</label>
                                <select class="form-control">
                                    <option value="-1" disabled selected>Seleccione una opción</option>
                                     @foreach($municipios as $municipio)
                                        <option>{{$municipio->nombre}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Coordinación de Zona</label>
                                <select class="form-control">
                                    <option value="-1" disabled>Seleccione una opción</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Nombre/CURP</label>
                            <input type="" name="" class="form-control" placeholder="Nombre/CURP">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block">Buscar</button>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@stop
