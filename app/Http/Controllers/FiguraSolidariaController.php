<?php

namespace App\Http\Controllers;

use App\FiguraSolidaria;
use App\RegistroCivil;
use Illuminate\Http\Request;

class FiguraSolidariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('figuraSolidaria/index', ['titulo' => 'Figura Solidaria']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registroCivil = RegistroCivil::all();
        return view('figuraSolidaria/add', ['titulo' => 'Agregar Figura Solidaria', 'registrosCivil' => $registroCivil]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function show(FiguraSolidaria $figuraSolidaria)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function edit(FiguraSolidaria $figuraSolidaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FiguraSolidaria $figuraSolidaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FiguraSolidaria  $figuraSolidaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiguraSolidaria $figuraSolidaria)
    {
        //
    }
}
