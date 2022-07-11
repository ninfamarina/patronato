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
            <div class="card card-dark card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                       <li class="nav-item">
                           <a class="nav-link active" id="personales-tab" data-toggle="pill" href="#personales" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Datos Personales</a>
                       </li> 
                       <li class="nav-item">
                            <a class="nav-link" id="complementarios-tab" data-toggle="pill" href="#complementarios" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Datos complementarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="documentacion-tab" data-toggle="pill" href="#documentacion" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Documentación</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade active show" id="personales" role="tabpanel" aria-labelledby="personales-tab">
                            <ul class="row list-unstyled">
                                <li class="col-dm-4 col-sm-6"><strong>Nombre Completo:</strong> {{$figuraSolidaria->nombre}} {{$figuraSolidaria->apellido_paterno}} {{$figuraSolidaria->apellido_materno}}</li>
                                <li class="col-dm-4 col-sm-6"><strong>Fecha Nacimiento:</strong> {{$figuraSolidaria->fecha_nacimiento}}</li>
                                <li class="col-dm-4 col-sm-6"><strong>RFC:</strong> {{$figuraSolidaria->rfc}}</li>
                                 <li class="col-dm-4 col-sm-6"><strong>Curp:</strong> {{$figuraSolidaria->curp}}</li>
                                 <li class="col-dm-4 col-sm-6"><strong>Sexo:</strong> {{$figuraSolidaria->sexo}}</li>
                                 <li class="col-dm-4 col-sm-6"><strong> Hijos:</strong> {{$figuraSolidaria->hijos}}</li>
                                 <li class="col-dm-4 col-sm-6"><strong>Estado civil:</strong> {{$figuraSolidaria->registroCivil->nombre}}</li>
                                 <li class="col-dm-4 col-sm-6"><strong>Servicio medico:</strong> {{$figuraSolidaria->seguroMedico->nombre}}</li>
                                 <li class="col-dm-4 col-sm-6"><strong>Telefono:</strong> {{$figuraSolidaria->telefono}}</li>

                            </ul>
                        </div>
                        <div class="tab-pane fade" id="complementarios" role="tabpanel" aria-labelledby="complementarios-tab">
                            <ul class="row list-unstyled">
                                <li class="col-dm-4 col-sm-6"><strong>Domicilio:</strong> {{$figuraSolidaria->domicilio}}</li>
                                <li class="col-dm-4 col-sm-6"><strong>Colonia:</strong> {{$figuraSolidaria->colonia}}</li>
                                <li class="col-dm-4 col-sm-6"><strong>Codigo postal:</strong> {{$figuraSolidaria->codigo_postal}}</li>
                                <li class="col-dm-4 col-sm-6"><strong>Localidad:</strong> {{$figuraSolidaria->ciudad->nombre}}</li>
                                <li class="col-dm-4 col-sm-6"><strong>Municipio:</strong> {{$figuraSolidaria->ciudad->municipio->nombre}}</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="documentacion" role="tabpanel" aria-labelledby="documentacion-tab">
                            <ul class="row list-unstyled">
                                <li class="col-dm-4 col-sm-6">
                                    <a  href="{{route('getfile', $figuraSolidaria->carta_compromiso)}}">Carta Compromiso</a>
                                </li>
                                <li class="col-dm-4 col-sm-6">
                                   <a  href="{{route('getfile', $figuraSolidaria->comprobante_ine)}}">INE</a>
                                </li>
                                <li class="col-dm-4 col-sm-6">
                                    <a  href="{{route('getfile', $figuraSolidaria->comprobante_curp)}}">Curp</a>
                                </li>
                                <li class="col-dm-4 col-sm-6">
                                    <a  href="{{route('getfile', $figuraSolidaria->comprobante_domicilio)}}">Comprobante domicilio</a>
                                </li>
                                <li class="col-dm-4 col-sm-6">
                                <a  href="{{route('getfile', $figuraSolidaria->comprobante_grado_estudio)}}">Comprobante grado de estudios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script type="text/javascript">
        $('#custom-tabs-one-tab a').on('click', function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
    </script>
@endpush