<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudad::with('municipio')->get();
        return view("ciudades/index",['titulo' => 'Ciudades', 'ciudades' => $ciudades]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = \App\Municipio::all();
        return view("ciudades/add",['titulo' => 'Agregar Ciudad', 'municipios' => $municipios]);
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
            "nombreCiudad" => "required|max:45|min:5",
            "municipio" => "required"],
            ['nombreCiudad.required' => "El campo nombre de la ciudad no puede estar vacío",
            'nombreCiudad.max' => "El campo nombre de la ciudad no puede tener más de 45 caractéres",
            'nombreCiudad.min' => "El campo nombre de la cuidad no puede tener menos de 5 caractéres",
            "municipio.required" => "El campo municipio es requerido"]
        );

        $nombre =  $request->input('nombreCiudad');
        $municipio = $request->input('municipio');

        Ciudad::create([
            "nombre" => $nombre,
            "municipio_id" => $municipio
        ]);

        return redirect()->back()->with('message', 'Datos guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudad $ciudad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        $municipios = \App\Municipio::all();
        return view("ciudades/edit",['titulo' => 'Ciudad', 'ciudad' => $ciudad, "municipios"=>$municipios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validacion = $request->validate([
            "nombreCiudad" => "required|max:45|min:5","municipios"=>"exists:ciudades,municipio_id"],
            ['nombreCiudad.required' => "El campo nombre de la ciudad no puede estar vacío",
            'nombreCiudad.max' => "El campo nombre de la ciudad no puede tener más de 45 caractéres",
            'nombreCiudad.min' => "El campo nombre de la ciudad no puede tener menos de 5 caractéres",
            "municipios.exists"=>"Datos del municipio no existen"]
        );

        $ciudad = Ciudad::findOrFail($id);
        $nombre =  $request->input('nombreCiudad');
        $municipio = $request->input('municipios');

         $ciudad->nombre = $nombre;
         $ciudad->municipio_id = $municipio;
         $ciudad->save();
          return redirect()->back()->with('message', 'Datos guardado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cuidades = Ciudad::findOrFail($id);
            $cuidades->delete();
            return redirect()->back()->with('message', 'Datos eliminados correctamente');
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar los datos');
        }
    }

}
