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
                                    <label>Hijos</label>
                                    <input type="number" name="hijosFiguraSolidaria" class="form-control" min="0" > 
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Domicilio</label>
                                    <input type="text" name="doFiguraSolidaria" class="form-control"> 
                                </div>
                            </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" name="coFiguraSolidaria"
                                class="form-control">    
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Localidad</label>
                                <select class="form-control">
                                    <option>Bahia Asuncion</option>
                                    <option>Bahia Tortugas</option>
                                    <option>Benito Juarez</option>
                                    <option>Cabo San Lucas</option>
                                    <option>Chametla</option>
                                    <option>Ciudad Constitucion</option>
                                    <option>Ciudad Insurgentes</option>
                                    <option>Clave 15</option>
                                    <option>Ejido. Alfredo V. Bonfil</option>
                                    <option>Ejido. San lucas</option>
                                    <option>El Rosario</option>
                                    <option>Guerrero negro</option>
                                    <option>Gustavo Diaz ordaz</option>
                                    <option>Heroica mulege</option>
                                    <option>La Altagracia</option>
                                    <option>La Paz</option>
                                    <option>La Poza grande</option>
                                    <option>Las Barrancas</option>
                                    <option>Loreto</option>
                                    <option>Miraflores</option>
                                    <option>Mulege</option>
                                    <option>Puerto San Carlos</option>
                                    <option>San Bruno</option>
                                    <option>San Ignacio</option>
                                    <option>San Isidro</option>
                                    <option>San Jose del Cabo</option>
                                    <option>San Juanico</option>
                                    <option>San Luis Gonzaga</option>
                                    <option>San Miguel de Comondu</option>
                                    <option>Santa Rosalia</option>
                                    <option>Santiago</option>
                                    <option>Villa Alberto A.A.A</option>
                                    <option>Villa Alberto Andres A.A</option>
                                    <option>Villa Alberto Andres Alvarado</optio>
                                    <option>Villa Hidalgo</option>
                                    <option>Villa Morelos</option>
                                </select>  
                            </div>
                            
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Escolaridad</label>
                            <select class="form-control">
                                <option>Sin estudios</option>
                                <option>Primaria</option>
                                <option>Secundaria</option>
                                <option>Preparatoria</option>
                                <option>Licenciatura</option>
                                <option>Maestria</option>
                                <option>Doctorado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Servicio Medico</label>
                            <select class="form-control">
                                <option>Sin servicio</option>
                                <option>ISSSTE</option>
                                <option>IMSS</option>
                                <option>Seguro Popular</option>
                            </select>
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
                            <label class="control-label" for="Date">Fecha de Registro</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="fechaRegistro" name="fechaRegistro"/>
                                </div> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label" for="Date"> Fecha de Reincorporacion</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text"  class="form-control" id="fechaReincorporacion" name="fechaReincorporacion">
                            </div> 
                        </div> 
                        <div class="col-md-6">
                            <label>Coordinacion de Zona</label>
                            <select class="form-control">
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Numero de Rol</label>
                            <select class="form-control">
                                <option>13</option>
                                <option>21</option>
                                <option>22</option>
                                <option>22 y 5</option>
                                <option>3</option>
                                <option>48</option>
                                <option>5</option>
                                <option>5 y 22</option>
                                <option>61</option>
                                <option>62</option>
                                <option>64</option>
                                <option>65</option>
                                <option>67</option>
                                <option>72</option>
                                <option>78</option>
                                <option>80</option>
                                <option>90</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Rol</label>
                            <select class="form-control">
                                <option>Aplicador de examenes</option>
                                <option>Aplicador de examenes y apoyo tenico</option>
                                <option>Apoyo de acreditacion</option>
                                <option>Apoyo tec.en p.c</option>
                                <option>Apoyo tecnico</option>
                                <option>Apoyo tenico p.c</option>
                            </select>
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
   
    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#fechaNacimiento').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
     <script type="text/javascript">
        $(function () {
            $('#fechaRegistro').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
     <script type="text/javascript">
        $(function () {
            $('#fechaReincorporacion').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    @stop
@stop