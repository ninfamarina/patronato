@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">{{$titulo}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agregar nuevo</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('rolFiguraSolidaria.guardar')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Número de Rol
                                    </label>
                                    <input type="number" name="numerorolFiguraSolidaria" class="form-control">
                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Nombre
                                    </label>
                                    <input type="text" name="nombreRolFiguraSolidaria" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                              <a href="{{route('rolFiguraSolidaria.index')}}" class="btn btn-secondary">Cancel</a>
                              <input type="submit" value="Guardar" class="btn btn-success float-right">
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
