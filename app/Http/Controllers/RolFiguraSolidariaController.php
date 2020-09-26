<?php

namespace App\Http\Controllers;

use App\RolFiguraSolidaria;
use Illuminate\Http\Request;

class RolFiguraSolidariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = RolFiguraSolidaria::all();
        return view("rolFiguraSolidaria/index",['titulo' => 'RolFiguraSolidaria', 'roles' => $roles]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("rolFiguraSolidaria/add",['titulo' => 'Agregar rol de figura solidaria']);
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
            "nombreRolFiguraSolidaria" => "required|max:45|min:5",
            "numerorolFiguraSolidaria" => "required| integer"],
            ['nombreRolFiguraSolidaria.required' => "El campo nombre de rol de figura solidaria no puede estar vacío",
            'nombreRolFiguraSolidaria.max' => "El campo nombre de rol de figura solidaria no puede tener más de 45 caractéres",
            'nombreRolFiguraSolidaria.min' => "El campo nombre de rol de figura solidaria no puede tener menos de 5 caractéres",
           "numerorolFiguraSolidaria.required" => "El campo número de rol de figura solidaria no puede estar vacío",
           "numerorolFiguraSolidaria.integer" => "El campo número de rol de figura solidaria debe ser entero"  ]
        );

        $nombre =  $request->input('nombreRolFiguraSolidaria');
        $numero= $request->input('numerorolFiguraSolidaria');
        RolFiguraSolidaria::create([
            "nombre" => $nombre,
            "no_rol" => $numero

        ]);

        return redirect()->back()->with('message', 'Datos guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RolFiguraSolidaria  $rolFiguraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function show(RolFiguraSolidaria $rolFiguraSolidaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RolFiguraSolidaria  $rolFiguraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function edit(RolFiguraSolidaria $rolFiguraSolidaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RolFiguraSolidaria  $rolFiguraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolFiguraSolidaria $rolFiguraSolidaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RolFiguraSolidaria  $rolFiguraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $roles = RolFiguraSolidaria::findOrFail($id);
            $roles->delete();
            return redirect()->back()->with('message', 'Datos eliminados correctamente');
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar los datos');
        }
    }
}
