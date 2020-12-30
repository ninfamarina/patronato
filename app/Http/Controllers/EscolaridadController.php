<?php

namespace App\Http\Controllers;

use App\Escolaridad;
use Illuminate\Http\Request;

class EscolaridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("escolaridad/index", ['titulo' => 'Escolaridad']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("escolaridad/add", ['titulo' => 'escolaridad']);
  
  }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('Guardar') != null ){

        $file = $request->file('certificado');

        // File Details
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();

        // Valid File Extensions
        $valid_extension = array("pdf");

        // 2MB in Bytes
        $maxFileSize = 2097152;
        // Check file extension
        if(in_array(strtolower($extension),$valid_extension)){
          // Check file size
          if($fileSize <= $maxFileSize){
             // File upload location
             $location = 'images';
             // Upload file
             $newname= time();
             //$file->move($location,$newname);
             Storage::disk('local')->putFileAs('files/'.$newname,
                $file,
                $newname
             );
             Session::flash('message','Upload Successful.');
          }else{
             Session::flash('message','File too large. File must be less than 2MB.');
          }
        }else{
           Session::flash('message','Invalid File Extension.');
        }
      }
      // Redirect to index
      return redirect()->action('EscolaridadController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escolaridad  $escolaridad
     * @return \Illuminate\Http\Response
     */
    public function show(Escolaridad $escolaridad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escolaridad  $escolaridad
     * @return \Illuminate\Http\Response
     */
    public function edit(Escolaridad $escolaridad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escolaridad  $escolaridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escolaridad $escolaridad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escolaridad  $escolaridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escolaridad $escolaridad)
    {
        //
    }
}
