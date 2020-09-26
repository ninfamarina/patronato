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
                    <h3 class="card-title">Agregar nuevo</h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('escolaridad.guardar')}}">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Subir archivo
                                </label>
                                <input type="file" name="certificado">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                          <a href="#" class="btn btn-secondary">Cancel</a>
                          <input type="submit" value="Guardar" class="btn btn-success float-right">
                        </div>
                     </div>
                </form>
                </div>
            </div>
        </div>
    </div> 
@stop