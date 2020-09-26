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
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{route('coordinacionZona.agregar')}}" class="btn btn-success">Agregar&nbsp;<i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Municipio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coordinacionZonas as $coordinacionZona)
                                <tr>
                                    <td>{{$coordinacionZona->nombre}}</td>

                                    <td>{{$coordinacionZona->municipio->nombre}}</td>
                                    <td class="d-flex">
                                         <form action="{{route('coordinacionZona.eliminar', [$coordinacionZona->id])}}" method="POST" class="pr-3">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></button>
                                        </form>
                                        <form action="{{route('coordinacionZona.eliminar', [$coordinacionZona->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar la coordinacion de zona?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop