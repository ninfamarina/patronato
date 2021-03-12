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
                    <div class="row">
                         @foreach($coordinacionZonas as $coordinacionZona)
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card card-widget widget-user-2">
                                <div class="widget-user-header bg-lightblue">
                                    <div class="widget-user-image">
                                      <h2 class="float-left text-light">{{$coordinacionZona->num_coordinacion}}</h2>
                                    </div>
                                    <h3 class="widget-user-username text-light">{{$coordinacionZona->nombre}}</h3>
                                    <h5 class="widget-user-desc text-light"><i class="fas fa-users"></i> {{$coordinacionZona->TotalFiguraSolidarias}}</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <small class="text-muted"><i class="fas fa-user"></i> {{$coordinacionZona->nombre_encargado}} {{$coordinacionZona->apellido_paterno}} {{$coordinacionZona->apellido_materno}}
                                                </small>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <small class="text-muted"><i class="fas fa-at"></i> {{$coordinacionZona->email}} </small>
                                             </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <small class="text-muted"><i class="fas fa-phone"></i> {{$coordinacionZona->numero_celular}} </small>
                                             </a>
                                        </li>

                                    </ul>
                                </div> 
                            </div>
                         </div>
                         @endforeach
                    </div>      
                    <!--table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nombre</th>
                                <th>Municipio</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coordinacionZonas as $coordinacionZona)

                                <tr>
                                    <td>{{$coordinacionZona->num_coordinacion}}</td>
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
                    </table-->
                </div>
            </div>
        </div>
    </div>
@stop