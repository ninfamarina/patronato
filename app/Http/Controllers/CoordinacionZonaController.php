<?php

namespace App\Http\Controllers;

use App\CoordinacionZona;
use Illuminate\Http\Request;

class CoordinacionZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinacionDeZona = CoordinacionZona::with('municipio')->get();
        return view("coordinacionDeZona/index",['titulo' => 'Coordinación de Zona', 'coordinacionZonas' => $coordinacionDeZona]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = \App\Municipio::all();
        return view("coordinacionDeZona/add",['titulo' => 'Agregar Coordinacion de Zona', 'municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validacion = $request->validate([
            "nombreCoordinacionZona" => "required|max:45|min:5",
            "numCoordinacion"=> "required",
            "municipio" => "required"],
            ['nombreCoordinacionZona.required' => "El campo nombre de la coordinacion de Zona no puede estar vacío",
            'numCoordinacion.required'=>"El campo numero de coordinacion no debe estar vacío",
            'nombreCoordinacionZona.max' => "El campo nombre de la ciudad no puede tener más de 45 caractéres",
            'nombreCoordinacionZona.min' => "El campo nombre de la cuidad no puede tener menos de 5 caractéres",
            "municipio.required" => "El campo municipio es requerido"]
        );

        $nombre =  $request->input('nombreCoordinacionZona');
        $municipio = $request->input('municipio');
        $numCoordinacion = $request->input('numCoordinacion');
        $nombreEncargado = !empty($request->input('nombreEncargado')) ?
            $request->input('nombreEncargado') : null;
        $apellidoPaterno = !empty($request->input('apellidoPaterno')) ?
            $request->input('apellidoPaterno') : null;
        $apellidoMaterno = !empty($request->input('apellidoMaterno')) ?
            $request->input('apellidoMaterno') : null;
        $numeroCelular = !empty($request->input('numeroCelular')) ?
            $request->input('numeroCelular') : null;
        $Email = !empty($request->input('Email')) ?
            $request->input('Email') : null;

        CoordinacionZona::create([
            "nombre" => $nombre,
            "municipio_id" => $municipio,
            "num_coordinacion" => $numCoordinacion,
            "nombre_encargado" => $nombreEncargado,
            "apellido_paterno" => $apellidoPaterno,
            "apellido_materno" => $apellidoMaterno,
            "numero_celular" => $numeroCelular,
            "email" => $Email

        ]);

        return redirect()->back()->with('message', 'Datos guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coordinacionDeZona  $coordinacionDeZona
     * @return \Illuminate\Http\Response
     */
    public function show(coordinacionDeZona $coordinacionDeZona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coordinacionDeZona  $coordinacionDeZona
     * @return \Illuminate\Http\Response
     */
    public function edit(coordinacionDeZona $coordinacionDeZona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coordinacionDeZona  $coordinacionDeZona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coordinacionDeZona $coordinacionDeZona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coordinacionDeZona  $coordinacionDeZona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $coordinacionDeZona = CoordinacionZona::findOrFail($id);
            $coordinacionDeZona->delete();
            return redirect()->back()->with('message', 'Datos eliminados correctamente');
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar los datos');
        }
    }
}
