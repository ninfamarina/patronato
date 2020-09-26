<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::all();
        return view("municipio/index",['titulo' => 'Municipio', 'municipios' => $municipios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("municipio/add",['titulo' => 'Agregar Municipio']);
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
            "nombreMunicipio" => "required|max:45|min:5"],
            ['nombreMunicipio.required' => "El campo nombre del municipio no puede estar vacío",
            'nombreMunicipio.max' => "El campo nombre del municipio no puede tener más de 45 caractéres",
            'nombreMunicipio.min' => "El campo nombre del municipio no puede tener menos de 5 caractéres"]
        );

        $nombre =  $request->input('nombreMunicipio');
        Municipio::create([
            "nombre" => $nombre
        ]);

        return redirect()->back()->with('message', 'Datos guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $municipio = Municipio::findOrFail($id);
            $municipio->delete();
            return redirect()->back()->with('message', 'Datos eliminados correctamente');
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar los datos');
        }
    }
}
