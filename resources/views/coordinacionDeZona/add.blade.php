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
                    @if(session()->has('error-message'))
                         <li>{{ $error }}</li>
                    @else
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agregar nuevo</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('coordinacionZona.guardar')}}">
                        @csrf
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NúmeroCoordinación</label>
                                    <input type="number" name="numCoordinacion" class="form-control">
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Municipio</label>
                                    <select class="form-control" name="municipio">
                                        <option disabled="disabled" selected>Selecciona un municipio</option>
                                        @foreach($municipios as $municipio)
                                        <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Nombre
                                    </label>
                                    <input type="text" name="nombreCoordinacionZona" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3>Información encargados coordinación de zona</h3> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Nombre
                                    </label>
                                    <input type="text" name="nombreEncargado" class="form-control">
                                </div>  
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                 <label>Apellido Paterno</label>
                                    <input type="text" name="apellidoPaterno" class="form-control">
                                </div>   
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Apellido Materno
                                    </label>
                                    <input type="text" name="apellidoMaterno" class="form-control">
                                </div>  
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                 <label>Celular</label>
                                    <input type="text" name="numeroCelular" class="form-control">
                                </div>   
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                 <label>Email</label>
                                    <input type="text" name="Email" class="form-control">
                                </div>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                              <a href="#" class="btn btn-secondary">Cancel</a>
                              <input type="submit" value="Guardar" class="btn btn-success float-right">
                            </div>    
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
