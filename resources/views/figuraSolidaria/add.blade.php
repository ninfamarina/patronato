@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">{{$titulo}}</h1>
@stop

@section('content')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" />
@endpush
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agregar nuevo</h3>
                </div>
                <div class="card-body">
                     <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                            <div class="step" data-target="#personalInformation">
                              <button type="button" class="step-trigger" role="tab" aria-controls="personalInformation" id="personalInformation-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Datos Personales</span>
                              </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#address">
                              <button type="button" class="step-trigger" role="tab" aria-controls="address" id="address-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Dirección</span>
                              </button>
                            </div><div class="line"></div>
                            <div class="step" data-target="#documentation">
                              <button type="button" class="step-trigger" role="tab" aria-controls="documentation" id="documentation-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Documentación</span>
                              </button>
                            </div><div class="line"></div>
                            <div class="step" data-target="#figuraSolidaria">
                              <button type="button" class="step-trigger" role="tab" aria-controls="documentation" id="documentation-trigger">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Figura Solidaria</span>
                              </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form onsubmit="return false">
                                <div id="personalInformation" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Nombre
                                                </label>
                                                <input type="text" name="nombreFiguraSolidaria" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Apellido Paterno
                                                </label>
                                                <input type="text" name="apFiguraSolidaria" class="form-control">
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Apellido Materno
                                                </label>
                                                <input type="text" name="amFiguraSolidaria" class="form-control"> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    CURP
                                                </label>
                                                <input type="text" name="curpFiguraSolidaria" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    RFC
                                                </label>
                                                <input type="text" name="rfcFiguraSolidaria" class="form-control">                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="Date">Fecha de Nacimiento</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento"/>
                                                </div>    
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Sexo
                                                </label>
                                                <div class="form-check">
                                                    <label  class="radio-inline"><input class="form-check-input" type="radio" name="sexo" value="femenino"> Femenino</label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="radio-inline"><input class="form-check-input" type="radio" name="sexo" value="masculino"> Masculino</label>
                                                </div>  
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Estado Civil</label>
                                                <select class="form-control">
                                                    <option>Seleccione una opción</option>
                                                    @foreach($registrosCivil as $registroCivil)
                                                        <option value="{{$registroCivil->id}}">{{$registroCivil->nombre}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Celular</label>
                                                <input type="text" name="coFiguraSolidaria" class="form-control">
                                            </div>   
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hijos</label>
                                                <input type="number" name="hijosFiguraSolidaria" class="form-control" min="0" > 
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Servicio Médico</label>
                                                <select class="form-control">
                                                    <option  selected disabled >Selecciona una opción</option>
                                                @foreach ( $SeguroMedico as $sm )
                                                <option value="{{$sm->id}}">
                                                            {{ $sm->nombre }}</option>

                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                                </div>
                                <div id="address" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Domicilio</label>
                                                <input type="text" name="doFiguraSolidaria" class="form-control"> 
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Colonia</label>
                                                <input type="text" name="coFiguraSolidaria"
                                                class="form-control">    
                                            </div>   
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Municipio</label>
                                                <select class="form-control" id="municipioDomicilio">
                                                    <option selected disabled>Seleccione un municipio</option>
                                                    @foreach($municipios as $municipio)
                                                        <option value="{{$municipio->id}}">{{ $municipio->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>   
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Localidad</label>
                                                <select class="form-control" id="ciudadesDomicilio" name="ciudadesDomicilio">
                                                    <option selected disabled>Seleccione una ciudad</option>
                                                </select>  
                                            </div>
                                            
                                        </div>  
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                                </div>
                                <div id="documentation" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger3">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label>INE</label>
                                            <input type="file" name="comprobanteIne"
                                                class="form-control">
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>CURP</label>
                                            <input type="file" name="comprobanteCurp"
                                                class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Último grado de estudio</label>
                                                <select class="form-control">
                                                    <option selected disabled >Selecciona una opcion</option>
                                                    @foreach ($escolaridad as $es)
                                                    <option value="{{$es->id}}"> {{$es->nombre}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Comprobante grado de estudios</label>
                                                <input type="file" name="comprobanteGradoEstudio"
                                                class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Carta compromiso</label>
                                                <input type="file" name="cartaCompromiso"
                                                class="form-control">
                                            </div>
                                        </div>  
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                                </div>
                                <div id="figuraSolidaria" role="tabpanel" class="bs-stepper-pane active" aria-labelledby="stepper1trigger3">
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="Date">Fecha de Registro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="fechaRegistro" name="fechaRegistro"/>
                                                    </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="Date"> Fecha de Reincorporacion</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text"  class="form-control" id="fechaReincorporacion" name="fechaReincorporacion">
                                                </div> 
                                           </div> 
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Coordinacion de Zona</label>
                                                <select class="form-control">
                                                    <option selected disabled>Seleccione coordinación de zona</option>
                                                    @foreach($coordinacionZona as $cz)
                                                        <option value="{{$cz->id}}">
                                                            {{$cz->num_coordinacion}}
                                                            {{ $cz->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rol</label>
                                                <select class="form-control">
                                                    <option selected disabled>Seleccione un rol</option>
                                                    @foreach($rol as $rol)
                                                        <option value="{{$rol }}">
                                                        {{$rol->no_rol }}&nbsp; 
                                                        {{$rol->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                                    <button class="btn btn-success" onclick="stepper.next()">Guadar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
   @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script type="text/javascript">
        const stepper = new Stepper(document.querySelector('.bs-stepper'));
        const municipioDomicilio = document.querySelector("#municipioDomicilio");
        municipioDomicilio.addEventListener("change", function(e){
            const ciudadId = parseInt(e.target.value);
            fetch(`/municipio/${ciudadId}/ciudades`)
            .then(response => response.json())
            .then(data => {
                const { municipio } = data;
                let {ciudades = []} = municipio;
                const ciudadesDomicilio = document.querySelector('#ciudadesDomicilio');
                ciudades = ciudades.map(c => `<option value="${c.id}">${c.nombre}</option>`); 
                ciudadesDomicilio.innerHTML = `<option value="-1" selected disabled>Seleccione una ciudad</option>
                    ${ciudades.join()}`
            })
            .catch(err => {
                console.log(err)
            });
        });
    </script>
@endpush
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        
        $(function () {
            $('#fechaNacimiento').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });
        $(function () {
            $('#fechaRegistro').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });
        $(function () {
            $('#fechaReincorporacion').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    @stop