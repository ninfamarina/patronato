<?php

namespace App\Http\Controllers;

use App\RegistroCivil;
use Illuminate\Http\Request;

class RegistroCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registro_civil = RegistroCivil::all();
        return view("registroCivil/index",['titulo' => 'RegistroCivil', 'registro_civiles' => $registro_civil]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("registroCivil/add",['titulo' => 'Agregar registro civil']);
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
            "nombreRegistroCivil" => "required|max:45|min:5"],
            ['nombreRegistroCivil.required' => "El campo nombre de registro civil no puede estar vacío",
            'nombreRegistroCivil.max' => "El campo nombre de registro civil no puede tener más de 45 caractéres",
            'nombreRegistroCivil.min' => "El campo nombre de registro covil no puede tener menos de 5 caractéres"]
        );

        $nombre =  $request->input('nombreRegistroCivil');
        RegistroCivil::create([
            "nombre" => $nombre
        ]);

        return redirect()->back()->with('message', 'Datos guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegistroCivil  $registroCivil
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroCivil $registroCivil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegistroCivil  $registroCivil
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroCivil $registroCivil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegistroCivil  $registroCivil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroCivil $registroCivil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistroCivil  $registroCivil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $registro_civil = RegistroCivil::findOrFail($id);
            $registro_civil->delete();
            return redirect()->back()->with('message', 'Datos eliminados correctamente');
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar los datos');
        }
    }
}
