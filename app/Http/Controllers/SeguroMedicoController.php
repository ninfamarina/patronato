<?php

namespace App\Http\Controllers;

use App\SeguroMedico;
use Illuminate\Http\Request;

class SeguroMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $seguro_medico = SeguroMedico::all();
        return view("seguroMedico/index",['titulo' => 'SeguroMedico', 'seguro_medicos' => $seguro_medico]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("seguroMedico/add",['titulo' => 'Agregar SeguroMedico']);
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
            "nombreSeguroMedico" => "required|max:45|min:5"],
            ['nombreSeguroMedico.required' => "El campo nombre de seguro medico no puede estar vacío",
            'nombreSeguro.max' => "El campo nombre de seguro medico no puede tener más de 45 caractéres",
            'nombreSeguroMedico.min' => "El campo nombre de seguro medico no puede tener menos de 5 caractéres"]
        );

        $nombre =  $request->input('nombreSeguroMedico');
        SeguroMedico::create([
            "nombre" => $nombre
        ]);

        return redirect()->back()->with('message', 'Datos guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeguroMedico  $seguroMedico
     * @return \Illuminate\Http\Response
     */
    public function show(SeguroMedico $seguroMedico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeguroMedico  $seguroMedico
     * @return \Illuminate\Http\Response
     */
    public function edit(SeguroMedico $seguroMedico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeguroMedico  $seguroMedico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeguroMedico $seguroMedico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeguroMedico  $seguroMedico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $seguro_medico = SeguroMedico::findOrFail($id);
            $seguro_medico->delete();
            return redirect()->back()->with('message', 'Datos eliminados correctamente');
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar los datos');
        }
    }
}
