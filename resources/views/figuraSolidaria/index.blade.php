@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">{{$titulo}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 alertable">
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-8 offset-sm-0">
                            <a href="{{route('figuraSolidaria.agregar')}}" class="btn btn-success btn-block">Agregar&nbsp;<i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" id="frmSearchFiguraSolidaria">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Municipio</label>
                                    <select class="form-control" id="municipio">
                                        <option value="-1" disabled selected>Seleccione una opción</option>
                                         @foreach($municipios as $municipio)
                                            <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Coordinación de Zona</label>
                                    <select class="form-control" id="coordinacionZona" name="coordinacionZona">
                                        <option value="-1" disabled>Seleccione una opción</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Nombre/CURP</label>
                                <input type="" name="figuraSolidaria" class="form-control" placeholder="Nombre/CURP">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-block">Buscar</button>
                            </div>
                        </div>
                    </form> 
                    <div class="row">
                        <table class="table table-striped table-valign-middle" id="tblFigurasSolidaria">
                            <thead>
                                <tr>
                                    <th>CZ</th>
                                    <th>Rol</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/CoordinacionZonaFilter.js') }}"></script>
    <script type="text/javascript">
        const url = `/figuraSolidaria/filter`
        const frmSearchFiguraSolidaria = document.querySelector("#frmSearchFiguraSolidaria");
        frmSearchFiguraSolidaria.addEventListener("submit", e => {
            e.preventDefault()
            const coordinacionZonaSelect = document.querySelector("#coordinacionZona");

            const options = {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": $('input[name="_token"]').val()
                  },
                method: "POST",
                body: JSON.stringify({
                    coordinacionZona: coordinacionZonaSelect.value 
                })
            }
            fetch(url, options)
            .then(response => response.json())
            .then(data => {
                const {cz, result} = data
                if(result < 1){
                    warningAlert("La búsqueda no generó resultados");
                    return
                }
                const {figuras_solidarias: figurasSolidaria} = cz;
                clearAlerts();
                const tblFigurasSolidaria = document.querySelector("#tblFigurasSolidaria")
                const [tbody] = tblFigurasSolidaria.tBodies
                tbody.innerHTML = ""
                let figuraSolidariaRow = ""
                console.log(figurasSolidaria)
                for(const figuraSolidaria of figurasSolidaria) {
                    figuraSolidariaRow += `
                        <tr>
                            <td>${cz.nombre}</td>
                            <td>figuraSolidaria.rol</td>
                            <td>${figuraSolidaria.nombre}</td>
                            <td>${figuraSolidaria.apellido_paterno}</td>
                            <td>${figuraSolidaria.apellido_materno}</td>
                            <td><a href="figuraSolidaria/${figuraSolidaria.id}"><i class="fas fa-eye"></i></a></td>

                        </tr>
                    `
                }
                tbody.innerHTML = figuraSolidariaRow
            })
            .catch(err =>  {
                console.log(err);
            })
        })
        
    </script>
@endpush